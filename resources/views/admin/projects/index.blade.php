@extends('layouts.admin')

@section('content')
    <div class="py-3 row">
        <div class="col-auto">
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
                            <td>
                                @if (Str::startsWith($project->thumb_path, 'http'))
                                    <img style="width: 2rem" src="{{ $project->thumb_path }}">
                                @else
                                    <img style="width: 2rem" src="{{ asset('storage/' . $project->thumb_path) }}">
                                @endif
                            </td>
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
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-link p-0 text-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $project->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $project->id }}">
                                                    Delete current project
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Deleting project name: {{ $project->name }}
                                                ⚡Danger, you cannot undo this operation
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-auto">
            <div class="flex-column">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Nome</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($types as $type)
                            <tr>
                                <td><i class="{{ $type->icon }}"></i></td>
                                <td>{{ $type->name }}</td>
                                <td>
                                    <a class="text-decoration-none text-dark btn p-0"
                                        href="{{ route('admin.types.show', $type) }}">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                    <a class="text-decoration-none text-warning btn px-2 py-0"
                                        href="{{ route('admin.types.edit', $type) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form class="d-inline" action="{{ route('admin.types.destroy', $type) }}"
                                        method="POST">
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
            <div class="col-auto">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Nome</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($languages as $language)
                            <tr>
                                <td><i class="{{ $language->icon }}"></i></td>
                                <td>{{ $language->name }}</td>
                                <td>
                                    <a class="text-decoration-none text-dark btn p-0"
                                        href="{{ route('admin.languages.show', $language) }}">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                    <a class="text-decoration-none text-warning btn px-2 py-0"
                                        href="{{ route('admin.languages.edit', $language) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form class="d-inline" action="{{ route('admin.languages.destroy', $language) }}"
                                        method="POST">
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
        </div>
    </div>
@endsection
