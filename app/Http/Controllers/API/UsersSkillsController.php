<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SkillResource;
use App\Http\Requests\UsersSkills\StoreRequest;
use App\Models\User;
use App\Models\Skill;

class UsersSkillsController extends Controller
{
    //
    public function index(User $user){
        $skills = SkillResource::collection($user->skills);

        return response()->json(compact('skills'));
    }
    
    public function store(StoreRequest $request, User $user) {
        $user->skills()->sync($request->input('skills'));

        $user->load('skills');

        $skills = SkillResource::collection($user->skills);

        return response()->json(compact('skills'), 201);
    }
}
