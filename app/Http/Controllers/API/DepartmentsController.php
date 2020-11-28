<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Departments\StoreRequest;
use App\Http\Requests\Departments\UpdateRequest;
use App\Models\Department;
use App\Models\User;

class DepartmentsController extends Controller
{
    public function index(){
        $departments = Department::all();
        return $departments;
    }

    public function show(){

    }

    public function store(StoreRequest $request){
        $department = Department::create($request->only('title'));

        return response()->json(compact('department'), 201);
    }
    public function update(UpdateRequest $request, Department $department){
        $department->update($request->only('title'));
        return response()->json(null, 204);
    }
    public function destroy(Department $department){
        $department->delete();

        return response()->json(null, 204);
    }
    public function manager($id){
        $department=Department::find($id);
        $user=User::find($department->manager_id);
        return response()->json($user->fullName);
    }
}
