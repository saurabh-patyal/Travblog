<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Post;
class HomeController extends Controller
{
    public function view(){
    	$posts=Post::paginate(3);
    	
    	 return view('frontend.home',compact('posts'));
    }
}
