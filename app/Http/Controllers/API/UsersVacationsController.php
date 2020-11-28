<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UsersVacations\StoreRequest;
use App\Models\User;
use App\Models\Vacation;

class UsersVacationsController extends Controller
{
    
    public function index(){
        $skills = Vacation::all();
        return $skills;
    }

    public function show(Request $request){
       
    }

    public function store(StoreRequest $request,$id){
        
        $vacation = Vacation::create(['from' => $request->from,'to'=>$request->to,'user_id'=>$id]);
        return response()->json(compact('vacation'), 201); 
    }

    public function update(Request $request){
        dd('update');
    }
    public function destroy(Request $request){
        dd('destroy');
    }
}
