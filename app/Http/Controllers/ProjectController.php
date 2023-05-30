<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show($departmentId)
    {
        $project = Project::with('department', 'employee')
            ->where('department_id', $departmentId)
            ->first();

        return response()->json($project);
    }
}
