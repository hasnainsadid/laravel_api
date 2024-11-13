<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        if(count($students) > 0){
            return StudentResource::collection($students);
        } else {
            return response()->json([
                "message" => "No Students Found"
            ], 200);
        }
    }
    
    public function store(Request $request)
    {
        $students = Student::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return response()->json([
            "message" => "Student Created Successfully",
            "data" => new StudentResource($students)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'email' =>'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "Validation Error",
                "errors" => $validator->errors()
            ], 422);
        }
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return response()->json([
            'message' => 'Student Updated Successfully',
             'abc' => new StudentResource($student)
        ]);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            "message" => "Student Deleted Successfully"
        ], 200);
    }
}
