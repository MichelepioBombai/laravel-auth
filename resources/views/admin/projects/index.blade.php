@extends('layouts.app')
@section('title', 'Projects')


@section('content')

<a class="btn btn-primary my-5" href="{{ route('admin.projects.create') }}">aggiungi post</a>

<section class="container">
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">titolo</th>
                <th scope="col">Abstract</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->title }}</td>
                <td>{{ $project->getAbstract() }}</td>
                <td>
                    <a href="{{ route('admin.projects.show', $project) }}">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>

    {{ $projects->links() }}
</section>

@endsection