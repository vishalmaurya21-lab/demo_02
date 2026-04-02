<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
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
        $students = Student::paginate(5);
        // dd($students);
        // return redirect()->route('student.show')->with('success', 'student a');
        return view('/student/dashboard', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::with('courses')->findOrFail($id);
        $courses = Course::all();
        return view('student.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $student->update($data);
        session(['username' => $student['name']]);
        $student->courses()->sync($request->course ?? []);

        return redirect()->route('student.show')->with('success', 'student record updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();
        session()->forget('username');
        return redirect()->route('student.show')->with('success', 'student delete successfully');
    }
    public function logout()
    {
        session()->forget('username');
        return redirect()->route('home')->with('success', 'student logout successfully');
    }
}
