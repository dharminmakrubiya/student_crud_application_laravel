<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::latest()->paginate(5);

        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'student_first_name'          =>  'required',
            'student_email'         =>  'required|email|unique:students',
            'student_image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $file_name = time() . '.' . request()->student_image->getClientOriginalExtension();

        request()->student_image->move(public_path('images'), $file_name);

        $student = new Student;

        $student->student_first_name = $request->student_first_name;
        $student->student_last_name = $request->student_last_name;
        $student->student_email = $request->student_email;
        $student->student_phone_number = $request->student_phone_number;
        $student->student_gender = $request->student_gender;
        $student->check_this = $request->check_this;
        $student->student_image = $request->student_image;

        $student->save();

        echo "<pre>";
        print_r($student);

        return redirect()->route('students.view')->with('success', 'Student Added successfully.');
    }
}
