@extends('layouts.app')

@section('content')
<div class="sidebar">
  <a class="active" href="{{url('/home')}}">Student In Follow Up</a>
  <a href="{{route('students.index')}}">Student Out Follow Up</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
        <a href="{{route('students.create')}}" class="btn btn-success">Add Student</a>
            <table class="table table-bordered mt-4 text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Profile</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                     @if($student->active_followUP == 1)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td><img src="{{asset('img/'.$student->picture)}}" style="width:100px;"></td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->class}}</td>
                        <td>
                            <a href="#" class="text-primary">Edit</a>
                            <a href="{{route('students.show', $student->id)}}" class="text-success">View Detail</a>
                            <a href="#" class="text-danger">Out Follow Up</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
