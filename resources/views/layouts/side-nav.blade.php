<div class="row" role="tabpanel">
  <div class="col-md-12">
    <div class="d-flex flex-column flex-shrink-0 admin-side-nav" id="admin-side-nav">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="javascript:void(0);" class="nav-link link-dark nav-icon">
            <strong class="">Menu</strong>
          </a>
        </li>
        @if(session('userType') == 'Admin')
          <li class="nav-item">
            <a href="/admin-dashboard" class="nav-link link-dark">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="/view-clinics" class="nav-link link-dark">View Clinics</a>
          </li>
          <li class="nav-item">
            <a href="/view-patients" class="nav-link link-dark">View Patients</a>
          </li>
        @elseif(session('userType') == 'Clinic')
          <li class="nav-item">
            <a href="/clinic-profile" class="nav-link link-dark">Clinic Profile</a>
          </li>
          <li class="nav-item">
            <a href="/clinic-appointments" class="nav-link link-dark">Manage Appointments</a>
          </li>
          <li class="nav-item">
            <a href="/clinic-lab-tests" class="nav-link link-dark">Manage Lab Tests</a>
          </li>
          <li class="nav-item">
            <a href="/clinic-time-schedules" class="nav-link link-dark">Manage Time Schedules</a>
          </li>
          <li class="nav-item">
            <a href="/clinic-reports" class="nav-link link-dark">Manage Reports</a>
          </li>
        @else
        <li class="nav-item">
          <a href="/clinics-and-services" class="nav-link link-dark">Clinics and Services</a>
        </li>
          <li class="nav-item">
            <a href="/my-appointments" class="nav-link link-dark">My Appointments</a>
          </li>
          {{-- <li class="nav-item">
            <a href="/create-appointment" class="nav-link link-dark">Create Appointment</a>
          </li> --}}
          <li class="nav-item">
            <a href="/my-profile" class="nav-link link-dark">My Profile</a>
          </li>
        @endif
        <li class="nav-item logout-container">
          <a href="/logout" class="nav-link link-dark logout-btn">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</div>