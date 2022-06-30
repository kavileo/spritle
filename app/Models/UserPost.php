<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function postliked() {
        return $this->hasMany('App\Models\PostLike','post_id','id');
    }

    public function postcomment(){
        return $this->hasMany('App\Models\PostComment','post_id','id');
    }
}
