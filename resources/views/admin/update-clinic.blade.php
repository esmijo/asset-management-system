@extends('layouts.main-layout')

@section('title')
  Update Clinic Details
@endsection

@section('content')
<form class="registration-form" action="/save-clinic" method="post" id="form-clinic">
  <input type="hidden" name="clinicIDsecret" value="{{ $clinic->id }}">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="clinicName"><span class="req">*</span> Clinic Name</label>
        <input type="text" class="form-control" id="clinicName" name="clinicName" value="{{ $clinic->clinicName }}">
      </div>
      <div class="form-group">
        <label for="contactNumber"><span class="req">*</span> Contact Number</label>
        <input type="text" class="form-control" id="contactNumber" name="contactNumber" value="{{ $clinic->contactNumber }}">
      </div>
      <div class="form-group">
        <label for="passWord"><span class="req">*</span> Password</label>
        <input type="password" class="form-control" id="passWord" name="passWord">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="emailAddress"><span class="req">*</span> Email Address</label>
        <input type="text" class="form-control" id="emailAddress" name="emailAddress" value="{{ $clinic->emailAddress }}">
      </div>
      <div class="form-group">
        <label for="completeAddress"><span class="req">*</span> Complete Address</label>
        <input type="text" class="form-control" id="completeAddress" name="completeAddress" value="{{ $clinic->completeAddress }}">
      </div>
      <div class="form-group">
        <label for=""></label>
        <input class="form-control btn btn-primary" type="submit" value="Register">
      </div>
    </div>
  </div>
</form>
@endsection