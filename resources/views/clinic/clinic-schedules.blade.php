@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
<h1>Clinic Schedules</h1>

<table class="table">
  <thead>
    <tr>
      <th>Time Slot</th>
      <th>Real Time</th>
      <th>Is Available</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($var as $key => $v)
      <tr>
        <td>{{ $v->timeSlotName }}</td>
        <td>{{ $v->realTime }}</td>
        <td>{{ $v->isAvailable }}</td>
        <td><button class="btn btn-warning">Update</button></td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection