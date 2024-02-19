<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    // ============= Teacher register
    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $register = new Teacher();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = $request->password;
        $register->save();

        return redirect(route('teacher.dashboard'));
    }


    // ======== Teacher Login
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('teacher')->attempt($request->only('email', 'password'), $request->get('remember'))) {
            return redirect()->route('teacher.dashboard');
        } else {
            return redirect()->route('teacher.auth')->withErrors(['error' => 'Email/Password is incorrect'])->withInput($request->only('email'));
        }
    }

    // move forward after login

    public function dashboard()
    {
        return redirect(route('view.department'));
    }

    // Logout Teacher

    public function logout (){
        Auth::guard('teacher')->logout();
        return redirect(route('teacher.login'));
    }

    // Teacher Check Answers of students

    public function teacher_answer()
    {
        $papers = Answer::with(['user', 'question'])->get();
        return view('teacher.answers', compact('papers'));
    }
}
