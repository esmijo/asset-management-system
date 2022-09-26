@extends('layouts.main-layout')

@section('title')
View Clinics
@endsection

@section('content')
<table class="table table-bordered list-table">
  <thead class="thead-dark">
    <tr>
      <th>ID</th>
      <th>Client Name</th>
      <th>Sex</th>
      <th>Birthday</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($clinics as $key => $clinic)
      <tr>
        <td>{{ $clinic->id }}</td>
        <td>{{ $clinic->clinicName }}</td>
        <td>{{ $clinic->completeAddress }}</td>
        <td>{{ $clinic->emailAddress }}</td>
        <td><a href="/update-clinic/{{ $clinic->id }}">Update Info</a></td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection