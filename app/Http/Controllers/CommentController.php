<?php

namespace App\Http\Controllers;
use App\Student;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function Post(Request $request, $id){
        $student = Student::find($id);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->student_id = $student->id;
        $comment->user_id = auth::id();
        $comment->save();
        return back();
    }
    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
    public function showForm($id){
        $comment = Comment::find($id);
        return view('studentView.formEditComment', compact('comment'));
    }
    public function update(Request $request, $id){
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('students/'.$comment->student['id']);
    }
}
