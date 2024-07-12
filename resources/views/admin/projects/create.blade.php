@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <h4>Aggiungi un progetto</h4>
        <form method="POST" action="{{ route('admin.projects.store') }}">
            @csrf

            <div class="mb-4 row">
                <label for="name_project" class="col-md-2 col-form-label text-md-right">Nome Progetto</label>
                <div class="col-md-10">
                    <input id="name_project" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autofocus>
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
                        name="description" value="{{ old('description') }}" required autofocus>
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
                        value="{{ old('release_year') }}" required autofocus>
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
                        name="site_url" value="{{ old('site_url') }}" required autofocus>
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
                        name="thumb_path" value="{{ old('thumb_path') }}" required autofocus>
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
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
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
