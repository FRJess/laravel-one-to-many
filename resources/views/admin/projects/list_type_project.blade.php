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
          <th scope="col-1">Type</th>
          <th scope="col-1">Projects</th>
        </tr>
      </thead>

      <tbody>

        @forelse ($types as $type)
          <tr>
            <td>{{ $type->name }}</td>
            <td>
              <ul>
                @foreach ($type->projects as $project)
                  <li>
                    <a href="{{ route('admin.projects.show', $project) }}">{{ $project->name }}</a>
                  </li>
                @endforeach
              </ul>
            </td>
          </tr>

        @empty
          <h1>No project</h1>
        @endforelse

      </tbody>

    </table>

  </div>
@endsection
