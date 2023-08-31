<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Requests;
use App\Models\Project;
use App\Models\Technology;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

}


