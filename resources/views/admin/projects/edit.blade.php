@extends('layouts.admin')

@section('content')
  <div class="container">
    <h1 class="my-4">Update project: {{ $project->name }}</h1>

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="name" class="form-label">Project name*</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
          value="{{ old('name', $project->name) }}" placeholder="Add project name">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="client_name" class="form-label">Client name*</label>
        <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name"
          id="client_name" value="{{ old('client_name', $project->client_name) }}" placeholder="Add client name">
        @error('client_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <p for="type" class="form-label">Technologies</p>
        @foreach ($technologies as $technology)
          <input type="checkbox" id="{{ $technology->slug }}" name="technologies[]" value="{{ $technology->id }}"
            @if (!$errors->all() && $project->technologies->contains($technology)) checked @elseif ($errors->all() && in_array($technology->id, old('technologies', []))) checked @endif>
          <label class="me-2" for="{{ $technology->slug }}">{{ $technology->name }}</label>
        @endforeach
      </div>

      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" name="type_id" id="type" aria-label="Default select">
          <option value="">Choose a type</option>
          @foreach ($types as $type)
            <option @if ($type->id == old('type_id', $project->type?->id)) selected @endif value="{{ $type->id }}">
              {{ $type->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Image*</label>
        <input onchange="showImage(event)" type="file" class="form-control @error('image') is-invalid @enderror"
          name="image" id="image" placeholder="Add image">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div>
        <img width="150" id="output-image" src="{{ asset('storage/' . $project['image']) }}" alt="">
      </div>


      <div class="mb-3">
        <label for="summary" class="form-label">Summary</label>
        <textarea class="form-control @error('summary') is-invalid @enderror" name="summary" id="summary"
          value="{{ old('summary') }}" rows="3">{{ old('summary', $project->summary) }}</textarea>
        @error('summary')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-1">Update</button>
    </form>

    @include('admin.partials.form-delete', [
        'route' => 'projects',
        'message' => "Do you want to delete project $project->name ?",
        'entity' => $project,
    ])
  </div>

  <script>
    function showImage(event) {
      const tagImage = document.getElementById('output-image');
      tagImage.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>
@endsection
