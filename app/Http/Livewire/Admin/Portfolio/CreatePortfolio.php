<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use App\Models\BlogCategory;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Livewire\WithFileUploads;
use App\Models\Image;

class CreatePortfolio extends Component
{
    use WithFileUploads;

    public $categories;
    public $title;
    public $description;
    public $image = [];
    public $gallery;
    public $video;
    public $categoryId;
    public $text;
    public $oldVideo;

    protected $listeners = ['updValues' => 'setVal', 'video' => 'videoSet', 'updateTextContent' => 'setTextContent'];

    public function mount(){
        if ($this->gallery === null){
            $this->gallery = collect();
        }
        $this->categories = BlogCategory::all();
    }

    public function videoSet($filepath){
        $this->video = $filepath;
    }

    public function setVal($val, $varName)
    {
        if ($varName == "image"){
            $this->image = Image::find($val);
        }elseif ($varName == "gallery"){
            $ids = is_array($val)
                ? $val // If already an array, use as is
                : (json_decode($val, true) ?: explode(',', $val)); // Try JSON decode, fallback to explode

            $ids = array_filter(array_map('trim', (array) $ids), 'is_numeric');
            $new = Image::whereIn('id', $ids)->get();

            $this->gallery = $this->gallery->merge($new);
        }
    }

    public function setTextContent($content)
    {
        $this->text = $content;
    }

    public function removeImg()
    {
        $this->image = [];
    }

    public function removeGal($id)
    {
        $this->gallery = $this->gallery->filter(function ($image) use ($id) {
            return $image['id'] !== $id; // Keep all items where the ID is not equal to $id
        });
    }

    public function submit(){
        dd($this->title, $this->description, $this->image, $this->categoryId, $this->gallery, $this->text, $this->video);
    }

    public function render()
    {
        return view('livewire.admin.portfolio.create-portfolio');
    }
}
