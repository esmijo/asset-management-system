@extends('layouts.main-layout')

@section('title')
  Edit Appointment Details
@endsection

@section('content')
  <div id="editAppointmentsContainer">
    <form action="/edit-appointment/{{ $appointment->id }}" class="create-appointment-form" method="post">
      {{ csrf_field() }}
      <h1>EDIT APPOINTMENT DETAILS</h1>
      <input type="hidden" name="servicesCount" value="{{ count($tests) }}" id="">
      <input type="hidden" name="userID" value="{{ $user->id }}">
      <input type="hidden" name="appointmentID" value="{{ $appointment->id }}">
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

            <input type="text" class="form-control" id="clinicNameOnDisplay" name="clinicNameOnDisplay" value="{{ $clinic->clinicName }}" readonly>
            <input type="hidden" class="form-control" id="clinicName" name="clinicName" data-val="{{ $clinic->id }}" value="{{ $clinic->id }}" readonly>
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
            <label for="totalAmount">Total Amount Due</label>
              <input type="number" class="form-control" id="totalAmount" name="totalAmount" value="{{ $appointment->totalAmount }}" readonly>
          </div>

          <div class="form-group">
            <label for="totalAmount">Set Appointment For Someone: (Optional)</label>
              <input type="text" class="form-control" id="totalAmount" name="appointmentFor" value="{{ $appointment->patientName }}">
          </div>
  
        </div>
        <div class="col-md-6">
          <div class="form-group" id="servicesOffered">
            <label for="">Services Offered (Choose at least one.)</label>
            {{-- @foreach($existingTests as $key => $test)
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="{{ $test->id }}" name="test-{{ $test->id }}" data-price="{{ $test->price }}" value="{{ $test->testName }}" checked="checked">
                <label class="form-check-label" for="{{ $test->id }}">{{ $test->testName }}</label>
              </div>
            @endforeach --}}
            @foreach($tests as $key => $test)
              @foreach($existingTests as $key => $et)
                @if($test->testName == $et->testName)
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="{{ $test->id }}" name="test-{{ $test->id }}" data-price="{{ $test->price }}" value="{{ $test->testName }}" checked="checked">
                    <label class="form-check-label" for="{{ $test->id }}">{{ $test->testName }}</label>
                  </div>
                @endif
              @endforeach
              @foreach($notExistsTests as $key => $et)
                @if($test->testName == $et->testName)
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="{{ $test->id }}" name="test-{{ $test->id }}" data-price="{{ $test->price }}" value="{{ $test->testName }}">
                    <label class="form-check-label" for="{{ $test->id }}">{{ $test->testName }}</label>
                  </div>
                @endif
              @endforeach
              {{-- <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="{{ $test->id }}" name="test-{{ $test->id }}" data-price="{{ $test->price }}" value="{{ $test->testName }}">
                <label class="form-check-label" for="{{ $test->id }}">{{ $test->testName }}</label>
              </div> --}}
            @endforeach
          </div>
        </div>
        <hr>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" id="create-appointment-btn" value="Update Appointment Details">
        </div>
      </div>
  
    </form>
  </div>
@endsection