@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
<h1>Search for Clinic or Laboratory Tests</h1>
<form action="/live-search" method="post">
  <div class="input-group mb-3">
    <input type="text" class="form-control" id="liveSearch" name="liveSearch" required>
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button">Search</button>
    </div>
  </div>
  <div class="accordion" id="clinicAccordion">
      
  </div>
</form>
@endsection