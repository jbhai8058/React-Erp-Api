<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function storedepartment(Request $request)
    {
        $contactArray = json_decode($request->getContent(), true);

        // $dept_id      = $contactArray['dept_id'];
        $dept_name    = $contactArray['dept_name'];
        $dept_address = $contactArray['dept_address'];
        
        // $existingItem = Departments::where('dept_id', $dept_id)->first();

        // if ($existingItem) {
        //     // Update the existing department
        //     $result = $existingItem->update([
        //         'dept_name' => $dept_name,
        //         'dept_address' => $dept_address,
        //     ]);
        // } else {
            // Insert a new department
            $result = Departments::insert([
                'dept_name' => $dept_name,
                'dept_address' => $dept_address,
            ]);
        // }

        if ($result) {
            return 'Department saved successfully.';
        } else {
            return 'An error occurred while saving the department.';
        }
    }
}
