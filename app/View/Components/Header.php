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
        $this->categories = Category::where('parent_category_id', null)->where('is_active', 1)->with('childrenRecursive')->get();
    }

    function getChildrenRecursive($category, &$visited = []) {
        // Check if the category has been visited
        if (in_array($category->id, $visited)) {
            // Category has been visited, return empty array to avoid infinite recursion
            return [];
        }

        // Add the category to the visited array
        $visited[] = $category->id;

        $children = $category->children;

        if ($children->isNotEmpty()) {
            foreach ($children as $child) {
                $child->children = getChildrenRecursive($child, $visited);
            }
        }

        return $children;
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
