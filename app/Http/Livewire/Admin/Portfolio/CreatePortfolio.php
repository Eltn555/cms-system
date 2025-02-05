<?php

namespace App\Http\Livewire\Admin\Portfolio;

use Livewire\Component;
use App\Models\BlogCategory;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioImage;
use Livewire\WithFileUploads;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

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
    public $flashMessage;

    protected $listeners = ['updValues' => 'setVal', 'video' => 'videoSet', 'updateTextContent' => 'setTextContent'];

    public function mount(){
        if ($this->gallery === null){
            $this->gallery = collect();
        }
        $this->categories = PortfolioCategory::all();
    }

    public function videoSet($filepath){
        $this->video = $filepath;
    }

    public function vidRemove(){
        if ($this->video) {
            $storagePath = str_replace(asset('storage/'), '', $this->video);
            if (Storage::disk('public')->exists($storagePath)) {
                Storage::disk('public')->delete($storagePath);
                $this->video = null;
            }
        }
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
        if ($this->categoryId && $this->title && $this->description && isset($this->image['image'])){
            $record = Portfolio::create([
                'title' => $this->title,
                'description' => $this->description,
                'category_id' => $this->categoryId,
                'image' => $this->image['image'],
                'text' => $this->text,
                'video' => $this->video,
            ]);
            if (!$this->gallery->isEmpty()){
                foreach ($this->gallery as $image){
                    PortfolioImage::create([
                        'portfolio_id' => $record->id,
                        'image_id' => $image['id']
                    ]);
                }
            }
            $this->dispatchBrowserEvent('flash-message', ['type' => 'success', 'message' => 'Uploaded successfully!']);
            return redirect()->to('/admin/portfolio');
        }else{
            if (!$this->title){
                $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Title required!']);
            }elseif(!$this->description){
                $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Description required!']);
            }elseif(!$this->categoryId){
                $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Category required!']);
            }elseif(!isset($this->image['image'])){
                $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Image required!']);
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.portfolio.create-portfolio');
    }
}
