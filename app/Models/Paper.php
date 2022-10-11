<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'type','date', 'subject_id', 'teacher_id'
    ];

    public function subjectives()
    {
        return $this->hasMany(Subjective::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
