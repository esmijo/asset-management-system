@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
<div id="clinicScheduleContainer">
  <h1>Clinic Schedules</h1>
  <hr>
  <div class="row">
    <a href="/create-schedule" class="btn btn-success add-new-btn">Add New Time Schedule</a>
  </div>
  <hr>
<table class="table table-sm table-hover">
  <thead>
    <tr>
      <th>Time Slot</th>
      <th>Real Time</th>
      <th>Is Available</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($var as $key => $v)
      <tr>
        <td>{{ $v->timeSlotName }}</td>
        <td>{{ $v->realTime }}</td>
        
        <td>
          <form action="/update-schedule/{{ $v->id }}" method="post">
            {{ csrf_field() }}
          @if($v->isAvailable == 'Y')
            <div class="form-check">
              <input class="form-check-input" type="radio" name="schedInput" id="schedY-{{ $v->id }}" checked="checked" value="Y">
              <label class="form-check-label" for="schedY-{{ $v->id }}">
                Enabled
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="schedInput" id="schedN-{{ $v->id }}"  value="N">
              <label class="form-check-label" for="schedN-{{ $v->id }}">
                Disabled
              </label>
            </div>
          @else
            <div class="form-check">
              <input class="form-check-input" type="radio" name="schedInput" id="schedY-{{ $v->id }}" value="Y">
              <label class="form-check-label" for="schedY-{{ $v->id }}">
                Enabled
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="schedInput" id="schedN-{{ $v->id }}"  checked="checked"  value="N">
              <label class="form-check-label" for="schedN-{{ $v->id }}">
                Disabled
              </label>
            </div>
          @endif
        </td>
        <td>
          <div class="action-btn">
            <button class="btn btn-warning">Update</button>
            </form>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $key + 1 }}">Delete</button>
          </div>
          {{-- DELETE MODAL --}}
          <div class="modal fade" id="deleteModal-{{ $key + 1 }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Delete Schedule</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <strong>Are you sure you want to delete: ({{ $v->timeSlotName }})?</strong>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <form action="/delete-schedule/{{ $v->id }}" method="post">
                    {{ csrf_field() }}
                    <button class="btn btn-danger">Delete Schedule</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          {{-- END OF DELETE MODAL --}}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection