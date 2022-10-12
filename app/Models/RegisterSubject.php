<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'subject'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
