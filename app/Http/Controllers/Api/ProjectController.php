<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'projects' => Project::with(['type', 'languages'])->orderByDesc('id')->paginate(3)
        ]);
    }

    public function show($id)
    {
        $project = Project::with(['type', 'languages'])->findOrFail($id);
        return response()->json([
            'success' => true,
            'project' => $project
        ]);
    }
}
