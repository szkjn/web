<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentVote extends Model
{
   //
   protected $fillable = ['comment_id','user_id','vote'];
   protected $table = "comment_user_vote";
   public $timestamps = false;
}