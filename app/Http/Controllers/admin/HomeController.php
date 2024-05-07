<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform search across different entities
        $users = User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->take(20)->get();

        $products = Product::where('title', 'like', "%$query%")
            ->orWhere('short_description', 'like', "%$query%")
            ->orWhere('price', 'like', "%$query%")
            ->orWhere('discount_price', 'like', "%$query%")
            ->with('images') // Eager load the images relationship
            ->take(20)
            ->get()
            ->map(function ($product) {
                $firstImage = $product->images->first();
                $product->image_url = $firstImage ? asset('storage/'.$firstImage->image) : asset('no_photo.jpg');
                return $product;
            });

        $categories = Category::where('title', 'like', "%$query%")->take(20)->get();

        $tags = Tag::where('title', 'like', "%$query%")->take(20)->get();

        // Return search results as JSON
        return response()->json([
            'users' => $users,
            'products' => $products,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
