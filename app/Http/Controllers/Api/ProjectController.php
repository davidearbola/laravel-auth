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

    public function show($slug)
    {
        $project = Project::with(['type', 'languages'])->where('slug', $slug)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'project' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'not-found'
            ]);
        }
    }

    public function latest()
    {
        return response()->json([
            'success' => true,
            'projects' =>  Project::with(['type', 'languages'])->orderByDesc('id')->take(3)->get()
        ]);
    }
}
