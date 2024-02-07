<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function create(){

        return view('Department.create');
    }
    public function store(Request $request){

        $request->validate([
            'department_name'=>'required|string|max:255',
        ]);

        $department = new Department();
        $department->department_name = $request->department_name;
        $department->save();
        return redirect(route('create.subject'));
    }
}
