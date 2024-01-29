<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Department;
use App\Models\Paper;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function choose()
    {
        $department = Department::all();
        $subject = Subject::all();
        return view('Answer.ChoosePaper', compact('department', 'subject'));
    }

    public function answer()
    {
        $department = Department::all();
        $subject = Subject::all();
        $paper = Paper::all();
        $questions = Question::all(); // Assuming you have a relationship set up between Paper and Question models

        return view('Answer.answer', compact('department', 'subject', 'paper', 'questions'));
    }

    // Add the new method to handle form submission
    public function storeQuestion(Request $request)
    {
        $store = Answer::all();
        $store->answers =$request->answers;
        dd($store);

        return redirect()->back()->with('success', 'Answers submitted successfully');
    }

}


