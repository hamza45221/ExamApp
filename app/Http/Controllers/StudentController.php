<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function selectSubject()
    {
        $departments = Department::pluck('department_name', 'id');
        $subjects = Subject::pluck('name', 'id');

        return view('student.choose', compact('departments', 'subjects'));
    }

    public function question_view(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $subject = Subject::with('questions')->findOrFail($request->subject_id);
        $department = $subject->department;

        return view('student.view_question', compact('department', 'subject'));
    }

}
