<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\user\Post;
use App\Model\user\Tag;
use App\Model\user\Category;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        $posts=Post::all();
        return view('admin/posts/posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags=Tag::all();
        $categories=Category::all();
        return view('admin/posts/createposts',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'tags'=>'required',
            'categories'=>'required',
            'image'=>'required'
        ]);

            $img=$request->image->store('public');
           // $imgname=$request->image->getClientOriginalName();
            $post=new Post;

            $post->title=$request->title;
            $post->subtitle=$request->subtitle;
            $post->slug=$request->slug;
            $post->image=$img;
            $post->body=$request->body;
            $post->save();
            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->categories);
            return redirect(route('posts.index'))->with('message','Post Created successfully');;

        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::with('tags','categories')->find($id);
        
        $tags=Tag::all();
        $categories=Category::all();
            return view('admin/posts/edit',compact('post','tags','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

        $this->validate($request,[

            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'tags'=>'required',
            'categories'=>'required',
            'image'=>'required'
        ]);
        $request->image->store('public');
        $post=Post::find($id);
        $post->title=$request->title;
            $post->subtitle=$request->subtitle;
            $post->slug=$request->slug;
            $post->body=$request->body;
            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->categories);
            $post->save();

            return redirect(route('posts.index'))->with('message','Post Updated successfully');;
           
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
            return redirect(route('posts.index'))->with('message','Post Deleted successfully');
       
    }
}
