<?php

namespace App;
use App\Student;
use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   public function comment(){
      return $this->hasMany(Comment::class);
   }
}
