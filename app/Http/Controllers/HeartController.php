<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class HeartController extends Controller
{
    //

    public function like(Request $request)
    {
        $user = $request->user();
        $post = Post::find($request->post_id);
        $post->likes()->attach($user);
        return response()->json(['success' => true]);
    }
    public function unlike(Request $request)
    {
        $user = $request->user();
        $post = Post::find($request->post_id);
        $post->likes()->detach($user);
        return response()->json(['success' => true]);
    }
    public function getLikes(Request $request)
    {
        $post = Post::find($request->post_id);
        return response()->json(['likes' => $post->likes()->count()]);
    }
    public function getLikesByPost(Request $request)
    {
        $post = Post::find($request->post_id);
        return response()->json(['likes' => $post->likes()->get()]);
    }
    public function getLikesByUser(Request $request)
    {
        $user = User::find($request->user_id);
        return response()->json(['likes' => $user->likes()->get()]);
    }
    public function getLikesByUserAndPost(Request $request)
    {
        $user = User::find($request->user_id);
        $post = Post::find($request->post_id);
        return response()->json(['likes' => $user->likes()->where('post_id', $post->id)->get()]);
    }
    public function getLikesByUserAndPostAndComment(Request $request)
    {
        $user = User::find($request->user_id);
        $post = Post::find($request->post_id);
        $comment = Comment::find($request->comment_id);
        return response()->json(['likes' => $user->likes()->where('post_id', $post->id)->where('comment_id', $comment->id)->get()]);
    }
    public function getLikesByUserAndPostAndCommentAndReply(Request $request)
    {
        $user = User::find($request->user_id);
        $post = Post::find($request->post_id);
        $comment = Comment::find($request->comment_id);
        $reply = Comment::find($request->reply_id);
        return response()->json(['likes' => $user->likes()->where('post_id', $post->id)->where('comment_id', $comment->id)->where('reply_id', $reply->id)->get()]);
    }
    public function getLikesByUserAndPostAndCommentAndReplyAndReply(Request $request)
    {
        $user = User::find($request->user_id);
        $post = Post::find($request->post_id);
        $comment = Comment::find($request->comment_id);
        $reply = Comment::find($request->reply_id);
        $reply2 = Comment::find($request->reply2_id);
        return response()->json(['likes' => $user->likes()->where('post_id', $post->id)->where('comment_id', $comment->id)->where('reply_id', $reply->id)->where('reply2_id', $reply2->id)->get()]);
    }
    public function getLikesByUserAndPostAndCommentAndReplyAndReplyAndReply(Request $request)
    {
        $user = User::find($request->user_id);
        $post = Post::find($request->post_id);
        $comment = Comment::find($request->comment_id);
        $reply = Comment::find($request->reply_id);
        $reply2 = Comment::find($request->reply2_id);
        $reply3 = Comment::find($request->reply3_id);
        return response()->json(['likes' => $user->likes()->where('post_id', $post->id)->where('comment_id', $comment->id)->where('reply_id', $reply->id)->where('reply2_id', $reply2->id)->where('reply3_id', $reply3->id)->get()]);
    }

}
