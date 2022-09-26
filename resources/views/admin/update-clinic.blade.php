@extends('layouts.main-layout')

@section('title')
  Update Clinic Details
@endsection

@section('content')
<form class="registration-form" action="/update-clinic/{{ $clinic->id }}" method="post" id="form-clinic">
  <input type="hidden" name="userType" value="clinic">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="clinicName"><span class="req">*</span> Clinic Name</label>
        <input type="text" class="form-control" id="clinicName" name="clinicName" required>
      </div>
      <div class="form-group">
        <label for="contactNumber"><span class="req">*</span> Contact Number <span id="user_available"></span></label>
        <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
      </div>
      <div class="form-group">
        <label for="emailAddress"><span class="req">*</span> Email Address</label>
        <input type="text" class="form-control" id="emailAddress" name="emailAddress" required>
      </div>
      <div class="form-group">
        <label for="passWord"><span class="req">*</span> Password</label>
        <input type="password" class="form-control" id="passWord" name="passWord" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="mapLatitude">Map Latitude</label>
        <input type="text" class="form-control" id="mapLatitude" name="mapLatitude">
      </div>
      <div class="form-group">
        <label for="mapLongtitude">Map Longtitude</label>
        <input type="text" class="form-control" id="mapLongtitude" name="mapLongtitude">
      </div>
      <div class="form-group">
        <label for="completeAddress"><span class="req">*</span> Complete Address</label>
        <input type="text" class="form-control" id="completeAddress" name="completeAddress">
      </div>
      <div class="form-group">
        <label for=""></label>
        <input class="form-control btn btn-success" type="submit" value="Register">
      </div>
    </div>
  </div>
</form>
@endsection