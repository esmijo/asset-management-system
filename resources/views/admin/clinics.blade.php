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
      <th>Email</th>
      <th>Clinic Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($clinics as $key => $clinic)
      <tr>
        <td>{{ $clinic->id }}</td>
        <td><a href="/update-clinic/{{ $clinic->id }}">{{ $clinic->clinicName }}</a></td>
        <td>{{ $clinic->completeAddress }}</td>
        <td>{{ $clinic->emailAddress }}</td>
        <td>
        @if($clinic->verified == 'Approved')
          Approved
        @elseif($clinic->verified == 'Rejected')
          Rejected
        @else
          Unverified
        @endif
        </td>
        <td>
          <form action="/view-clinics" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="clinicID" value="{{ $clinic->id }}">
            <button class="btn btn-danger" type="submit" name="rejectBtn" value="Reject">Reject</button>
            <button class="btn btn-primary" type="submit" name="approveBtn" value="Approve">Approve</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection