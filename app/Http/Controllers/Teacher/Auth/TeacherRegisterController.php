<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Http\Request;

class TeacherRegisterController extends Controller
{
    public function register(){
        return view('Teacher.Auth.register');
    }

}
