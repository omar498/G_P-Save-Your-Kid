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

        // Create Supervisor
        /* $supervisor = Supervisor::create($request->all());

        return response()->json(['message' => 'Supervisor created successfully', 'supervisor' => $supervisor], 201);
     */
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        Supervisor::create(array_merge(
            $validator->validated(),
            ['Password' => bcrypt($request->Password)]
        ));
        return response()->json([
            'message' => 'User successfully Stored',
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


    /*    public function update(Request $request, $id)
    {
        // Validate request data
        $supervisor = Validator::make(
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

        $supervisor = Supervisor::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }


        $supervisor->update([
            'ID' => $request->ID ?? $request->ID,
            'Full_Name' => $request->Full_Name ?? $request->Full_Name,
            'Email' => $request->Email ?? $request->Email,
        ]);

        return response()->json(['message' => 'Supervisor updated successfully', 'supervisor' => $supervisor], 200);
    }
 */
    /////////////////////////////////////////////////////////////////////

    public function update(Request $request, $id)
    {
        // Find the supervisor
        $supervisor = Supervisor::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }

        // Validate request data
        $validator = Validator::make(
            $request->only(['ID', 'Full_Name', 'Email',]),
            [
                'ID' => 'required',
                'Full_Name' => 'required',
                'Email' => 'required|email',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 400);
        }

        // Update only the attributes provided in the request
        $attributes = $request->only(['ID', 'Full_Name', 'Email',]);

        // Filter out null values
        $attributes = array_filter($attributes, function ($value) {
            return $value !== null;
        });

        // Update the supervisor with the filtered attributes
        $supervisor->update($attributes);

        return response()->json(['message' => 'Supervisor updated successfully', 'supervisor' => $supervisor], 200);
    }


    /////////////////////////////////////////////////////////////////////
    public function destroy($id)
    {
        $supervisor = Supervisor::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }

        $supervisor->delete();
        return response()->json(['message' => 'Supervisor deleted successfully'], 200);
    }
}
