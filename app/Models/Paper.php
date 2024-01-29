<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
// Paper.php

    public function users()
    {
        return $this->belongsToMany(User::class, 'paper_student', 'paper_id', 'student_id');
    }

    public function question(){
        return $this->hasMany(Question::class,'question_id');
    }
}
