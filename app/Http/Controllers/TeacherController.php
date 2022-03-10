<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(Homework::$rules);
        $data['user_id'] = $request->user()->id;
        Homework::create($data);
        return back()->with('message', 'Homework Created !');
    }
}
