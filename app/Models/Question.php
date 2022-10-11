<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question', 'type', 'subject_id', 'paper_id'
    ];
    // public function options()
    // {
    //     return $this->hasMany(Option::class);
    // }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
