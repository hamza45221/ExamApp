<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'paper_id',
        'question',
        'type',
        'mcqs_options1',
        'mcqs_options2',
        'mcqs_options3',
        'mcqs_options4',
    ];

    public function getMcqsOptionsAttribute()
    {
        return [
            'option1' => json_decode($this->mcqs_options1),
            'option2' => json_decode($this->mcqs_options2),
            'option3' => json_decode($this->mcqs_options3),
            'option4' => json_decode($this->mcqs_options4),
        ];
    }

    public function user(){
        return $this->belongsTo(Paper::class,Question::class,'paper_id','question_id');
    }
}
