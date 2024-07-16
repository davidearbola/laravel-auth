<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('languages')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeList = Type::all();
        $languagesList = Language::all();
        $data = [
            'types' => $typeList,
            'languages' => $languagesList
        ];
        return view('admin.projects.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'release_year' => 'required',
            'site_url' => 'required',
            'thumb_path' => 'required',
            'type_id' => 'required',
            'languages' => 'array',
            'languages.*' => 'exists:languages,id',
        ]);

        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        if (isset($data['languages'])) {
            $newProject->languages()->attach($data['languages']);
        }

        return redirect()->route('admin.projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data = [
            'project' => $project,
        ];
        return view('admin.projects.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $typeList = Type::all();
        $languagesList = Language::all();
        $data = [
            'project' => $project,
            'types' => $typeList,
            'languages' => $languagesList
        ];
        return view('admin.projects.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'release_year' => 'required',
            'site_url' => 'required',
            'thumb_path' => 'required',
            'type_id' => 'required',
            'languages' => 'array',
            'languages.*' => 'exists:languages,id',
        ]);

        $project->update($data);
        if (isset($data['languages'])) {
            $project->languages()->sync($data['languages']);
        }

        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
