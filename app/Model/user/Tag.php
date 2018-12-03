<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use App\Model\user\Post;

class Tag extends Model
{
    public function posts(){
    	return $this->belongsToMany('App\Model\user\Post','post_tags');
    }
}
