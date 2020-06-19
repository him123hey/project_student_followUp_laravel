<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card mt-5">
                    <div class="card-header bg-success text-center text-light">
                        <h2>Form Edit Student</h2>
                    </div>
                    <div class="card-body">
                    <form action="{{route('students.update', $students->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name..." value="{{$students->firstName}}">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name..." value="{{$students->lastName}}">
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="text" name="class" id="class" class="form-control" placeholder="Class..." value="{{$students->class}}">
                    </div>
                    <div class="form-group">
                        <label for="user">Turtor</label>
                        <select name="user" id="user" class="form-control">
                            <option selected disabled>Tutor</option>
                            @foreach($users as $user)
                                @if($user->role== 0)
                                    <option <?php if($students->user_id == $user->id){?>selected="selected"<?php } ?> value="{{$user->id}}">{{$user->firstName." ".$user->lastName}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <input type="file" name="profile" id="profile" value="{{$students->picture}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="67" rows="3">{{$students->description}}</textarea>
                    </div>
                    <button type="submite" class="btn btn-success">Edit Student</button>
                    <a href="{{route('home')}}" class="btn btn-danger float-right">Cancel</a>
                </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>
</html>