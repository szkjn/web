<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\CommentVote;
use App\Models\CommentSpam;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       $this->validate($request, [
       'comment' => 'required',
    //    'reply_id' => 'filled',
       'post_id' => 'filled',
       'users_id' => 'required',
    
       ]);
       $comment = Comment::create($request->all());
       if($comment)
           return [ "status" => "true","commentId" => $comment->id ];
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  $commentId
    * @param  $type
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request,$voteType, $id)
    {        
        $existingComment = Comment::find($id);

         if($voteType == "up"){
            $vote = $existingComment->votes;
            $vote++;
            $existingComment->votes = $vote;
            $existingComment->votes = $vote;
            $existingComment->save();
            return $existingComment;
         }

         if($voteType == "down"){
            $vote = $existingComment->votes;
            $vote--;
            $existingComment->votes = $vote;
            $existingComment->votes = $vote;
            $existingComment->save();
            return $existingComment;
         }
    }


    /**
    * Get Comments for postId
    *
    * @return Comments
    */
//    public function index($postId)
//    {
//        //
//        $comments = Comment::where('post_id',$postId)->get();
//        $commentsData = [];
//        foreach ($comments as $key) {
//            $user = User::find($key->users_id);
//            $name = $user->name;
//            $replies = $this->replies($key->id);
//            $photo = $user->first()->photo_url;
//            // dd($photo->photo_url);
//            $reply = 0;
//            $vote = 0;
//            $voteStatus = 0;
//            $spam = 0;
//            if(Auth::user()){
//                $voteByUser = CommentVote::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
//                $spamComment = CommentSpam::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();              
//                if($voteByUser){
//                    $vote = 1;
//                    $voteStatus = $voteByUser->vote;
//                }
//                if($spamComment){
//                    $spam = 1;
//                }
//            }          
//         //    if(sizeof($replies) > 0){
//         //        $reply = 1;
//         //    }
//            if(!$spam){
//                array_push($commentsData,[
//                    "name" => $name,
//                    "photo_url" => (string)$photo,
//                    "commentid" => $key->id,
//                    "comment" => $key->comment,
//                    "votes" => $key->votes,
//                    "reply" => $reply,
//                    "votedByUser" =>$vote,
//                    "vote" =>$voteStatus,
//                    "spam" => $spam,
//                    "replies" => $replies,
//                    "date" => $key->created_at->toDateTimeString()
//                ]);
//            }       
//        }
//        $collection = collect($commentsData);
//        return $collection->sortBy('votes');
//    }

   protected function replies($commentId)
   {
       $comments = Comment::where('reply_id',$commentId)->get();
       $replies = [];
       foreach ($comments as $key) {
           $user = User::find($key->users_id);
           $name = $user->name;
           $photo = $user->first()->photo_url;
           $vote = 0;
           $voteStatus = 0;
           $spam = 0;        
           if(Auth::user()){
               $voteByUser = CommentVote::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
               $spamComment = CommentSpam::where('comment_id',$key->id)->where('user_id',Auth::user()->id)->first();
               if($voteByUser){
                   $vote = 1;
                   $voteStatus = $voteByUser->vote;
               }
               if($spamComment){
                   $spam = 1;
               }
           }
           if(!$spam){        
               array_push($replies,[
                   "name" => $name,
                   "photo_url" => $photo,
                   "commentid" => $key->id,
                   "comment" => $key->comment,
                   "votes" => $key->votes,
                   "votedByUser" => $vote,
                   "vote" => $voteStatus,
                   "spam" => $spam,
                   "date" => $key->created_at->toDateTimeString()
               ]);
            }
        $collection = collect($replies);
        return $collection->sortBy('votes');
        }
    }

    public function indexApi(Request $request)
   {
        $comments = Comment::all();
        return $comments;
    }

    public function index()
    {
        $comments = Comment::all();
        return view('comments.index');
    }

    public function destroy($id)
    {
        $user = Comment::findOrFail($id);
        $user->delete();
    }
}