<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;


class Type extends Model
{
    use HasFactory;

    //one to many relationship with questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    
}
