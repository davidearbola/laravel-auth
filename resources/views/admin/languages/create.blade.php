@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <h4>Aggiungi un Linguaggio</h4>
        <form method="POST" action="{{ route('admin.languages.store') }}">
            @csrf

            <div class="mb-4 row">
                <label for="name_language" class="col-md-2 col-form-label text-md-right">Nome Linguaggio</label>
                <div class="col-md-10">
                    <input id="name_language" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label for="icon_language" class="col-md-2 col-form-label text-md-right">Classe icona</label>
                <div class="col-md-10">
                    <input id="icon_language" type="text" class="form-control @error('icon') is-invalid @enderror"
                        name="icon" value="{{ old('icon') }}" required autofocus>
                    @error('icon')
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
