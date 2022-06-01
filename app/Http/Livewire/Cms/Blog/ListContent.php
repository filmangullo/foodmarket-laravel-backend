<?php

namespace App\Http\Livewire\Cms\Blog;

use App\Http\Controllers\CMS\BlogController;
use Livewire\Component;


class ListContent extends Component
{
    public function render()
    {
        $data = json_decode(BlogController::getPosts(), true);

        return view('livewire.cms.blog.list-content', compact('data'));
    }
}
