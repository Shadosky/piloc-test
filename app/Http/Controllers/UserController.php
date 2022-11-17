<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function add(AddUserRequest $request)
    {

        $user = User::create([
            'firstname' => $request->getFirstname(),
            'lastname' => $request->getLastname(),
            'email' => $request->getEmail(),
            'password' => $request->getHashedPassword(),
            'admin' => $request->isAdmin(),
            'landlord' => $request->isLandlord()
        ]);

        return response()->json($user, 201);
    }

    public function listAll()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    public function getOne($id)
    {
        $user = User::find($id);
        return response()->json($user, 200);
    }

    public function edit(UpdateUserRequest $request)
    {
        $user = User::find($request->getId());

        $user->firstname = $request->getFirstname();
        $user->lastname = $request->getLastname();
        $user->email = $request->getEmail();
        $user->password = $request->getHashedPassword();
        $user->admin = $request->isAdmin();
        $user->landlord = $request->isLandlord();

        $user->save();
        return response()->json($user, 200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json('', 204);
    }
}
