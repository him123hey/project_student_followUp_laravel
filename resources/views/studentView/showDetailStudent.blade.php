@extends('layouts.app')

@section('content')
<div class="sidebar">
  <a href="{{url('/home')}}">Student In Follow Up</a>
  <a href="{{route('students.index')}}">Student Out Follow Up</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Student Detail Information</h2>
                </div>
                @foreach($students as $student)
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{asset('img/'.$student->profile)}}" style="width:100px;">
                        </div>
                        <div class="col-6">
                            <h2>{{$student->firstName}} {{$student->lastName}}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
