<?php

namespace App\Http\Livewire\Front\Component;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Review;

class Reviews extends Component
{
    public $product;
    public $text;
    public $rated;
    public $reviews;

    public function mount($product){
        $this->product = $product;
        $this->reviews = Review::where('product_id', $this->product->id)->get();

//        dd($this->reviews);
        if (Auth::user()){
            $review = Review::where('user_id', auth()->id())
                ->where('product_id', $this->product->id)
                ->first();

            if ($review) {
                $this->rated = $review->rate;
                $this->text = $review->text ?? ''; // Assuming the `text` column exists in the Review model
            }
        }
    }

    public function rate($point){
        $this->rated = $point;
        if (Auth::user()){
            $userId = auth()->id();
            // Create or update the review
            Review::updateOrCreate(
                [
                    'user_id' => $userId,
                    'product_id' => $this->product->id,
                ],
                [
                    'rate' => $this->rated,
                ]
            );
            session()->flash('message', 'Rating submitted successfully!');
        }else{
            session()->flash('message', 'Please register!');
        }
    }

    public function submit(){
        if ($this->rated != 0){
            if (Auth::user()){
                $userId = auth()->id();
                // Create or update the review
                Review::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'product_id' => $this->product->id,
                    ],
                    [
                        'text' => $this->text,
                    ]
                );
                session()->flash('message', 'Rating submitted successfully!');
            }else{
                session()->flash('message', 'Please register!');
            }
        }else{
            session()->flash('message', 'Please rate!');
        }
    }

    public function render()
    {
        return view('livewire.front.component.reviews');
    }
}
