<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show all students
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    // Show form to create a student
    public function create()
    {
        return view('students.create');
    }

    // Save new student
    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect()->route('students.index');
    }

    // Show specific student
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // Show form to edit a student
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update existing student
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('students.index');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}