<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:2|max:1000',
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->id();
        $comment->post_id = $request->post_id;
        $comment->save();

        return back();
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (auth()->user()->id !== $comment->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $comment->delete();

        return back();
    }
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        if (auth()->user()->id !== $comment->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        return view('comments.edit')->with('comment', $comment);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required|min:2|max:1000',
        ]);

        $comment = Comment::findOrFail($id);

        if (auth()->user()->id !== $comment->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $comment->body = $request->body;
        $comment->save();

        return redirect('/posts/' . $comment->post_id);
    }
    public function like($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->likes()->toggle(auth()->user());

        return back();
    }
    public function dislike($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->dislikes()->toggle(auth()->user());

        return back();
    }
    public function dislikeCount($id)
    {
        $comment = Comment::findOrFail($id);

        return $comment->dislikes()->count();
    }
    public function likeCount($id)
    {
        $comment = Comment::findOrFail($id);

        return $comment->likes()->count();
    }
    // public function isLiked($id)
    // {
    //     $comment = Comment::findOrFail($id);

    //     if (auth()->user()->likes()->where('comment_id', $comment->id)->count() > 0) {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isDisliked($id)
    // {
    //     $comment = Comment::findOrFail($id);

    //     if (auth()->user()->dislikes()->where('comment_id', $comment->id)->count() > 0) {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isOwner($id)
    // {
    //     $comment = Comment::findOrFail($id);

    //     if (auth()->user()->id === $comment->user_id) {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isAdmin()
    // {
    //     if (auth()->user()->role === 'admin') {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isModerator()
    // {
    //     if (auth()->user()->role === 'moderator') {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isAuthor()
    // {
    //     if (auth()->user()->role === 'author') {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isUser()
    // {
    //     if (auth()->user()->role === 'user') {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isGuest()
    // {
    //     if (auth()->user()->role === 'guest') {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isAdminOrModerator()
    // {
    //     if (auth()->user()->role === 'admin' || auth()->user()->role === 'moderator') {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isAdminOrModeratorOrAuthor()
    // {
    //     if (auth()->user()->role === 'admin' || auth()->user()->role === 'moderator' || auth()->user()->role === 'author') {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isAdminOrModeratorOrUser()
    // {
    //     if (auth()->user()->role === 'admin' || auth()->user()->role === 'moderator' || auth()->user()->role === 'user') {
    //         return true;
    //     }

    //     return false;
    // }
    // public function isAdminOrModeratorOrUserOrGuest()
    // {
    //     if (auth()->user()->role === 'admin' || auth()->user()->role === 'moderator' || auth()->user()->role === 'user' || auth()->user()->role === 'guest') {
    //         return true;
    //     }

    //     return false;
    // }
    
}
