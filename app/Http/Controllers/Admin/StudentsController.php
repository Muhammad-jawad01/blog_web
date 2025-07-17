<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Students = Students::all();

        return view('admin.Students.index', compact('Students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255|',
            'email' => 'required|max:255|unique:Students,email',
            'address' => 'required|string',
            'rollno' => 'required',
        ]);

        Students::create($request->all());
        return redirect()->route('admin.Students.index')->with('success', 'Student added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $Students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Students = Students::findOrFail($id);

        return view('admin.Students.edit', compact('Students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           

        $Students = Students::findOrFail($id);
        $Students->name = $request->name;
        $Students->father_name = $request->father_name;
        $Students->email = $request->email;
        $Students->address = $request->address;
        $Students->rollno = $request->rollno;
        $Students->save();
        return redirect()->route('admin.Students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
         $Students = Students::findOrFail($id);
        $Students->delete();
        return redirect()->route('admin.Students.index')->with('success', 'Student deleted successfully.');
    }
}
