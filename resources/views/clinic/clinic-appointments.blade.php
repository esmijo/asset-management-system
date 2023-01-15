@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
  <div id="clinicAppointmentsContainer">
    <h3 style="text-align: center;">Clinic Appointment Calendar</h3>
    <hr>
  <div class="calendar-container" id="calendar-container">
  
  </div>

    {{-- APPOINTMENT INFO MODAL --}}
    <div class="modal fade" id="appointment-info-modal" aria-labelledby="appInfoLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="appInfoLabel">Appointment Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            {{-- INFO BODY --}}

            <div class="print-details">
              <div class="row">
                <h3 id="patientName" style="text-align: center">ClinicName</h3>
                <img src="" height="150" width="150" alt="" id="patientPhoto">
              </div>
              <hr>
              <table class="table table-sm table-hover">
                <tr>
                  <td>Appointment Date:</td>
                  <td>:</td>
                  <td><strong id="appointmentDate"></strong></td>
                </tr>
                <tr>
                  <td>Appointment Time:</td>
                  <td>:</td>
                  <td><strong id="appointmentTime"></strong></td>
                </tr>
                <tr>
                  <td>Tests Availed:</td>
                  <td>:</td>
                  <td>
                    <strong id="testsAvailed"></strong>
                  </td>
                </tr>
                <tr>
                  <td>Total Bill:</td>
                  <td>:</td>
                  <td><strong id="totalBill"></strong></td>
                </tr>
              </table>
            </div>

            <form action="" method="post" id="complete-app-form">
              {{ csrf_field() }}
              <div class="btn-group d-flex" role="group" aria-label="..." id="app-btn-container">
                <button type="button" class="btn btn-primary w-100" id="downloadAppDetails" data-clinic="" data-date="" data-time="">Download</button>
              </div>
            </form>
            {{-- END OF INFO BODY --}}

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    {{-- CANCEL MODAL --}}
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #ececec;">
          <div class="modal-header">
            <h5 class="modal-title" id="cancelModalLabel">Appointment Cancellation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <strong>Are you sure you want to cancel your appointment?</strong>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="" method="post" id="cancel-form">
              {{ csrf_field() }}
              <button class="btn btn-danger">Cancel Appointment</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <input type="hidden" name="" id="clinicID" value="{{ $clinic->id }}">
  </div>
@endsection