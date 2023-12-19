<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard');
    }

    public function index()
    {
        $users = User::where('role','student')->orderBy('id','desc')->get();
        return view('student.index', ['students' => $users]);
    }
}

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Student  $student
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Student $student)
//     {
//         // $class = Grade::with('subjects')->where('id', $student->class_id)->first();

//         // return view('backend.students.show', compact('class','student'));
//     }

