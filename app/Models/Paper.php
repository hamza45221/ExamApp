<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $fillable =['name'];
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
// Paper.php

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_paper', 'paper_id', 'user_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
