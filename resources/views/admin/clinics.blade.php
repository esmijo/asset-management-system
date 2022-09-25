@extends('layouts.main-layout')

@section('title')
View Clinics
@endsection

@section('content')
<div class="container admin-container">
  <div class="row">
    <div class="col-md-0"></div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-2">
          @include('layouts.side-nav')
        </div>
        <div class="col-md-10">
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
        </div>
      </div>
    </div>
    <div class="col-md-0"></div>
  </div>
</div>
@endsection