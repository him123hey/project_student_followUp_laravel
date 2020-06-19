@extends('layouts.app')

@section('content')
<div class="sidebar">
  <a href="{{url('/home')}}">Student In Follow Up</a>
  <a href="{{route('students.index')}}">Student Out Follow Up</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
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
                    @if($student->active_followUP == 0)
                    <a href="#">
                    <tr>
                        <td>{{$student->id}}</td>
                        <td><img src="{{asset('img/'.$student->picture)}}" style="width:100px; height:100px;"></td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->lastName}}</td>
                        <td>{{$student->class}}</td>
                        <td>
                            <form action="{{route('inFollowUp', $student->id)}}" method="post">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-primary">Follow Up</button>&nbsp;&nbsp;
                            </form>
                        </td>
                    </tr>
                    </a>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
