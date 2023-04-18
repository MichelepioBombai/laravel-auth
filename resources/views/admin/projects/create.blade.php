@extends('layouts.app')
@section('title', 'aggiungi un progetto')

@section('actions')
<a href="{{ route('admin.projects.index')}}" class="btn btn-primary my-5">Torna alla lista</a>
@endsection

@section('content')

@if($errors->any())
  
  @dump($e)

@endif

<div class="card">
  <div class="card-body">
    
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="row g-4">
      @csrf
      
      <div class="col-4">
        <div class="row">
          <div class="col-12"> 
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
          </div>
          
          <div class="col-12">
            <label for="image" class="form-label">image</label>
            <input class="form-control" type="url" id="image" name="image" >
          </div>
        </div>
      </div>
      
      <div class="col-8 mb-3">
        <label for="text" class="form-label">text</label>
        <textarea  class="form-control" id="text" name="text" value="{{ old('text') }}"  rows="5"></textarea>
      </div>
      
      
      <div class="col-12">
          <button type="submit" class="btn btn-primary my-1">Salva</button>
        </div>
    
    
      </form>
    </div>
  </div>
</div>
@endsection