@extends('layouts.main-layout')

@section('title')
Admin Panel
@endsection

@section('content')
  <form action="">
    {{ csrf_field() }}
    <div class="container">
      <div class="report-container row">
        <hr>
        <div class="filter-container-left col-sm-6">
          <div class="form-group">
            <label for="firstName">Patient Gender</label>
            <select class="form-control" id="approvalStatus" name="approvalStatus">
              <option value="All">All</option>
              <option value="Approved">Approved</option>
              <option value="Rejected">Rejected</option>
              <option value="Unverified">Unverified</option>
            </select>
          </div>
          <br>
        </div>

        <div class="filter-container-right col-sm-6">
          <div class="form-group">
            <label for="firstName">Chart Type</label>
            <select class="form-control" id="chart" name="chart" value="">  
              <option value="bar">Bar</option>
              <option value="line">Line</option>
              <option value="doughnut">Doughnut</option>
              <option value="pie">Pie</option>
              <option value="bubble">Bubble</option>
              <option value="radar">Radar</option>
              <option value="polarArea">Polar Area</option>
            </select>
          </div>
          <br>

        </div>
        <div class="form-group">
          <br>
          <button class="btn btn-primary" id="btn-report" type="button" onclick="loadChart()" style="width: 100%;">Generate Chart</button>
        </div>
        
        <div id="chartContainer">
          <canvas id="main-chart" width="300px"></canvas>
          <div id="report-json"></div>
        </div>
      </div>
    </div>
  </form>
@endsection

