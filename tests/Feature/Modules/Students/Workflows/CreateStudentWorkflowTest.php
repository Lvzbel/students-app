<?php

namespace Tests\Feature\Modules\Students\Workflows;

use App\Models\Student;
use App\Modules\Students\Workflow\CreateStudentWorkflow;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('creates a new single student', function (): void {
    $workflow = new CreateStudentWorkflow;
    $studentName = 'Steve';
    $studentGrade = 90;

    $student = $workflow->create([
        'name' => $studentName,
        'grade' => $studentGrade
    ]);

    $this->assertInstanceOf(Student::class, $student);
    $this->assertDatabaseHas('students', [
        'name' => $studentName,
        'grade' => $studentGrade
    ]);
});