<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PostDetailController extends Controller
{
    public function show($slug)
    {
        return view('posts.post-detail', ['slug' => $slug]);
    }
}
