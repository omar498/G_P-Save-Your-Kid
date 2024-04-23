<?php

namespace App\Http\Controllers\Api;

use App\Models\Parents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ParentResource;
use Illuminate\Support\Facades\Validator;
use App\Heelpers\Apiresponse;

class ParentController extends Controller
{


    public function index() //Have route
    {

        $parent = Parents::all();
        return ParentResource::collection($parent);
    }

    public function getParent($ID)
    {
        $parent = Parents::findOrFail($ID);
        if ($parent) {
            return response()->json([
                'success' => true,
                'parent  parent' => $parent,
            ]);
        } {
            return $this->apiresponse(null, 'Parent Table Not Found', 404);
        }
    }

    public function store(Request $request)
    {
        // Validate request data
        $validator = Validator::make(
            $request->all(),
            [
                'ID' => 'required',
                'Full_Name' => 'required',
                'Password' => 'required',
                'Child_Name' => 'required',
                'Email' => 'required',
                'address' => 'required',
                'Phone' => 'required',
                'Supervisor_ID' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        Parents::create(array_merge(
            $validator->validated(),
            ['Password' => bcrypt($request->Password)]
        ));
        return response()->json([
            'message' => 'User successfully Stored',
        ], 201);
    }

    /* public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID' => 'required |unique',
            'Full_Name' => 'required',
            'Password' => 'required',
            'Child_Name' => 'required',
            'Email' => 'required |unique:parent|',
            'address' => 'required',
            'Phone' => 'required',
            'Supervisor_ID' => 'required |unique:parent|',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        Parents::create(array_merge(
            $validator->validated(),
            ['Password' => bcrypt($request->Password)]
        ));
        return response()->json([
            'message' => 'User successfully Stored',
        ], 201);
    }
 */
    public function update(Request $request, $id) //have route//Did't work because restricted taples in DB

    {
        $validator = Validator::make($request->all(), [
            'ID' => 'required',
            'Full_Name' => 'required',
            'Password' => 'required',
            'Child_Name' => 'required',
            'Email' => 'required',
            'address' => 'required',
            'Phone' => 'required',
            'Supervisor_ID' => 'required',
        ]);

        $supervisor = Parents::find($id);

        if (!$supervisor) {
            return response()->json(['message' => 'Supervisor not found'], 404);
        }

        $supervisor->update($request->all());

        return response()->json(['message' => 'Supervisor updated successfully', 'supervisor' => $supervisor], 200);
    }

    public function destroy($id)
    {
        $parent = Parents::find($id);

        if (!$parent) {
            return response()->json(['message' => 'parent not found'], 404);
        }

        Parents::destroy($parent);

        return response()->json(['message' => 'parent deleted successfully'], 200);
    }
}
