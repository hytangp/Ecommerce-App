<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $data = User::paginate(5);

        if(is_null($data))
        {
            return response()->json(['message' => 'User not Found'], 404);
        }
        return response()->json($data, 200);
    }

    public function createUser(Request $request)
    {
        $data = User::create($request->all());
        return response($data, 201);
    }

    public function editUser(Request $request, $id)
    {
        $data = User::find($id);
        if(is_null($data))
        {
            return response()->json(['message' => 'User not Found'], 404);
        }
        $data->update($request->all());
        return response($data, 200);
    }

    public function deleteUser(Request $request, $id)
    {
        $data = User::find($id);
        if(is_null($data))
        {
            return response()->json(['message' => 'User not Found'], 404);
        }
        $data->delete();
        return response($data, 200);
    }
}
