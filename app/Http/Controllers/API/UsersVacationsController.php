<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VacationResource;
use Illuminate\Http\Request;
use App\Http\Requests\UsersVacations\StoreRequest;
use App\Http\Requests\UsersVacations\UpdateRequest;
use App\Models\User;
use App\Models\Vacation;

class UsersVacationsController extends Controller
{
    
    public function index(User $user){
        $vacations=$user->vacations;
     
        return response()->json(compact('vacations'), 201);
    }   

    public function show(User $user,Vacation $vacation){
        
        $vacations = Vacation::where('user_id', $user->id)->get();
        $vacation = new VacationResource($vacation);

        return response()->json(['vacation' => new VacationResource($vacation)], 200);
    }

    public function store(StoreRequest $request,User $user){
        
        $user->vacations()->create($request->only('from', 'to'));

        return response()->json(null, 201);
    }

    public function update(User $user, Vacation $vacation, UpdateRequest $request) {
        $vacation->update($request->only('from', 'to'));

        return response()->json(null, 204);
    }
    public function destroy(User $user, Vacation $vacation) {
        $vacation->delete();

        return response()->json(null, 204);
    }
}
