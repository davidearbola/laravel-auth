@extends('layouts.admin')

@section('content')
    <div class="row py-3">
        <div class="col-4">
            <h5><i class="{{ $language->icon }}"></i></h5>
        </div>
        <div class="col-8">
            <h5 class="card-title">{{ $language->name }}</h5>
        </div>
    </div>
    <div class="mt-2 d-flex">
        <a href="{{ route('admin.languages.edit', $language) }}" class="btn btn-warning me-2">Edit</a>
        <form action="{{ route('admin.languages.destroy', $language) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete"></input>
        </form>
    </div>
@endsection
