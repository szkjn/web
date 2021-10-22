<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   //
   /**
    * Fillable fields for a course
    *
    * @return array
    */
   protected $fillable = ['comment','votes','spam','reply_id','post_id','users_id'];
   protected $dates = ['created_at', 'updated_at'];

   public function replies()
   {
       return $this->hasMany('App\Comment','id','reply_id');
   }
}