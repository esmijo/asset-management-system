<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/app.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
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
              <div class="row">
                <img src="/images/logo.png" alt="">
              </div>
              <div class="row">
                @if(session()->has('error'))
                    <div class="login-error login-message" id="login-error">
                        <span>Incorrect <strong>username</strong> or <strong>password.</strong></span>
                    </div>
                @endif 

                @if(session()->has('signup'))
                    <div class="register-success login-message" id="register-success">
                        <span><strong>Success! </strong>Registration complete.</span>
                    </div>
                @endif

                {{-- MODAL --}}
                <div class="modal fade" id="register-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registration Success!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Thank you for signup-up. Please close this pop-up to login.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- MODAL --}}

              </div>
              <div class="row">
                <div class="form-group">
                  <label for="userName">Username/Email</label>
                  <input type="text" class="form-control" id="userName" name="userName" aria-describedby="emailHelp" placeholder="Enter username or email">
                </div>
                <div class="form-group">
                  <label for="passWord">Password</label>
                  <input type="password" class="form-control" id="passWord" name="passWord" placeholder="Enter password">
                </div>
                <input type="hidden" class="form-control" id="userType" name="userType">
                {{-- <div class="form-group">
                  <label for="userType">User Type</label>
                  <select class="form-control" id="userType" name="userType" required>
                    <option value=""></option>
                    <option value="Person">Person</option>
                    <option value="Clinic">Clinic</option>
                  </select>
                </div> --}}
                <div class="form-group link-register">
                  <span>No account yet? <a href="/register">Register here.</a></span>
                </div>
                <button type="submit" class="btn btn-success">Login</button>
              </div>
            </form>

          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </main>
</body>
</html>