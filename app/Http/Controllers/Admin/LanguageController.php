<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languagesList = Language::all();
        $data = [
            'languages' => $languagesList
        ];
        return view('admin.languages.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $newLanguage = new Language();
        $newLanguage->fill($data);
        $newLanguage->save();

        return redirect()->route('admin.languages.show', $newLanguage);
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        $data = [
            'language' => $language
        ];
        return view('admin.languages.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        $data = [
            'language' => $language
        ];

        return view('admin.languages.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $data = $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);
        $language->update($data);
        return redirect()->route('admin.languages.show', $language);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('admin.languages.index');
    }
}
