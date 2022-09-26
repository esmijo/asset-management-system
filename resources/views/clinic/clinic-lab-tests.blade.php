@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
<h1>Clinic Appointments</h1>

<table class="table">
  <thead>
    <tr>
      <th>Test Name</th>
      <th>Price</th>
      <th>Is Available</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($var as $key => $v)
      <tr>
        <td>{{ $v->testName }}</td>
        <td>{{ $v->price }}</td>
        <td>{{ $v->isAvailable }}</td>
        <td><button class="btn btn-warning">Update</button></td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection