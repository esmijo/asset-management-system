@extends('layouts.main-layout')

@section('title')
Admin Panel
@endsection

@section('content')
  <div class="container admin-container">
    <div class="row">
      <div class="col-md-0"></div>
      <div class="col-md-12">
        <div class="row" role="tabpanel">
          <div class="col-md-3">
            <div class="d-flex flex-column flex-shrink-0" id="admin-side-nav">
              <a href="#/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Sidebar</span>
              </a>
              <hr>
              <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                  <a href="/dashboard" class="nav-link link-dark">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link link-dark dropdown-nav" data-bs-toggle="collapse" data-bs-target="#clinics-collapse" aria-expanded="false">Clinics</a>
                  <div class="collapse show" id="clinics-collapse" style="">
                    <ul class="nav nav-pills flex-column mb-auto">
                      <li><a href="/view-clinics" class="link-dark rounded">View Clinics</a></li>
                      <li><a href="/update-clinics" class="link-dark rounded">Update Clinic Details</a></li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link link-dark dropdown-nav" data-bs-toggle="collapse" data-bs-target="#clients-collapse" aria-expanded="false">Clients</a>
                  <div class="collapse show" id="clients-collapse" style="">
                    <ul class="nav nav-pills flex-column mb-auto">
                      <li><a href="view-clients" class="link-dark rounded">View Clients</a></li>
                      <li><a href="update-clients" class="link-dark rounded">Update Client Details</a></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-0"></div>
    </div>
  </div>
@endsection

