<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $validator = Validator::make(
            $request->all(),
            [
                'ID' => 'required',
                'FullName' => 'required',
                'Parent_ID' => 'required',
                'grade' => 'required',
                'class' => 'required',
                'Supervisor_ID' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        Student::create(array_merge($validator->validated()));
        return response()->json([
            'message' => 'Student successfully Stored',
        ], 201);
    }

    public function index()
    {
        $Students = Student::all();

        return response()->json(['Students' => $Students], 200);
    }

    //Update Student
    public function  update(Request $request, $id)
    {
        // Find the supervisor
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'student not found'], 404);
        }

        // Validate request data
        $validator = Validator::make(
            $request->only(['FullName', 'Parent_ID', 'grade', 'class', 'Supervisor_ID',]),
            [
                'FullName' => 'sometimes',
                'Parent_ID' => 'sometimes',
                'grade' => 'sometimes',
                'class' => 'sometimes',
                'Supervisor_ID' => 'sometimes',

            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 400);
        }

        $oldstudent = Student::find($id);
        if (!$oldstudent) {
            return response()->json(['message' => 'student not found'], 404);
        }

        $student->update([
            'FullName' => $request->FullName ?? $oldstudent->FullName,
            'Parent_ID' => $request->Parent_ID ?? $oldstudent->Parent_ID,
            'grade' => $request->grade ?? $oldstudent->grade,
            'class' => $request->class ?? $oldstudent->class,
            'Supervisor_ID' => $request->Supervisor_ID ?? $oldstudent->Supervisor_ID,
        ]);
        $student->save();
        return response()->json(['message' => 'student updated successfully', 'student' => $student], 201);
    }


    public function getStudent($ID)
    {
        $parent = Student::findOrFail($ID);
        if ($parent) {
            return response()->json([
                'success' => true,
                'Student' => $parent,
            ]);
        } {
            return $this->apiresponse(null, 'Student Table Not Found', 404);
        }
    }

    public function destroy($id)
    {
        $supervisor = Student::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $supervisor->destroy($id);
        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}
