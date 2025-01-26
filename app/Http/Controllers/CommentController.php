<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with(['course', 'student'])->get();
        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id'
        ]);

        $comment = Comment::create($request->all());
        return response()->json($comment, 201); // 201 means created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::with(['course', 'student'])->find($id);
        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::find($id);
        
        $request->validate([
            'comment' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id'
        ]);

        $comment->update($request->all());
        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json(null, 204); // 204 means no content
    }
}
