<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use App\Model\user\Tag;
use App\Model\user\Category;

class Post extends Model
{
    

    public function tags(){
    	return $this->belongsToMany('App\Model\user\Tag','post_tags')->withTimestamps();
    }

    public function categories(){
    	return $this->belongsToMany('App\Model\user\Category','category_posts')->withTimestamps();
    }
}
