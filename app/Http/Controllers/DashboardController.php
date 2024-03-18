<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function general()
    {
        return view('dashboard.general');
    }
}
