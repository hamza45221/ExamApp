<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Paper;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        $subjects = Subject::pluck('name', 'id');
        $papers = Paper::pluck('name','id');
        return view('Question.create', compact('subjects', 'papers'));
    }

    public function storeQuestion(Request $request)
    {

        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'paper_id' => 'required|exists:papers,id',
            'questions' => 'required|array',
            'questions.*.content' => 'required|string',
            'questions.*.type' => 'required|in:short,long,mcq',
            'questions.*.options' => 'array|required_if:questions.*.type,mcq',
        ]);
        $paper = Paper::find($request->input('paper_id'));

        foreach ($request->input('questions') as $questionData) {
            $question = new Question([
                'question' => $questionData['content'], // change to 'questions'
                'type' => $questionData['type'],
            ]);

            if ($questionData['type'] === 'mcq' && isset($questionData['options'])) {
                $question->mcqs_options = json_encode($questionData['options']);
            }

            $question->paper_id = $paper->id;
//            dd($request->all());
            $question->save();
        }

        return redirect()->back()->with('success', 'Questions added successfully');
    }


}
