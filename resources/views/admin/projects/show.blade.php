@extends('layouts.admin')

@section('title')
  | Project details
@endsection

@section('content')
  <div class="container mt-4">
    @if (session('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
    @endif


    <h1 class="my-4">{{ $project->name }}</h1>
    <div>Client: <strong>{{ $project->client_name }}</strong></div>

    @if ($project->type)
      <div>Type: <strong>{{ $project->type->name }}</strong></div>
    @endif

    @if ($project->$technologies)
      <div>
        @foreach ($project->technologies as $technology)
          <span class="badge badge-primary">{{ $technology->name }}</span>
        @endforeach
      </div>
    @endif

    <div class="text-center my-4">
      <img class="" width="300" src="{{ asset('storage/' . $project['image']) }}"
        alt="{{ $project['image_original_name'] }}">
    </div>
    <p>{!! $project->summary !!}</p>
    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
      <i class="fa-solid fa-pen-to-square"></i>
    </a>
    @include('admin.partials.form-delete', [
        'route' => 'projects',
        'message' => "Do you want to delete project $project->name ?",
        'entity' => $project,
    ])
  </div>
@endsection
