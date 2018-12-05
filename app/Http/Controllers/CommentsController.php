<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Thread;

class CommentsController extends Controller
{
    public function store(Thread $thread){
    	Comment::create([
    		'body' => request('body'),
    		'thread_id' => $thread->id,
    		'user_id' => auth()->id(),
    		'created_at' => request('created_at')
    	]);

    	return back();
    }
}
