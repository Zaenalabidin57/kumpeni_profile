<?php

namespace App\View\Components\Frontend;

use Illuminate\View\Component;

class CardPost extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title,$image,$slug;
    public function __construct($title,$image,$slug)
    {
        $this->title = $title;
        $this->image = $image;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.card-post',[
            'title' => $this->title,
            'image' => $this->image,
            'slug' => $this->slug
        ]);
    }
}
