<?php
namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('review.index', compact('reviews'));
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
