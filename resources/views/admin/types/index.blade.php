@extends('layouts.admin')

@section('title')
  | Admin
@endsection

@section('content')
  <div class="container-fluid overflow-auto">
    <h1 class="my-5">Manage types</h1>

    @if (session('message'))
      <div class="alert alert-success" role="alert">
        {{ session('message') }}
      </div>
    @endif

    <div class="w-50">
      <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="New type">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
            <i class="fa-solid fa-circle-plus"></i>Add
          </button>
        </div>
      </form>
    </div>

    <table class="table">
      <tr>
        <th scope="col">Type</th>
        <th scope="col">Project count</th>
      </tr>

      <tbody>
        @foreach ($types as $type)
          <tr>
            <td class="d-flex">
              <form action="{{ route('admin.types.update', $type) }}" method="POST">
                @csrf
                @method('PATCH')
                <input class="border-0" type="text" name="" value="{{ $type->name }}">
                <button type="submit" class="btn btn-warning me-3"><i class="fa-solid fa-pen-to-square"></i></button>
              </form>

              @include('admin.partials.form-delete', [
                  'route' => 'types',
                  'message' => "Do you want to delete type $type->name ?",
                  'entity' => $type,
              ])
            </td>
            <td>{{ count($type->projects) }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>

  </div>
@endsection
