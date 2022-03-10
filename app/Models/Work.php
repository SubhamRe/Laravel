<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'homework_id',
        'file_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function homework()
    {
        return $this->belongsTo(Homework::class, 'homework_id');
    }
}
