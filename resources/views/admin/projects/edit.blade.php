@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <h4>Modifica il progetto: {{ $project->name }}</h4>
        <form method="POST" action="{{ route('admin.projects.edit', $project->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4 row">
                <label for="name_project" class="col-md-2 col-form-label text-md-right">Nome Progetto</label>
                <div class="col-md-10">
                    <input id="name_project" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name', $project->name) }}" required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label for="desc_project" class="col-md-2 col-form-label text-md-right">Descrizione</label>
                <div class="col-md-10">
                    <input id="desc_project" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description', $project->description) }}" required autofocus>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label for="release_project" class="col-md-2 col-form-label text-md-right">Anno di realizzazione</label>
                <div class="col-md-10">
                    <input id="release_project" type="text"
                        class="form-control @error('release_year') is-invalid @enderror" name="release_year"
                        value="{{ old('release_year', $project->release_year) }}" required autofocus>
                    @error('release_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label for="url_project" class="col-md-2 col-form-label text-md-right">Url</label>
                <div class="col-md-10">
                    <input id="url_project" type="text" class="form-control @error('site_url') is-invalid @enderror"
                        name="site_url" value="{{ old('site_url', $project->site_url) }}" required autofocus>
                    @error('site_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label for="thumb_project" class="col-md-2 col-form-label text-md-right">Thumb</label>
                <div class="col-md-10">
                    <input id="thumb_project" type="text" class="form-control @error('thumb_path') is-invalid @enderror"
                        name="thumb_path" value="{{ old('thumb_path', $project->thumb_path) }}" required autofocus>
                    @error('thumb_path')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection
