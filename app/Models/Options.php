<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Options extends Model
{
    use HasFactory;

    //many to one relationship with questions
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
