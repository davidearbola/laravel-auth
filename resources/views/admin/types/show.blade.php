@extends('layouts.admin')

@section('content')
    <div class="row py-3">
        <div class="col-4">
            <h5><i class="{{ $type->icon }}"></i></h5>
        </div>
        <div class="col-8">
            <h5 class="card-title">{{ $type->name }}</h5>
            <p class="card-text">{{ $type->description }}</p>
        </div>
    </div>
    <div class="mt-2 d-flex">
        <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning me-2">Edit</a>
        <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete"></input>
        </form>
    </div>
@endsection
