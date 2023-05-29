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
        $result = Asidebar::all();
        return $result;
    }


    public function mainnav()
    {
        
        $result = MainnavModule::all();
        $result->submainnavModule;
        return $result;
    }


    public function submainnav()
    {
        $result = SubmainnavModule::all();
        return $result;
    }

}