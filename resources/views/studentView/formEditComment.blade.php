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
           <form action="{{route('updateComment', $comment->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="comment">Edit Comment</label>
                    <input type="text" name="comment" id="comment" value="{{$comment->comment}}" class="form-control">
                </div>
                <button class="btn btn-primary">Edit</button>
           </form>
        </div>
    </div>
</div>
@endsection
