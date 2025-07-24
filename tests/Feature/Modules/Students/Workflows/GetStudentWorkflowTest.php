<?php

namespace Tests\Feature\Modules\Students\Workflows;

use App\Models\Student;
use App\Modules\Students\Workflow\GetStudentWorkflow;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('gets zero students', function (): void {
    $workflow = new GetStudentWorkflow;

    $students = $workflow->get();

    $this->assertCount(0, $students);
});

test('gets two students', function (): void {

    Student::create(['name' => 'Alice', 'grade' => 10]);
    Student::create(['name' => 'Bob', 'grade' => 11]);

    $workflow = new GetStudentWorkflow;

    $students = $workflow->get();

    $this->assertCount(2, $students);

    $this->assertDatabaseHas('students', ['name' => 'Alice', 'grade' => 10]);
    $this->assertDatabaseHas('students', ['name' => 'Bob', 'grade' => 11]);
});