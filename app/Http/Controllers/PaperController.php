<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaperController extends Controller
{
    public function create(){
        $subject = Subject::all();
        $user = User::all();
        return view('Paper.create', compact('subject', 'user'));
    }

    public function store(Request $request){
//        dd($request->all());
        $paper = new Paper();
        $paper->name = $request->name;
        $paper->subject_id = $request->subject_id;
        $paper->save();
        if (!$paper->users()->where('user_id', $request->User_id)->exists()) {
            $paper->users()->attach($request->User_id);
        }
//        $userPaper = DB::table('user_paper')->insert([
//            'user_id' => $request->User_id,
//            'paper_id'=>$paper->id
//        ]);
        return redirect(route('create.question'));
    }






}
