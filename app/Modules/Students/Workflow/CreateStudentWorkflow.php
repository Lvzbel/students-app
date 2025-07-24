<?php

namespace App\Modules\Students\Workflow;

use App\Models\Student;

class CreateStudentWorkflow
{
    public function create(array $student): Student
    {
        return Student::create(attributes: $student);
    }
}
