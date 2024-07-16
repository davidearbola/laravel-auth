@extends('layouts.admin')

@section('content')
    <div class="d-flex flex-wrap py-3">
        @foreach ($languages as $language)
            <div class="card w-25">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="{{ $language->icon }}"></i></h5>
                    <h5 class="card-title">{{ $language->name }}</h5>
                    <div class="mt-2 d-flex">
                        <a href="{{ route('admin.languages.edit', $language) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{ route('admin.languages.destroy', $language) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete"></input>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.languages.show', $language->id) }}" class="card-text">Dettaglio</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
