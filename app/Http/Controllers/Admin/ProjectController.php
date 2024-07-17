<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('languages')->get();
        $typesList = Type::all();
        $languagesList = Language::all();
        $data = [
            'projects' => $projects,
            'types' => $typesList,
            'languages' => $languagesList
        ];
        return view('admin.projects.index', $data);
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
            'thumb_path' => 'image',
            'type_id' => 'required',
            'languages' => 'array',
            'languages.*' => 'exists:languages,id',
        ]);

        if ($request->has('thumb_path')) {
            // save the image

            $thumb_path = Storage::put('uploads', $request->thumb_path);
            $data['thumb_path'] = $thumb_path;
        }

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
            'thumb_path' => 'image',
            'type_id' => 'required',
            'languages' => 'array',
            'languages.*' => 'exists:languages,id',
        ]);

        if ($request->has('thumb_path')) {
            // save the image

            $thumb_path = Storage::put('uploads', $request->thumb_path);
            $data['thumb_path'] = $thumb_path;

            if ($project->thumb_path && !Str::start($project->thumb_path, 'http')) {
                // not null and not startingn with http
                Storage::delete($project->thumb_path);
            }
        }

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
        if ($project->thumb_path && !Str::start($project->thumb_path, 'http')) {
            // not null and not startingn with http
            Storage::delete($project->thumb_path);
        }
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
