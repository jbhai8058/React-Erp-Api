<?php

namespace App\Http\Controllers;

use App\Models\Asidebar;
use App\Models\Department;
use App\Models\Employee;
use App\Models\MainnavModule;
use App\Models\Project;
use App\Models\SubmainnavModule;
use Illuminate\Http\Request;

class MainNavController extends Controller
{
    public function getData(){
        // Get all MainnavModules
        $MainnavModules = MainnavModule::all();

        // Initialize an empty array to store the results
        $data = [];

        foreach ($MainnavModules as $MainnavModule) {
            // Get the departments for the employee
            $SubmainnavModules = SubmainnavModule::where('mainnav_module_id', $MainnavModule->id)->get();

            if ($SubmainnavModules->isEmpty()) {
                // Skip if no departments found for the employee
                continue;
            }

            $MainnavModuleData = [
                'mainnav_module_id' => $MainnavModule->id,
                'module_name' => $MainnavModule->module_name,
                'module_icon' => $MainnavModule->module_icon,
                'is_visible' => $MainnavModule->is_visible,
                'sort_order' => $MainnavModule->sort_order,
                'SubmainnavModules' => []
            ];

            foreach ($SubmainnavModules as $SubmainnavModule) {
                // Get the projects for the department and employee
                $Asidebars = Asidebar::where('sub_module_id', $SubmainnavModule->id)
                    ->where('mainnav_module_id', $MainnavModule->id)
                    ->get();

                $SubmainnavModuleData = [
                    'sub_module_id' => $SubmainnavModule->id,
                    'sub_module_name' => $SubmainnavModule->sub_module_name,
                    'sub_module_icon' => $SubmainnavModule->sub_module_icon,
                    'is_visible' => $SubmainnavModule->is_visible,
                    'sort_order' => $SubmainnavModule->sort_order,
                    'Asidebars' => $Asidebars,
                ];

                $MainnavModuleData['SubmainnavModules'][] = $SubmainnavModuleData;
            }

            $data[] = $MainnavModuleData;
        }

        return $data;
    }

}