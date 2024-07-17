@extends('layouts.admin')

@section('content')
    <div class="row py-3">
        <div class="col-4">
            @if (Str::startsWith($project->thumb_path, 'http'))
                <img class="w-100" src="{{ $project->thumb_path }}">
            @else
                <img class="w-100" src="{{ asset('storage/' . $project->thumb_path) }}">
            @endif
        </div>
        <div class="col-8">
            <h5 class="card-title">{{ $project->name }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <p class="card-text">Anno di realizzazione: {{ $project->release_year }}</p>
            <p class="card-text">Tipo di progetto: {{ $project->type->name }} <i class="{{ $project->type->icon }}"></i></p>
            <p class="card-text">Linguaggi utilizzati:</p>
            @foreach ($project->languages as $language)
                <i class="{{ $language->icon }}"></i>
            @endforeach
            <p><a href="{{ $project->site_url }}">Vai al sito</a></p>
        </div>
    </div>
    <div class="mt-2 d-flex">
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning me-2">Edit</a>
        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete"></input>
        </form>
    </div>
@endsection
