<?php

namespace App\Http\Controllers;

use App\Modules\Students\Workflow\CreateStudentWorkflow;
use App\Modules\Students\Workflow\GetStudentWorkflow;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class StudenController extends Controller
{
    public function index(GetStudentWorkflow $getStudentWorkflow): InertiaResponse
    {
        $students = $getStudentWorkflow->get();
        return Inertia::render('Students/Index', compact('students'));
    }

    public function create(): InertiaResponse
    {
        return Inertia::render('Students/Create', []);
    }

    public function store(Request $request, CreateStudentWorkflow $createStudentWorkflow)
    {
        $request->validate(rules: [
            'name' => 'required|string|max:255'
        ]);
        $createStudentWorkflow->create(student: $request->all());
        return redirect()->route('students.index');
    }
}
