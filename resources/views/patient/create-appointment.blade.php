@extends('layouts.main-layout')

@section('title')
  Create New Appointment
@endsection

@section('content')
  <div id="createAppointmentsContainer">
    <form action="/create-appointment/{{ $clinic->id }}" class="create-appointment-form" method="post">
      {{ csrf_field() }}
      <h1>CREATE NEW APPOINTMENT</h1>
      <input type="text" name="servicesCount" value="{{ count($tests) }}" id="">
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
            {{-- <select class="form-control" id="clinicName" name="clinicName" required>
              <option value="">Select one...</option>
              @foreach($clinics as $key => $clinic)
                <option value="{{ $clinic->id }}">{{ $clinic->clinicName }}</option>
              @endforeach
            </select> --}}
            <input type="text" class="form-control" id="clinicNameOnDisplay" name="clinicNameOnDisplay" value="{{ $clinic->clinicName }}" readonly>
            
            <input type="hidden" class="form-control" id="clinicName" name="clinicName" data-val="{{ $clinic->id }}" value="{{ $clinic->id }}" readonly>
          </div>
  
          <div class="form-group">
            <label for="appointmentDate">Apointment Date</label>
            <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required>
          </div>
  
          <div class="form-group">
            <label for="appointmentTime">Appointment Time: <span class="slot-qty">3</span> slots available. </label>
            <select class="form-control" id="appointmentTime" name="appointmentTime" required>
              <option value="">Choose a time slot...</option>
            </select>
          </div>
  
          <div class="form-group">
            <label for="totalAmount">Total Amount Due</label>
              <input type="number" class="form-control" id="totalAmount" name="totalAmount" value="0" readonly>
          </div>
  
        </div>
        <div class="col-md-6">
          <div class="form-group" id="servicesOffered">
            <label for="">Services Offered (Choose at least one.)</label>
            @foreach($tests as $key => $test)
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="{{ $test->id }}" name="test-{{ $key + 1 }}" data-price="{{ $test->price }}" value="{{ $test->testName }}">
                <label class="form-check-label" for="{{ $key + 1 }}">{{ $test->testName }}, <strong>P{{ $test->price }}</strong></label>
              </div>
            @endforeach
          </div>
        </div>
        <hr>
        <div class="form-group">
          <input type="submit" class="btn btn-success" id="create-appointment-btn" value="Submit">
        </div>
      </div>
  
    </form>
  </div>
@endsection