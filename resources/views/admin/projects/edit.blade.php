@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <h4>Modifica il progetto: {{ $project->name }}</h4>
        <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
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
            {{-- <div class="mb-4 row">
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
            </div> --}}
            <div class="mb-4 row">
                <label for="thumb_project" class="col-md-2 col-form-label text-md-right">Thumb</label>
                <div class="col-md-10">
                    <input id="thumb_project" type="file" class="form-control @error('thumb_path') is-invalid @enderror"
                        name="thumb_path">
                    @error('thumb_path')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label for="thumb_project" class="col-md-2 col-form-label text-md-right">Type</label>
                <div class="col-md-10">
                    <select name="type_id" class="form-select @error('type_id') is-invalid @enderror" required autofocus>
                        <option value="" selected>Scelta del type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected(old('type_id', $project->type_id) == $type->id)>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label for="languages" class="col-md-2 col-form-label text-md-right">Linguaggi</label>
                <div class="col-md-10">
                    @foreach ($languages as $language)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="languages[]" value="{{ $language->id }}"
                                id="language{{ $language->id }}" @checked(in_array($language->id, old('languages', $projectLanguages)))>
                            <label class="form-check-label" for="language{{ $language->id }}">
                                {{ $language->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('languages')
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
