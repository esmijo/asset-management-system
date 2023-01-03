<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Email</title>
</head>
<style>
  html {
    box-sizing: border-box;
  }
  body {
    font-family: Montserrat;
    background-size: cover;
    background-position: center;
  }
  *, *:before, *:after {
    box-sizing: inherit;
    padding: 0;
    margin: 0;
    background-repeat: no-repeat;
    color: #000;
  }
  a {
    text-decoration: none;
  }
  .container {
    max-width: 1200px;
    display: block;
    margin: 0 auto;
    margin-top: 50px;
    padding: 20px;
    text-align: center;
  }
  .email {
    margin: auto;
    display: inline-block;
    padding: 20px;
    border: #0e2449 1px solid;
    height: 500px;
    text-align: center;
    width: 650px;
  }
  .title {
    padding-bottom: 15px;
    border-bottom: 5px #0e2449 solid;
    color: #2173B6;
    margin-bottom: 20px;
    text-align: center;
  }
  .details {
    text-align: left;
  }
  p {
    margin-top: 20px;
  }
  i span {
    text-decoration: underline;
  }
  .description strong {
    text-decoration: underline;
  }
  
  img {
    margin-bottom: 15px;
    width: 400px;
    align-self: center;
  }
  .created_by {
    margin-top: 20px;
  }
</style>
<body>
  <div class="container">
    <div class="email">
      <h1 class="title">Thanks for registering, {{ $clientName }}.</h1>
      <h2>However, before you continue using our system, please verify your email: ({{ $email }})</h2>
      <br>
      <hr>{{ $userType }}
      <br>
      <h3><i><a href="http://127.0.0.1:8000/verify-email/{{ $userType }}/{{ $user }}">CLICK HERE TO VERIFY</a></i></h3>
    </div>
  </div>
</body>
</html>