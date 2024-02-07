<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Department;
use App\Models\Paper;
use App\Models\Question;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function answer_store(Request $request)
    {

        if (!auth()->check()) {
            return redirect()->back()->with('error', 'User not authenticated');
        }

        $user = Auth::user()->id;

        // Check if answers array exists and is not null
        if ($request->has('answers') && !is_null($request->answers)) {
            foreach ($request->answers as $questionId => $answer) {
                Answer::create([
                    'user_id' => $user, // Assign the authenticated user's ID
                    'department_id' => $request->input('department_id'),
                    'subject_id' => $request->input('subject_id'),
                    'question_id' => $questionId,
                    'answer' => is_array($answer) ? implode(', ', $answer) : $answer,
                ]);
            }
            return redirect()->back()->with('success', 'Answers submitted successfully');
        } else {
            return redirect()->back()->with('error', 'No answers provided');
        }
    }

}


