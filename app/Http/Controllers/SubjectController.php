<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function create(){
        $department = Department::all();
        return view('Subject.create',compact('department'));
    }
    public function store(Request $request){

        $request->validate([
            'name'=>'required|string',
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->department_id = $request->department_id;
        $subject->save();
        return redirect(route('create.paper'));
    }
}

