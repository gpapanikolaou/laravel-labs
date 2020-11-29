<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use Illuminate\Http\Request;
use App\Http\Requests\Skills\StoreRequest;
use App\Http\Requests\Skills\UpdateRequest;
use App\Models\Skill;

class SkillsController extends Controller
{
    //
    public function index(){
        $skills = SkillResource::collection(Skill::all());

        return compact('skills');
    }

  
    public function show(Skill $skill) {
            return response()->json(['skill' => new SkillResource($skill)], 200);
        }
        
    

    public function store(StoreRequest $request){

        $skill = Skill::create($request->only('title'));

        return response()->json(['skill' => new SkillResource($skill)], 201);
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
