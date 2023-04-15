@extends('layouts.app')
@section('title', 'Projects')

@section('actions')
<a class="btn btn-primary my-5" href="{{ route('admin.projects.create') }}">aggiungi post</a>
@endsection

@section('content')

<div class="card my-4">
    <div class="card-body">
        
        <table class="table table-striped">
        
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">titolo</th>
                    <th scope="col">slug</th>
                    <th scope="col">Abstract</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->getAbstract() }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project) }}">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('admin.projects.edit', $project) }}">
                            <i class="bi bi-pencil-fill ms-3"></i>
                        </a>
        
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>


    {{ $projects->links() }}


@endsection