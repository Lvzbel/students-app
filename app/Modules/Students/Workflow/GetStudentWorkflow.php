<?php

namespace App\Modules\Students\Workflow;

use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class GetStudentWorkflow
{
    public function get(): Collection
    {
        return Student::all();
    }
}
