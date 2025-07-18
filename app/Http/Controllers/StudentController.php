<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Education;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with('educations')->get();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'educations.*.degree' => 'required',
            'educations.*.institution' => 'required',
            'educations.*.year' => 'required|digits:4',
        ]);

        $student = Student::create($request->only('name', 'email'));

        foreach ($request->educations as $edu) {
            $student->educations()->create($edu);
        }

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $student->load('educations');
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'educations.*.degree' => 'required',
            'educations.*.institution' => 'required',
            'educations.*.year' => 'required|digits:4',
        ]);

        $student->update($request->only('name', 'email'));

        // Delete old and recreate (or you can update smarter)
        $student->educations()->delete();
        foreach ($request->educations as $edu) {
            $student->educations()->create($edu);
        }

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
