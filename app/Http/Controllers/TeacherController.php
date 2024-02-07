<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacher_answer()
    {
        $papers = Answer::with(['user', 'question'])->get();

        return view('teacher.answers', compact('papers'));
    }
}
