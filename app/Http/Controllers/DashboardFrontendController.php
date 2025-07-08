<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardFrontendController extends Controller
{
    function dashboard()
    {
        return view('frontend.dashboard', []);
    }

    function katalog()
    {
        return view('frontend.unit_bisnis.katalog', []);
    }

    function all_katalog()
    {
        return view('frontend.unit_bisnis.all-katalog', []);
    }
}
