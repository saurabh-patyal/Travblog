<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Post;

class PostController extends Controller
{
    public function post($postslug){

    	$post=Post::where('slug', '=', $postslug)->first();
    	return view('frontend.post',compact('post'));
    }
}
