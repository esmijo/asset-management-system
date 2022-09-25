<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/app.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title>Welcome!</title>
</head>
<body>
    <nav>
      <div class="container">

      </div>
    </nav>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4">

            <form class="login-form" action="/login" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="userName">Username/Email</label>
                <input type="text" class="form-control" id="userName" name="userName" aria-describedby="emailHelp" placeholder="Enter username or email">
              </div>
              <div class="form-group">
                <label for="passWord">Password</label>
                <input type="password" class="form-control" id="passWord" name="passWord" placeholder="Enter password">
              </div>
              <div class="form-group">
                <label for="userType">User Type</label>
                <select class="form-control" id="userType" name="userType" required>
                  <option value=""></option>
                  <option value="Person">Person</option>
                  <option value="Clinic">Clinic</option>
                </select>
              </div>
              <div class="form-group link-register">
                <span>No account yet? <a href="/register">Register here.</a></span>
              </div>
              <button type="submit" class="btn btn-success">Login</button>
            </form>

          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </main>
</body>
</html>