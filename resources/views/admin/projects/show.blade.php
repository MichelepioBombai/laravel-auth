@extends('layouts.app')

@section('title', $project->title)
@section('actions')
<a href="{{ route('admin.projects.index') }}" class=" btn btn-primary float-end my-5">Torna alla lista</a>
@endsection

@section('content')
<section class="clearfix">
    <h2 class="text-muted text-secondary my-5">{{ $project->slug }}</h2>
    <img src="{{ asset('storage/' . $project->image) }}" alt="" width="300" class="float-start me-3 mb-1">
    <p>{{ $project->text }}</p>
</section>

@endsection