<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function login(){
        if (session()->has('admin')){
            return redirect('/admin');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request){

        if ($request->username == "subham" && $request->password == "subham")
        {
            session()->put('admin', true);
            return redirect('/admin');
        }

        return back()->with('message', 'Incorrect Data');
    }

    public function admin()
    {
        if (!session()->has('admin')){
            return redirect('/admin/login');
        }
        $users = User::all();
        return view('admin.create', compact('users'));
    }

    public function changeTeacher(Request $request)
    {
        $isTeacher = $request->teacher == 1;
        $user = User::find( (int) $request->user);
        $user->is_teacher = $isTeacher;
        $user->save();
        return back()->with('message', "Changed Sucessfully !");
    }
}
