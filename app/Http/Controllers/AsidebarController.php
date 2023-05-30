<?php

namespace App\Http\Controllers;

use App\Models\Asidebar;
use App\Models\MainnavModule;
use App\Models\SubmainnavModule;
use Illuminate\Http\Request;

class AsidebarController extends Controller
{
    public function show($mainnavId)
    {
        $asidebar = Asidebar::with('mainnavModule', 'submainnavModule')
            ->where('mainnav_module_id', $mainnavId)
            ->first();

        return response()->json($asidebar);
    }

}