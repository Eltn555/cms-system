<?php

namespace App\Http\Livewire\Admin\Review;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Review;

class Reviews extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $lastId = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
        'page' => ['except' => 1]
    ];

    protected $listeners = ['deleteReview'];

    public function mount()
    {
        $this->updateLastId();
    }

    public function create(){
        \App\Models\Review::Create(
            [
                'user_id' => 1,
                'product_id' => 1,
                'rate' => 0,
                'text' => 'Hey'
            ]
        );
    }

    public function deleteReview($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->delete();
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $reviewsQuery = Review::orderBy('created_at', 'desc');

        if (!empty($this->search)) {
            $reviewsQuery->where(function ($query) {
                $query->where('text', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($subQuery) {
                        $subQuery->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('lastname', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('product', function ($subQuery){
                        $subQuery->where('title', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('rate', 'like', '%' . $this->search . '%');
            });
        }

        $reviews = $reviewsQuery->paginate($this->perPage);

        return view('livewire.admin.review.reviews', [
            'reviews' => $reviews,
        ]);
    }

    private function updateLastId()
    {
        $lastReview = Review::orderBy('created_at', 'desc')->first();
        $this->lastId = $lastReview ? $lastReview->toArray() : null;
    }
}
