<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'desc',
        'deadline'
    ];

    public static $rules = [
        'title' => 'required|min:3|unique:homework',
        'desc' => 'required|min:16',
        'deadline' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function works()
    {
        return $this->hasMany(Work::class, 'homework_id');
    }
}
