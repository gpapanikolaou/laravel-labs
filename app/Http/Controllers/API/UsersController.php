<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(){
        
        $users = UserResource::collection(User::all());
        $count = count($users);
        return response()->json(compact('users', 'count'));
    }

    public function show(User $user){
        $user = new UserResource($user);
        return response()->json(compact('user'));
        
    }
    public function store(StoreRequest $request){
        $user = User::create($request->only('firstName', 'lastName', 'email', 'password'));

        return response()->json(compact('user'), 201);

   
    }

    public function update(UpdateRequest $request, User $user){
        
        $user->update($request->only('firstName', 'lastName', 'email'));
        return response()->json(null, 204);
    }

    public function destroy($id){
        User::find($id)->delete();
        return response()->json(null, 204);
    }


}
