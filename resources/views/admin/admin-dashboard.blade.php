@extends('layouts.main-layout')

@section('title')
Admin Panel
@endsection

@section('content')
  <div class="container admin-container">
    <div class="row">
      <div class="col-md-0"></div>
      <div class="col-md-12">
        <div class="col-md-2">
          @include('layouts.side-nav')
        </div>
        <div class="col-md-10">
        </div>
      </div>
      <div class="col-md-0"></div>
    </div>
  </div>
@endsection

