<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guard = [];
 
        public function user(){
            return $this->belongsTo(User::class,'user_id','id');
        }
        public function profile(){
            return $this->hasOneThrough(UserProfile::class,User::class,"id","user_id","user_id");
        }
}
