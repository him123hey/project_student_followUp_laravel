@extends('layouts.app')

@section('content')
<div class="sidebar">
  <a href="{{url('/home')}}">Student In Follow Up</a>
  <a href="{{route('students.index')}}">Student Out Follow Up</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center">
                    <a href="{{url('/home')}}" class="btn btn-warning float-left">Back</a>
                    <img src="{{asset('img/'.$students->picture)}}" class="rounded-circle" style="width:200px; height:200px">
                    <h3><strong>Student Name:</strong> {{$students->firstName}} {{$students->lastName}}</h3>
                </div>
                <div class="card-body">
                    <h5><strong>Class:</strong> {{$students->class}}</h5>
                    <p><strong>Description:</strong> {{$students->description}}</p>
                    @if($students->user_id !== null)
                    <p><strong>TuTor:</strong> {{$users->firstName." ".$users->lastName}}</p>
                    @else
                    <p><strong>TuTor:</strong>..........</p>
                    @endif
                    <hr>
                    <form action="#">
                        <input type="text" name="comment" id="comment" class="form-control" placeholder="comment...">
                        <button class="btn btn-primary mt-2" type="submit">Post</button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
