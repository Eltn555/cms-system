<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $currentPageNumber = $request->query('page', 1); // Default to page 1 if not provided
        $perPage = $request->input('perPage', 10); // Default to 10 items per page
        $reviewsQuery = Review::orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $reviewsQuery->where(function($query) use ($searchQuery) {
                $query->where('text', 'like', '%'.$searchQuery.'%')
                    ->orWhereHas('user', function($subQuery) use ($searchQuery) {
                        $subQuery->where('name', 'like', '%'.$searchQuery.'%')
                            ->orWhere('lastname', 'like', '%'.$searchQuery.'%');
                    })
                    ->orWhere('rate', 'like', '%'.$searchQuery.'%');
            });
        }

        $reviews = $reviewsQuery->paginate($perPage)->appends([
            'perPage' => $perPage,
            'search' => $request->input('search') // Preserve the search query
        ]);

        return view('review.index', compact('reviews', 'perPage', 'currentPageNumber'));
    }

    /**
     * Show the form for creating a new review.
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Review::create($request->all());
        return redirect()->route('reviews.index')
            ->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified review.
     */
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified review.
     */
    public function edit(Review $review)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', ['category' => $review]);
    }

    /**
     * Update the specified review in storage.
     */
    public function update(Request $request, Review $review)
    {
        $field = $request->input('field');
        $value = $request->input('value');
        $data = [
            $field => $value,
        ];

        $connection = $review->update($data);

        return [
            'response' => $connection,
        ];
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')
            ->with('success', 'Review deleted successfully');
    }
}
