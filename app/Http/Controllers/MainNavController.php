<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\MainnavModule;
use App\Models\Project;
use Illuminate\Http\Request;

class MainNavController extends Controller
{
    // public function show($mainnavId)
    // {
    //     $mainnav = MainnavModule::with('submainnavModule')->find($mainnavId);

    //     return response()->json($mainnav);
    // }


    public function getData()
    {
        // Get the employee's department
        $employeeId = Employee::all('id'); // Replace with the desired employee_id
        $department = Department::where('employee_id', $employeeId)->first();

        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        // Get the projects for the department
        $projects = Project::where('department_id', $department->id)
            ->where('employee_id', $employeeId)
            ->get();

        return response()->json(['department' => $department, 'projects' => $projects]);
    }
}
