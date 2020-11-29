<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DepartmentResource;
use App\Http\Requests\Departments\StoreRequest;
use App\Http\Requests\Departments\UpdateRequest;
use App\Models\Department;
use App\Models\User;

class DepartmentsController extends Controller
{
    public function index(){
        $departments = DepartmentResource::collection(Department::all());
        return response()->json(compact('departments'));
    }

    public function show(Department $department) {
        $department = new DepartmentResource($department);

        return response()->json(compact('department'));
    }

    public function store(StoreRequest $request) {
        $department = Department::create($request->only('title', 'manager_id'));

        return response()->json(['department' => new DepartmentResource($department)], 201);
    }
    public function update(Department $department, UpdateRequest $request) {
        $department->update($request->only('title', 'manager_id'));

        return response()->json(null, 204);
    }

    public function destroy(Department $department) {
        $department->delete();

        return response()->json(null, 204);
    }
}
