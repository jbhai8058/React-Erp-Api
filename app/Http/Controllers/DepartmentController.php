<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function show($departmentId)
    {
        $department = Department::with('employees')->find($departmentId);

        return response()->json($department);
    }
}
