@extends('layouts.app')

@section('title', $project->title)


@section('content')
<section class="clearfix">
    <a href="{{ route('admin.projects.index') }}" class=" btn btn-primary float-end">Torna alla lista</a>
    <h2 class="text-muted text-secondary my-5">{{ $project->slug }}</h2>
    <img src="{{ $project->image }}" alt="" width="300" class="float-start me-3 mb-1">
    <p>{{ $project->text }}</p>
</section>

@endsection