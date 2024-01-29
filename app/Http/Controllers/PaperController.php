<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function create(){
        $subject = Subject::all();
        $user = User::all();
        return view('Paper.create', compact('subject', 'user'));
    }

    public function store(Request $request){
        $paper = new Paper();
        $paper->name = $request->name;
        $paper->subject_id = $request->subject_id;
        $paper->save();
        $paper->users()->attach($request->user_id);
        return redirect(route('create.question'));
    }
}
