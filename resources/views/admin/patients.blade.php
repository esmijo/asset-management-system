@extends('layouts.main-layout')

@section('title')
View Patients
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
              @foreach($users as $key => $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->firstName }} {{ $user->middleName }}  {{ $user->lastName }}</td>
                  <td>{{ $user->sex }}</td>
                  <td>{{ $user->birthDay }}</td>
                  <td><a href="update-patient/{{ $user->id }}">Update Info</a></td>
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