<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory; 
    protected $fillable = [
        'question_text',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'correct_answer',
        'question_level',
        'user_id',
    ];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];  

    public function user ()
    {
        return $this->belongsTo('App\Models\User');
    }
}
