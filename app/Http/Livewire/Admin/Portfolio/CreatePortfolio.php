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
    public $image;
    public $gallery;
    public $video;
    public $categoryId;
    public $text;
    public $oldVideo;
    public $flashMessage;
    public $update;

    protected $listeners = ['setToUpdate' => 'update' , 'updValues' => 'setVal', 'video' => 'videoSet', 'updateTextContent' => 'setTextContent'];

    public function mount(){
        if ($this->gallery === null){
            $this->gallery = collect();
        }
        $this->categories = PortfolioCategory::all();
    }

    public function update($update){
        if ($update == 'create' && $this->update != null){
            $this->update = null;
            $this->title = '';
            $this->description = '';
            $this->image = '';
            $this->gallery = collect();
            $this->video = '';
            $this->oldVideo = '';
            $this->categoryId = '';
            $this->text = '';
            $this->emit('setUpVid', null);
        }elseif($update != 'create'){
            $prtflio = Portfolio::findOrFail($update);
            $this->update = $prtflio;
            $this->title = $prtflio->title;
            $this->description = $prtflio->description;
            $this->image = $prtflio->image;
            $this->gallery = $prtflio->gallery()->get();
            $this->video = $prtflio->video;
            $this->categoryId = $prtflio->category_id;
            $this->text = $prtflio->text;
            $this->emit('setUpVid', $prtflio->video);
        }
    }

    public function videoSet($filepath){
        $this->video = $filepath;
    }

    public function vidRemove(){
        if (!$this->update && $this->video) {
            $storagePath = str_replace(asset('storage/'), '', $this->video);
            if (Storage::disk('public')->exists($storagePath)) {
                Storage::disk('public')->delete($storagePath);
                $this->video = null;
            }
        } elseif($this->video && $this->oldVideo){
            $storagePath = str_replace(asset('storage/'), '', $this->video);
            if (Storage::disk('public')->exists($storagePath)) {
                Storage::disk('public')->delete($storagePath);
                $this->video = null;
            }
        } elseif($this->update && $this->video && !$this->oldVideo){
            $this->oldVideo = $this->video;
            $this->video = null;
        }
    }

    public function setVal($val, $varName)
    {
        if ($varName == "image"){
            $img = Image::find($val);
            $this->image = $img['image'];
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
        $this->image = '';
    }

    public function removeGal($id)
    {
        $this->gallery = $this->gallery->filter(function ($image) use ($id) {
            return $image['id'] !== $id; // Keep all items where the ID is not equal to $id
        });
    }

    public function submit(){
        if (!$this->update){
            if ($this->categoryId && $this->title && $this->description && $this->image){
                $record = Portfolio::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'category_id' => $this->categoryId,
                    'image' => $this->image,
                    'text' => $this->text,
                    'video' => $this->video,
                ]);
                if (!$this->gallery->isEmpty()){
                    $imageIds = collect($this->gallery)->pluck('id')->toArray();
                    $record->gallery()->attach($imageIds);
                }
                $this->dispatchBrowserEvent('flash-message', ['type' => 'success', 'message' => 'Uploaded successfully!']);
                $this->emit('close');
                $this->emit('load');
            }else{
                if (!$this->title){
                    $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Title required!']);
                }elseif(!$this->description){
                    $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Description required!']);
                }elseif(!$this->categoryId){
                    $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Category required!']);
                }elseif($this->image){
                    $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Image required!']);
                }
            }
        }elseif($this->update){
            if ($this->oldVideo){
                $storagePath = str_replace(asset('storage/'), '', $this->oldVideo);
                if (Storage::disk('public')->exists($storagePath)) {
                    Storage::disk('public')->delete($storagePath);
                    $this->oldVideo = null;
                }
            }
            if ($this->categoryId && $this->title && $this->description && $this->image){
                $this->update->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'category_id' => $this->categoryId,
                    'image' => $this->image,
                    'text' => $this->text,
                    'video' => $this->video,
                ]);
                if (!$this->gallery->isEmpty()){
                    $imageIds = collect($this->gallery)->pluck('id')->toArray();
                    $this->update->gallery()->sync($imageIds);
                }
                $this->dispatchBrowserEvent('flash-message', ['type' => 'success', 'message' => 'Uploaded successfully!']);
                $this->emit('close');
                $this->emit('load');
            }else{
                if (!$this->title){
                    $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Title required!']);
                }elseif(!$this->description){
                    $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Description required!']);
                }elseif(!$this->categoryId){
                    $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Category required!']);
                }elseif($this->image){
                    $this->dispatchBrowserEvent('flash-message', ['type' => 'error', 'message' => 'Image required!']);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.portfolio.create-portfolio');
    }
}
