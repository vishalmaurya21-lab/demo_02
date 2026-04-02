<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('student.home', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $student = Student::create($data);
        if ($request->has('courses')) {
            $student->courses()->attach($request->courses);
        }
        session(['username' => $student['name']]);
        return redirect()->route('student.show')->with('success', 'student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $students = Student::all();
        // dd($students);
        // return redirect()->route('student.show')->with('success', 'student a');
        return view('/student/dashboard', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
