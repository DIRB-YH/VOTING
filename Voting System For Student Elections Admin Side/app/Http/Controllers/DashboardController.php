<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $nominees = Nominee::all();
        return view('dashboard', compact('nominees'));
    }
}
