@extends('layouts.main-layout')

@section('title')
Reports Management
@endsection

@section('content')
  <form action="">
    {{ csrf_field() }}
    <input type="hidden" name="clinicID" value="{{ $clinic->id }}" id="clinicID">
    <div class="container">
      <div class="report-container row">
        <hr>
        <div class="filter-container-left col-sm-6">
          <div class="form-group">
            <label for="firstName">Tests Availed</label>
            <select class="form-control" id="testsAvailed" name="testsAvailed" value="">
              <option value="All">All</option>
              @foreach($tests as $key => $test)
                <option value="{{ $test->testName}}">{{ $test->testName }}</option>
              @endforeach
            </select>
          </div>
          <br>
          {{-- <div class="form-group">
            <label for="firstName">Laboratory Test</label>
            <select class="form-control" id="tests" name="tests" value="">
                <option value="all">All</option>
                @foreach($tests as $key => $test)
                  <option value="{{ $test->id }}">{{ $test->testName }}</option>
                @endforeach
            </select>
          </div> --}}
        </div>

        <div class="filter-container-right col-sm-6">
          <div class="form-group">
            <label for="firstName">Chart Type</label>
            <select class="form-control" id="chart" name="chart" value="">
              <option value="bar">Bar</option>
              <option value="doughnut">Doughnut</option>
              <option value="pie">Pie</option>
              <option value="line">Line</option>
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

