<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjective extends Model
{
    use HasFactory;
    protected $fillable = [
        'question', 'paper_id', 'grade', 'type'
    ];
    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
