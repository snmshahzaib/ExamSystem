<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrueFalseQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'question', 'paper_id', 'grade', 'type', 'correct_option'
    ];

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
