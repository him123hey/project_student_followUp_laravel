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
                    <img src="{{asset('img/'.$student->picture)}}" class="rounded-circle" style="width:200px; height:200px">
                    <h3><strong>Student Name:</strong> {{$student->firstName}} {{$student->lastName}}</h3>
                </div>
                <div class="card-body">
                    <h5><strong>Class:</strong> {{$student->class}}</h5>
                    <p><strong>Description:</strong> {{$student->description}}</p>
                    @if($student->user_id !== null)
                    <p><strong>TuTor:</strong> {{$user->firstName." ".$user->lastName}}</p>
                    @else
                    <p><strong>TuTor:</strong>..........</p>
                    @endif
                    <hr>
                    <form action="{{route('postComment',$student->id)}}" method="post">
                        @csrf
                        @method('post')
                        <input type="text" name="comment" id="comment" class="form-control" placeholder="comment...">
                        <button class="btn btn-primary mt-2" type="submit">Post</button>
                    </form>
                    <hr>
                    @foreach($comments as $comment)
                    @if($comment->user_id == Auth::id())
                    <div class="card m-2" style="padding:10px;">
                        <p>{{$comment->comment}}</p>
                        <a href="{{route('showEdit', $comment->id)}}" class="text-warning">Edit</a>
                        <a href="{{route('deleteComment',$comment->id)}}" class="text-danger">Delete</a>
                    </div>
                    @else
                    <div class="card m-2" style="padding:10px;">
                        <p>{{$comment->comment}}</p>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
