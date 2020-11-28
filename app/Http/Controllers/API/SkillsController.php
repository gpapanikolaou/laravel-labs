<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Skills\StoreRequest;
use App\Http\Requests\Skills\UpdateRequest;
use App\Models\Skill;

class SkillsController extends Controller
{
    //
    public function index(){
        $skills = Skill::all();
        return $skills;
    }

    public function store(StoreRequest $request){

        $skill = Skill::create($request->only('title'));

        return response()->json(compact('skill'), 201);
    }
    public function update(UpdateRequest $request, Skill $skill){
        $skill->update($request->only('title'));
        return response()->json(null, 204);
    }

    public function destroy(Skill $skill){
        $skill->delete();

        return response()->json(null, 204);
    }
}
