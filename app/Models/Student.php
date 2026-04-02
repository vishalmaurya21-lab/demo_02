<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'course'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    // public function courses1()
    // {
    //     return $this->belongsToOne(Course::class);
    // }
}
