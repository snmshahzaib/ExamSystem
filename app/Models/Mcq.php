<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
    use HasFactory;
    protected $fillable = [
        'question', 'paper_id', 'grade', 'type', 'correct_option'
    ];
    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
