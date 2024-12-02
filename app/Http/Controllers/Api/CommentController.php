<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentRequest;
use App\Http\Resources\Api\CommentResource;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all());
    }

    public function store(CommentRequest $request)
    {
        return new CommentResource(Comment::create($request->all()));
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());
        return new CommentResource($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(['message' => 'Comentario eliminado exitosamente']);
    }
}
