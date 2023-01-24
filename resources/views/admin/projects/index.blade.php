@extends('layouts.admin')

@section('title')
  | Admin
@endsection

@section('content')
  <div class="container-fluid overflow-auto">
    <h1 class="my-5">Projects list</h1>

    @if (session('deleted'))
      <div class="alert alert-success" role="alert">
        {{ session('deleted') }}
      </div>
    @endif

    <table class="table w-90 m-auto">

      <thead>
        <tr>
          <th scope="col-1">
            <a class="text-dark" href="{{ route('admin.projects.orderby', ['id', $direction]) }}">ID</a>
          </th>
          <th scope="col-4">
            <a class="text-dark" href="{{ route('admin.projects.orderby', ['name', $direction]) }}">Project name</a>
          </th>
          <th scope="col-1">Technology</th>
          <th scope="col-3"><a class="text-dark"
              href="{{ route('admin.projects.orderby', ['client_name', $direction]) }}">Client name</a>
          </th>
          <th scope="col-3">Actions</th>
        </tr>
      </thead>

      <tbody>

        @forelse ($projects as $project)
          <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->name }} <span class="badge text-bg-info"> {{ $project->type->name }}</span></td>
            <td>
              @forelse ($project->technologies as $technology)
                <span class="badge badge-primary">{{ $technology->name }}</span>
              @empty
                no data
              @endforelse
            </td>
            <td>{{ $project->client_name }}</td>
            <td>
              <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">
                <i class="fa-regular fa-eye"></i>
              </a>
              <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
              @include('admin.partials.form-delete', [
                  'route' => 'projects',
                  'message' => "Do you want to delete project $project->name ?",
                  'entity' => $project,
              ])
            </td>
          </tr>

        @empty
          <h1>No project</h1>
        @endforelse

      </tbody>

    </table>

    <div class="paginator pt-3 d-flex justify-content-center">
      {{ $projects->links() }}

    </div>

  </div>
@endsection
