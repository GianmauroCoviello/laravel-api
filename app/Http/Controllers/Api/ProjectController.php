<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // inseriamo il metodo index per la rotta
    public function index() {


        $projects= Project::all();
        $projects= Project::with('type', 'technologies')->get();

        return response()->json([
            // componiamo il file json con array associativo
            'status'  => true,
            'results' => $projects,
        ]);
        
    }
}
