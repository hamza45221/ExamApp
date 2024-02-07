<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $casts = [
        'type' => 'string',
    ];

    // Question.php

//    protected $fillable = ['question', 'type', 'answer', 'correct_answer', 'paper_id'];


    public function getMcqsOptionsAttribute()
    {
        return [
            'option1' => json_decode($this->mcqs_options1),
            'option2' => json_decode($this->mcqs_options2),
            'option3' => json_decode($this->mcqs_options3),
            'option4' => json_decode($this->mcqs_options4),
        ];
    }

    // In the Question model
    protected $fillable = ['question', 'type', 'mcqs_options', 'paper_id'];

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }


}
