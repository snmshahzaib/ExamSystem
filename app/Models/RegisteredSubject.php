<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredSubject extends Model
{
    use HasFactory;
    protected $fillabale = [
        'student_id', 'subject'
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
