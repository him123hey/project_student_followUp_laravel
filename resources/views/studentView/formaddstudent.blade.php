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
                        <h2>Form Add New Student</h2>
                    </div>
                    <div class="card-body">
                    <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name...">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name...">
                    </div>
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="text" name="class" id="class" class="form-control" placeholder="Class...">
                    </div>
                    <div class="form-group">
                        <label for="user">Turtor</label>
                        <select name="user" id="user" class="form-control">
                                    <option selected disabled>Choose turtor...</option>
                            @foreach($users as $user)
                                @if($user->role == 0)
                                    <option value="{{$user->id}}">{{$user->firstName}} {{$user->lastName}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <input type="file" name="profile" id="profile">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="67" rows="3"></textarea>
                    </div>
                    <button type="submite" class="btn btn-success">Add Student</button>
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