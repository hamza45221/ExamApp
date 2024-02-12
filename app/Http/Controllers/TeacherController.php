<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            // Assuming you have a route named 'teacher.dashboard'
            return redirect()->route('teacher.dashboard');
        } else {
            return redirect()->route('teacher.auth')->withErrors(['error' => 'Email/Password is Incorrect'])->withInput($request->only('email'));
        }
    }

    public function teacher_answer()
    {
        $papers = Answer::with(['user', 'question'])->get();
        return view('teacher.answers', compact('papers'));
    }

    public function dashboard()
    {
        return redirect(route('create.department'));
    }
    public function logout (){
        Auth::guard('teacher')->logout();
        return redirect(route('teacher.login'));
    }
}
