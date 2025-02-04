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
    public $category;
    public $text;
    public $test = 'hehe';
    public $tests = 'hehe';

    public function fux()
    {
        $this->tests = 'haha';
    }

    protected $listeners = ['updValues' => 'setVal'];

    public function setVal($val, $varName)
    {
        if ($varName == "image"){
            $this->test = 'haha';
            $this->image = Image::find($val)->toArray();
        }
    }

    public function fix()
    {
        $this->test = 'haha';
    }

    public function mount(){
        $this->categories = BlogCategory::all();
    }

    public function submit(){
        dd($this->title, $this->description, $this->image, $this->category, $this->text, $this->test, $this->tests);
    }

    public function render()
    {
        return view('livewire.admin.portfolio.create-portfolio');
    }
}
