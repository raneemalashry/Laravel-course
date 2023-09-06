<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $name="Raneem";
        $age=20;
        return view('dashboard.index', compact('name','age'));
    }
}
