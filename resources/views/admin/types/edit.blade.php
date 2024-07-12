@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <h4>Modifica il type: {{ $type->name }}</h4>
        <form method="POST" action="{{ route('admin.types.update', $type->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4 row">
                <label for="name_type" class="col-md-2 col-form-label text-md-right">Nome Type</label>
                <div class="col-md-10">
                    <input id="name_type" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name', $type->name) }}" required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label for="desc_type" class="col-md-2 col-form-label text-md-right">Descrizione</label>
                <div class="col-md-10">
                    <input id="desc_type" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description', $type->description) }}" required autofocus>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row">
                <label for="icon_type" class="col-md-2 col-form-label text-md-right">Classe icona</label>
                <div class="col-md-10">
                    <input id="icon_type" type="text" class="form-control @error('icon') is-invalid @enderror"
                        name="icon" value="{{ old('icon', $type->icon) }}" required autofocus>
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
