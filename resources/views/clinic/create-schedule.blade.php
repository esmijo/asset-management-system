@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
<div class="row">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      
      <form action="/create-schedule" method="post" class="create-new-form">
        {{ csrf_field() }}
    <h3>Create Schedule</h3>
      <div class="row">
        <div class="form-group">
          <label for="timeSlotName"><span class="req">* </span>Time Slot Name: Eg. (08:00AM - 9:00AM)</label>
          <input type="text" class="form-control" id="timeSlotName" name="timeSlotName" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label for="realTime"><span class="req">* </span>Real Schedule Time:</label>
          <input type="time" class="form-control" id="realTime" name="realTime" required>
        </div>
      </div>
      <input type="hidden" name="clinicID" value="">
      <div class="row">
        <div class="form-group">
          <button class="btn btn-success w-100">Submit</button>
        </div>
      </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
@endsection