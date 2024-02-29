<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Header extends Component
{

    public $categories;
    public $categoriesChild;
    public $category;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Category::doesnthave('children')->where('parent_category_id', null)->get();
        $this->categoriesChild = Category::has('children')->get();
    }

    public function onHover($id) {
        $this->category = Category::find($id);
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
