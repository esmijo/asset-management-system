@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
  <div id="clinicAppointmentsContainer">
    <h1>Clinic Appointments</h1>

<div class="accordion" id="appointmentsAccordion">
  @forelse($appointments as $key => $app)
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="true" aria-controls="collapseOne">
        <strong>{{ $app->appointmentDate }}, {{ $app->appointmentTime }}, {{ $app->patient->FullName }}</strong>
      </button>
    </h2>
    <div id="collapse-{{ $key }}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#appointmentsAccordion">
      <div class="accordion-body">
        
      {{-- @foreach($app->servicesAvailed as $services)
        {{ $services->filename }}
      @endforeach --}}
        {{-- <table class="table">
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
                @if($app->status == 'Cancelled')
                  <button class="btn btn-dark">No Actions Allowed</button>
                @elseif($app->status == 'Completed')
                  <button class="btn btn-primary">Completed</button>
                @else
                  <form action="/complete-appointment/{{ $app->id }}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-success">Complete</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button>
                  </form>
                @endif

                <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
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
        </table> --}}

        <h2>Appointment Details</h2>
        <hr>

        <div class="print-details">
          <table class="table table-sm table-hover">
            <tr>
              <td>Patient Name:</td>
              <td>:</td>
              <td><strong>{{ $app->patient->FullName }}</strong></td>
            </tr>
            <tr>
              <td>Appointment Date:</td>
              <td>:</td>
              <td><strong>{{ $app->appointmentDate }}</strong></td>
            </tr>
            <tr>
              <td>Appointment Time:</td>
              <td>:</td>
              <td><strong>{{ $app->appointmentTime }}</strong></td>
            </tr>
            <tr>
              <td>Tests Availed:</td>
              <td>:</td>
              <td>
                @foreach($app->servicesAvailed as $key => $serv)
                  @if($loop->last)
                    <strong>{{ $serv }}.</strong>
                  @else
                    <strong>{{ $serv }},</strong>
                  @endif
                @endforeach
              </td>
            </tr>
            <tr>
              <td>Total Bill:</td>
              <td>:</td>
              <td><strong>{{ $app->totalAmount }}</strong></td>
            </tr>
          </table>
        </div>
        {{-- Buttons --}}
        
        <form action="/complete-appointment/{{ $app->id }}" method="post">
          {{ csrf_field() }}
          <div class="btn-group d-flex" role="group" aria-label="...">
            @if($app->status == 'Cancelled' || $app->status == 'Completed')
              <button class="btn btn-dark  w-100">No Actions Allowed</button>
            @else 
              <button class="btn btn-success">Complete</button>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelModal">Cancel</button>
            @endif
          </div>
          {{-- Cancel Modal --}}
          <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
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
          {{-- End of Cancel Modal --}}
        </form>
        {{-- End Buttons --}}
      </div>
    </div>
  </div>
  @empty
  <div class="jumbotron appointment-jumbotron">
    <h1 class="display-4">No appointments found.</h1>
    <hr class="my-4">
    <p class="lead">No appointments found at the moment.</p>
  </div>
  @endforelse
</div>
@endsection