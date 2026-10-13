<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return response()->json(['comments' => Comment::with('user')->where('order_id', $request->order_id)->orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {

        $comment = Comment::create($request->all() + ["user_id" => Auth::id()]);
        return response()->json(['comment' => $comment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return response()->json(['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());
        return response()->json(['comment' => $comment]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(['massage' => 'ok']);
    }
}
