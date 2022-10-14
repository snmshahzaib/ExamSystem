<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'paper_id', 'student_id', 'question_id', 'type', 'answer'
    ];

    public function paper(){
        return $this->belongsTo(Paper::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'student_id');
    }
}
