<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $courses = [
        ['name' => 'Laravel', 'description' => 'Laravel Course'],
        ['name' => 'React', 'description' => 'Frontend Library'],
        ['name' => 'NodeJS', 'description' => 'Backend JS'],
    ];

    foreach ($courses as $course) {
        \App\Models\Course::create($course);
    }
    }
}
