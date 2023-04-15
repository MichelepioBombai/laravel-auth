@extends('layouts.app')

@section('content')

<form action="{{ route('admin.projects.store') }}" method="POST" class="row g-4">
    @csrf
    @method('PUT')
    

    <div class="col-4"> 
      <label for="brand" class="form-label">title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $project->title}}" />
    </div>

    <div class="col-4">
      <label for="model" class="form-label">slug</label>
      <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') ?? $project->slug}}"/>
    </div>

    <div class="col-4">
      <label for="size" class="form-label">text</label>
      <input type="text" class="form-control" id="text" name="text" value="{{ old('text') ?? $project->text}}"/>
    </div>

    <div class="col-4">
      <button type="submit" class="btn btn-primary my-3">Salva</button>
    </div>

  </form>
</div>

@endsection