<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersSkills\StoreRequest;
use App\Models\User;
use App\Models\Skill;

class UsersSkillsController extends Controller
{
    //
    public function index($id){
        $user = User::with('skills')->findOrFail($id);
        return response()->json([
            'skills' => $user->skills
        ]);
    }
    public function store(StoreRequest $request,$id){
        $user = User::find($id);
        $user->skills()->attach($request->only('skills'));

    }
}
