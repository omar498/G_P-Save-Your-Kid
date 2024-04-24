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
                'parent' => $parent,
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
                'Password' => 'required ',
                'Child_Name' => 'required',
                'Email' => 'required',
                'Phone' => 'required',
                'address' => 'required',
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
            'message' => 'Parent successfully Stored',
        ], 201);
    }
    //Update Function
    public function update(Request $request, $id)

    {
        $validator = Validator::make($request->only(['Full_Name', 'Email', 'address', 'Phone',]), [
            'Full_Name' => 'required',
            'Email' => 'required',
            'address' => 'required',
            'Phone' => 'required',

        ]);

        $Parent = Parents::find($id);

        if (!$Parent) {
            return response()->json(['message' => 'Parent not found'], 404);
        }

        $Parent->update([
            'Full_Name' => $request->Full_Name,
            'Email' => $request->Email,
            'Phone' => $request->Phone,
            'Address' => $request->address,
        ]);


        return response()->json(['message' => 'Parent updated successfully', 'Parent' => $Parent], 200);
    }

    public function destroy($id)
    {
        $Parent = Parents::find($id);

        if (!$Parent) {
            return response()->json(['message' => 'Parent not found'], 404);
        }

        $Parent->destroy($id);
        return response()->json(['message' => 'Parent deleted successfully'], 200);
    }
}
