<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Laravel\Prompts\password;

class SupervisorController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $validator = Validator::make(
            $request->all(),
            [
                'ID' => 'required',
                'Full_Name' => 'required',
                'Email' => 'required|email',
                'Phone' => 'numeric',
                'Password' => 'required ',
                'Address' => 'string',
                'location' => 'string'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        Supervisor::create(array_merge(
            $validator->validated(),
            ['Password' => bcrypt($request->Password)]
        ));
        return response()->json([
            'message' => 'SuperVisor successfully Stored',
        ], 201);
    }

    public function index()
    {
        $supervisors = Supervisor::all();

        return response()->json(['supervisors' => $supervisors], 200);
    }


    public function getSupervisor($ID)
    {
        $supervisor = Supervisor::findOrFail($ID);

        return response()->json([
            'success' => true,
            'Supervisor' => $supervisor,
        ]);
    }


    //Update Function
    public function  update(Request $request, $id)
    {
        // Find the supervisor
        $supervisor = Supervisor::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }

        // Validate request data
        $validator = Validator::make(
            $request->only(['Full_Name', 'Email', 'Phone', 'Address',]),
            [
                'Full_Name' => 'required',
                'Email' => 'required|email',
                'Phone' => 'numeric',
                'Address' => 'string',

            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 400);
        }

        $supervisor->update([
            'Full_Name' => $request->Full_Name,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'Address' => $request->Address,
        ]);
        $supervisor->save();
        return response()->json(['message' => 'Supervisor updated successfully', 'supervisor' => $supervisor], 201);
    }

    //Delete Function 
    public function destroy($id)
    {
        $supervisor = Supervisor::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }

        $supervisor->destroy($id);
        return response()->json(['message' => 'Supervisor deleted successfully'], 200);
    }
}
