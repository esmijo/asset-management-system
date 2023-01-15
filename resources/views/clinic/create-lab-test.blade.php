@extends('layouts.main-layout')

@section('title')
  My Appointments
@endsection

@section('content')
<div class="row">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        
        <form action="/create-lab-test" method="post" class="create-new-form">
          {{ csrf_field() }}
      <h3>Create Laboratory Test</h3>
        <div class="row">
          <div class="form-group">
            <label for="testName"><span class="req">* </span>Laborary Test Name</label>
            <input type="text" class="form-control" id="testName" name="testName" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <label for="testPrice"><span class="req">* </span>Laboratory Test Price</label>
            <input type="number" class="form-control" id="testPrice" name="testPrice" required>
          </div>
        </div>
        <input type="hidden" name="clinicID" value="">
        <div class="row">
          <div class="form-group">
            <button class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
</div>
@endsection