<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function papers()
    {
        return $this->hasMany(Paper::class);
    }

    public function questions()
    {
        return $this->hasManyThrough(Question::class, Paper::class);
    }
}
