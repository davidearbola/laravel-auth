@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-wrap py-3">
        @foreach ($projects as $project)
            <div class="card w-25">
                <div class="card-body">
                    <img src="{{ $project->thumb_path }}" class="card-img-top">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text">{{ $project->description }}</p>
                    <p class="card-text">Anno di realizzazione: {{ $project->release_year }}</p>
                    <a href="{{ $project->site_url }}">Vai al sito</a>
                    <div class="mt-2 d-flex">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete"></input>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.projects.show', $project->id) }}" class="card-text">Dettaglio</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
