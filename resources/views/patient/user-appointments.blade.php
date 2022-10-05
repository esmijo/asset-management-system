@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
<div class="accordion" id="appointmentsAccordion">
  <h1>My Appointments</h1>
  @foreach($appointments as $key => $app)
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading-{{ $key + 1 }}">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapseOne">
        <strong>{{ $app->appointmentDate }}, {{ $app->appointmentTime }}, {{ $app->clinic->clinicName }}</strong>
      </button>
    </h2>
    <div id="collapse-{{ $key }}" class="accordion-collapse collapse show" aria-labelledby="heading-{{ $key + 1 }}" data-bs-parent="#appointmentsAccordion">
      <div class="accordion-body">
        <table class="table">
          <thead>
            <tr>
              <th>Clinic Name</th>
              <th>Date</th>
              <th>Time</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $app->clinic->clinicName }}</td>
              <td>{{ $app->appointmentDate }}</td>
              <td>{{ $app->appointmentTime }}</td>
              <td>{{ $app->status }}</td>
              <td>
                @if($app->status == 'Cancelled' || $app->status == 'Completed')
                  <button class="btn btn-dark">No Actions Allowed</button>
                @else 
                  <a href="/edit-appointment/{{ $app->id }}" class="btn btn-warning">Edit</a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal-{{ $key + 1 }}">Cancel</button>
                @endif

                <div class="modal fade" id="cancelModal-{{ $key + 1 }}" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="cancelModalLabel">Appointment Cancellation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <strong>Are you sure you want to cancel your appointment?</strong>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="/cancel-appointment/{{ $app->id }}" method="post">
                          {{ csrf_field() }}
                          <button class="btn btn-danger">Cancel Appointment</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection