<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['student_first_name', 'student_last_name', 'student_email' , 'student_phone_number' , 'student_gender' , 'check_this' , 'student_image'];
    use HasFactory;

}
