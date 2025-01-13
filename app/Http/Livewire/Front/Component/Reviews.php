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
    public $showing = 3;
    public $flashMessage;

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

    public function more() {
        $this->showing += 10;
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
            $this->flashMessage = 'Спасибо за вашу оценку';
            $this->dispatchBrowserEvent('flashMessage', [
                'message' => $this->flashMessage,
                'type' => 'success',
                'style' => 'bg-success',
            ]);
        }else{
            $this->flashMessage = 'Пожалуйста, зарегистрируйтесь или войдите';
            $this->dispatchBrowserEvent('flashMessage', [
                'message' => $this->flashMessage,
                'type' => 'error',
                'style' => 'bg-danger',
            ]);
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
                $this->flashMessage = 'Спасибо за вашу оценку';
                $this->dispatchBrowserEvent('flashMessage', [
                    'message' => $this->flashMessage,
                    'type' => 'success',
                    'style' => 'bg-success',
                ]);
            }else{
                $this->flashMessage = 'Пожалуйста, зарегистрируйтесь или войдите';
                $this->dispatchBrowserEvent('flashMessage', [
                    'message' => $this->flashMessage,
                    'type' => 'error',
                    'style' => 'bg-danger',
                ]);
            }
        }else{
            $this->flashMessage = 'Пожалуйста, оцените, чтобы написать текстовый отзыв';
            $this->dispatchBrowserEvent('flashMessage', [
                'message' => $this->flashMessage,
                'type' => 'error',
                'style' => 'bg-danger',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.front.component.reviews');
    }
}
