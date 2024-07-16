@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Type</th>
                    <th scope="col">Language</th>
                    <th scope="col">Link</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($projects as $project)
                    <tr>
                        <td><img style="width: 2rem" src="{{ $project->thumb_path }}"></td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->type->name }} <i class="{{ $project->type->icon }}"></i></td>
                        <td>
                            @foreach ($project->languages as $language)
                                <i class="{{ $language->icon }}"></i>
                            @endforeach
                        </td>
                        <td><a href="{{ $project->site_url }}">Vai al sito</a></td>
                        <td>
                            <a class="text-decoration-none text-dark btn p-0"
                                href="{{ route('admin.projects.show', $project) }}">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <a class="text-decoration-none text-warning btn px-2 py-0"
                                href="{{ route('admin.projects.edit', $project) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form class="d-inline" action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0 text-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
