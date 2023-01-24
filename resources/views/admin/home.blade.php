@extends('layouts.admin')

@section('title')
  | Admin
@endsection

@section('content')
  <div class="container">
    <h1 class="my-5">Home della Dashboard</h1>
    <h4>I have {{ $count_projects }} projects</h4>
    <a class="btn btn-success mt-2" href="{{ route('admin.projects.create') }}">New project</a>
  </div>
@endsection
