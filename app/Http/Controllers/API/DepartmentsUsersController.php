<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersDepartments\StoreRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

class DepartmentsUsersController extends Controller
{
    public function store(StoreRequest $request,$id){
        $user = User::find($id);
        $user->departments()->attach($request->only('dpt_id'));
    }

    public function destroy($id){
        dd('destroy');
    }
}
