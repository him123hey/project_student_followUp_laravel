<?php

namespace App\Http\Controllers;
use App\Student;
use App\User;
use App\Comment;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('studentView.studentOutFollowUp', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('studentView.formaddstudent', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = New Student;
        $student->firstName = $request->get('firstName');
        $student->lastName = $request->get('lastName');
        $student->class = $request->get('class');
        $student->description = $request->get('description');
        $student->active_followUp = 1;
        $student->user_id = $request->get('user');
        if ($request->hasfile('profile')){
            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). ".".$extension;
            $file->move('img/', $filename);
            $student->picture = $filename;
            $student->save();
            }
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $user = User::find($id);
        $comments = $student->comments;
        
        return view('studentView.showDetailStudent', compact('student','comments','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::find($id);
        $users = User::all();
        return view('studentView.formEditStudent',compact('students', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->class = $request->class;
        $student->description = $request->description;
        $student->user_id = $request->user;
        $student->save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addIntoFollowUp($id){
        $student = Student::find($id);
        $student->active_followUp = 1;
        $student->save();
        return redirect('/home');
    }
    public function outFollowUp($id){
        $student = Student::find($id);
        $student->active_followUp = 0;
        $student->save();
        return redirect('/home');
    }
}
