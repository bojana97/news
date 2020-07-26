<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store( Request $request){

        $this->validate( $request, [
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->comment = $request->input('comment');
        $comment->page_id = $request->input('page_id');
        $comment->user_id = Auth()->user()->id;

        $comment->save();

        return back()->with('success', 'Your comment is saved.');

    }
}
