@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
<div id="clinicProfileContainer">
  <h2>Clinic Profile</h2>
  <div class="photo-container">
    <img src="{{ $var->imagePath }}" class="profile-photo" alt="">
    <br>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <form action="/clinic-profile" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="hidden" name="clinic_id" value="{{ $var->id }}">
            <input type="file" class="form-control" id="image" name="image" required>
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="update_btn" name="update_btn">Update</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-sm-1"></div>
    </div>
  </div>
  <hr>
  <form class="registration-form" action="/save-clinic" method="post" id="form-clinic">
    <input type="hidden" name="userType" value="clinic">
    <input type="hidden" name="clinicIDsecret" value="{{ $var->id }}">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="clinicName"><span class="req">*</span> Clinic Name</label>
          <input type="text" class="form-control" id="clinicName" name="clinicName" value="{{ $var->clinicName }}" required>
        </div>
        <div class="form-group">
          <label for="contactNumber"><span class="req">*</span> Contact Number <span id="user_available"></span></label>
          <input type="text" class="form-control" id="contactNumber" name="contactNumber"  value="{{ $var->contactNumber }}" required>
        </div>
        <div class="form-group">
          <label for="passWord"><span class="req">*</span> Password</label>
          <input type="password" class="form-control" id="password" name="passWord" value="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="emailAddress"><span class="req">*</span> Email Address</label>
          <input type="text" class="form-control" id="emailAddress" name="emailAddress" value="{{ $var->emailAddress }}" required>
        </div>
        <div class="form-group">
          <label for="completeAddress"><span class="req">*</span> Complete Address (Google Map Address)</label>
          <input type="text" class="form-control" id="completeAddress" name="completeAddress" value="{{ $var->completeAddress }}" required>
        </div>
        <div class="form-group">
          <label for="">&nbsp;</label>
          <input class="form-control btn btn-primary" id="update-profile-btn" type="submit" value="Update Details">
        </div>
      </div>
    </div>
  </form>
 </div>
@endsection