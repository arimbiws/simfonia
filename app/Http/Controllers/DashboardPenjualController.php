<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPenjualController extends Controller
{
    function index()
    {
        return view('penjual.dashboard');
    }
}
