<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentSpam extends Model
{
   //
   protected $fillable = ['comment_id','user_id'];
   protected $table = "comment_spam";
   public $timestamps = false;
}