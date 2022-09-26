@extends('layouts.main-layout')

@section('title')
  Create New Appointment
@endsection

@section('content')
  <form action="/create-appointment" class="create-appointment-form" method="post">
    {{ csrf_field() }}
    <h1>CREATE NEW APPOINTMENT</h1>
    <input type="hidden" name="servicesCount" value="" id="servicesCount">
    <input type="hidden" name="userID" value="{{ $user->id }}">
    <hr>
    <div class="row">
      <div class="col-md-6">
        
        <div class="form-group">
          <label for="firstName">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $user->firstName }}" readonly>
        </div>
        
        <div class="form-group">
          <label for="middleName">Middle Name</label>
          <input type="text" class="form-control" id="middleName" name="middleName" value="{{ $user->middleName }}" readonly>
        </div>
        
        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" id="lastname" name="lastName" value="{{ $user->lastName }}" readonly>
        </div>

        <div class="form-group">
          <label for="clinicName">Clinic Name</label>
          <select class="form-control" id="clinicName" name="clinicName" required>
            <option value="">Select one...</option>
            @foreach($clinics as $key => $clinic)
              <option value="{{ $clinic->id }}">{{ $clinic->clinicName }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="appointmentDate">Apointment Date</label>
          <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required>
        </div>

        <div class="form-group">
          <label for="appointmentTime">Appointment Time</label>
          <select class="form-control" id="appointmentTime" name="appointmentTime" required>
            <option value="">Choose a time slot...</option>
          </select>
        </div>

        <div class="form-group">
          <label for="appointmentTime">Total Amount Due</label>
            <input type="number" class="form-control" id="appointmentDate" name="appointmentDate" readonly>
        </div>

      </div>
      <div class="col-md-6">
        <div class="form-group" id="servicesOffered">
          <label for="">Services Offered (Choose at least one.)</label>
        </div>
      </div>
      <hr>
      <div class="form-group">
        <input type="submit" class="btn btn-success" id="create-appointment-btn" value="Submit">
      </div>
    </div>

  </form>
@endsection