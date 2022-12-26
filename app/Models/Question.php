<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Options;

class Question extends Model
{
    use HasFactory;
    //many to one relationship with types
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    
    //one to many relationship with options
    public function options()
    {
        return $this->hasMany(Options::class);
    }

    //one to many relationship with truefalse
    public function truefalse()
    {
        return $this->hasMany(TrueFalse::class);
    }
   
    
}
