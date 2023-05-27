<?php

namespace App\Http\Controllers;

use App\Models\Asidebar;
use App\Models\MainnavModule;
use App\Models\SubmainnavModule;
use Illuminate\Http\Request;

class AsidebarController extends Controller
{
    public function index()
    {
        $mainNavModules = MainnavModule::all();
        $subMainNavModules = SubmainnavModule::all();
        $asidebarData = Asidebar::all();

        $responseData = [
            'mainNavModules' => $mainNavModules,
            'subMainNavModules' => $subMainNavModules,
            'asidebarData' => $asidebarData
        ];

        return $responseData;
    }

}