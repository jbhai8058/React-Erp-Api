<?php

namespace App\Http\Controllers;

use App\Models\MainnavModule;
use Illuminate\Http\Request;

class MainNavController extends Controller
{
    public function show($mainnavId)
    {
        $mainnav = MainnavModule::with('submainnavModule')->find($mainnavId);

        return response()->json($mainnav);
    }
}
