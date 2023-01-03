<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <style>
    body {
      background-color: #ddd;
    }
    .forbidden {
      text-align: center;
    }

    .allowed {
      text-align: center;
    }
  </style>
</head>
<body>
    <div class="main container">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          @if(session('userName') == $patient->userName)
            <div class="allowed">
              <br><br><br><br><br>
              @if($patient->verified == null)
                <h1>Email not verified.</h1>
                <hr>
                <form action="/verify-email/patient/{{ $patient->userName }}" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="userName" value="{{ $patient->userName }}">
                <button class="btn btn-success">Click here to verify.</button>
                </form>
                <h2><a href="/" class="btn btn-primary">Click here to go back</a></h2>
              @else
                <h1 class="verified">Email Already Verified</h1>
                <hr>
                <h2><a href="/" class="btn btn-primary">Click here to go back.</a></h2>
              @endif
            </div>
          @else
            <div class="forbidden">
              <br><br><br><br><br>
              <h1>You don't have access to this page.</h1>
              <hr>
              <h2><a href="/" class="btn btn-primary">Click here to go back</a></h2>
            </div>
          @endif
        </div>
        <div class="col-sm-3"></div>
      </div>
    </div>
</body>
</html>