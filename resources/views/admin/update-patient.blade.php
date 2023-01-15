@extends('layouts.main-layout')

@section('title')
Update Patient Info
@endsection

@section('content')
<form class="asda-form" action="/update-patient/{{ $patient->id }}" method="post" id="form-person">
  {{ csrf_field() }}
  <input type="hidden" name="userID" value="{{ $patient->id }}">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $patient->firstName }}">
      </div>
      <div class="form-group">
        <label for="middlename">Middle Name</label>
        <input type="text" class="form-control" id="middlename" name="middleName" value="{{ $patient->middleName }}">
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastName" value="{{ $patient->lastName }}">
      </div>
      <div class="form-group">
        <label for="sex">Sex</label>
        <select class="form-control" id="sex" name="sex" value="">
          @if($patient->sex == 'M')
            <option value="M">Male</option>
            <option value="F">Female</option>
          @else
            <option value="F">Female</option>
            <option value="M">Male</option>
          @endif
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">Birthday</label>
        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $patient->birthDay }}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="contact">Contact Number</label>
        <input type="number" class="form-control" id="contact" name="contactNumber" min="0" value="{{ $patient->contactNumber }}">
      </div>
      <div class="form-group">
        <label for="username">Username <span id="user_available"></span></label>
        <input type="text" class="form-control" id="username" name="username" value="{{ $patient->userName }}">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="passWord" value="">
      </div>
      <div class="form-group">
        <label for="email">Email Address <span id="email_available"></span></label></label">
        <input type="email" class="form-control" id="email" name="email"  value="{{ $patient->emailAddress }}">
      </div>
      <div class="form-group">
        <label for=""></label>
        <input class="form-control btn btn-primary" type="submit" value="Update">
      </div>
    </div>
  </div>
</form>
@endsection