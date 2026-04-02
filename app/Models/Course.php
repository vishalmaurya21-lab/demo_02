<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'decription'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    // public function students1()
    // {
    //     return $this->belongsToOne(Student::class);
    // }
}
