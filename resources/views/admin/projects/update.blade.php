@extends('layouts.app')

<form action="{{ route('admin.projects.update') }}" method="POST">
    @method('PUT')
     @csrf

    <label for="title" class="form-label">title</label>
    <input
        type="text"
        class="form-control"
        id="title"
        name="title"
        value="{{ $project->title }}"
    />

    <label for="slug" class="form-label">slug</label>
    <input
        type="text"
        class="form-control"
        id="slug"
        name="slug"
        value="{{ $project->slug }}"
    />

    <label for="tetx" class="form-label">tetx</label>
    <input
    type="text"
    class="form-control"
    id="tetx"
    name="tetx"
    value="{{ $project->tetx }}"
/>
    <button type="submit" class="btn btn-primary">Salva</button>
</form>