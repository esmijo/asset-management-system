<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="/css/fontawesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/media.css">
  <link rel="stylesheet" href="/css/calendar.css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js"></script>
  <script src="/js/axios.min.js"></script>
  <script type="text/javascript" src="/js/jspdf.min.js"></script>
  <script type="text/javascript" src="/js/html2canvas.js"></script>
  <script type="text/javascript" src="/js/chart.min.js"></script>
  <script type="text/javascript" src="/js/reports.js"></script>
  <script src="/js/custom-calendar.js"></script>
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script> --}}
  <script type="text/javascript" src="/js/scripts.js"></script>
  <title>@yield('title')</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" id="main-nav-bar">
    <div class="container-fluid">
      <a class="navbar-brand">Welcome, <strong>{{ session('fullName') }}</strong></a>
      <a class="nav-link" href="/logout">Logout</a>
    </div>
  </nav>

  <main>
    <div id="app">
      <div class="container-fluid main-container">
        <div class="col-md-0"></div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3 col-sm-12">
              @include('layouts.side-nav')
            </div>
            <div class="col-md-9 col-sm-12 content-container">
              @yield('content')
            </div>
          </div>
        </div>
        <div class="col-md-0"></div>
      </div>
    </div>
  </main>
</body>
</html>