@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-wrap py-3">
        @foreach ($types as $type)
            <div class="card w-25">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="{{ $type->icon }}"></i></h5>
                    <h5 class="card-title"><i class="{{ $type->name }}"></i></h5>
                    <p class="card-text">{{ $type->description }}</p>
                    <div class="mt-2 d-flex">
                        <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete"></input>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.types.show', $type->id) }}" class="card-text">Dettaglio</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
