<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(){
        $paper = Paper::all();
        return view('Question.create',compact('paper'));
    }

    public function store(Request $request)
    {
        $paper_id = $request->paper_id;

        foreach ($request->input('questions') as $questionData) {
            $question = new Question();
            $question->paper_id = $paper_id;
            $question->question = $questionData['question'] ?? null;
            $question->type = $questionData['type'];

            if ($questionData['type'] === 'MCQs') {
                $mcqOptions = [
                    'mcqs_options1' => $questionData['mcqs_options1'] ?? [],
                    'mcqs_options2' => $questionData['mcqs_options2'] ?? [],
                    'mcqs_options3' => $questionData['mcqs_options3'] ?? [],
                    'mcqs_options4' => $questionData['mcqs_options4'] ?? [],
                ];

                // Convert MCQ options to JSON
                $question->mcqs_options = json_encode($mcqOptions);
            }

            $question->save();
        }

        return redirect()->back();
    }
}
