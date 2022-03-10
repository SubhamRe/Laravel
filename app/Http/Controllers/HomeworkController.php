<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{

    public function home()
    {
        $user = Auth::user();
        $homeworks = Homework::all();
        return view('home', compact('user', 'homeworks'));
    }

    public function homework($id)
    {
        $homework = Homework::find($id);
        $current = strtotime(date('Y-m-d H:i:s'));
        $thetime = strtotime($homework->deadline);

        $passed = $thetime > $current;

        return view('homework', compact('homework',"passed"));
    }

    public function store_work($id, Request $request)
    {
        $file = $request->file('homework');
        $path = $file->store('public');
        $path = str_replace("public", "/storage", $path);
        $work = new Work();
        $work->user_id = Auth::id();
        $work->homework_id = $id;
        $work->file_path = $path;
        $work->save();
        return back();
    }
}
