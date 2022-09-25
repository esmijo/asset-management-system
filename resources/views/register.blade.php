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
  <script src="js/axios.min.js"></script>
  <script src="js/scripts.js"></script>
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
          <div class="col-md-2"></div>
          <div class="col-md-8">

            <div class="registration-container">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><strong>User (Patient)</strong></button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><strong>User (Clinic)</strong></button>
                </li>
              </ul>

              <!-- User (Person Registration Form) -->
              <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <form class="registration-form" action="/register-patient" method="post" id="form-person">
                    {{ csrf_field() }}
                    <input type="hidden" name="userType" value="person">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstName"><span class="req">*</span> Name</label>
                          <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                          <label for="middlename">Middle Name</label>
                          <input type="text" class="form-control" id="middlename" name="middleName">
                        </div>
                        <div class="form-group">
                          <label for="lastname"><span class="req">*</span> Last Name</label>
                          <input type="text" class="form-control" id="lastname" name="lastName" required>
                        </div>
                        <div class="form-group">
                          <label for="sex"><span class="req">*</span> Sex</label>
                          <select class="form-control" id="sex" name="sex" required>
                            <option value=""></option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="birthday"><span class="req">*</span> Birthday</label>
                          <input type="date" class="form-control" id="birthday" name="birthday" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="contact"><span class="req">*</span> Contact Number</label>
                          <input type="number" class="form-control" id="contact" name="contactNumber" required min="0">
                        </div>
                        <div class="form-group">
                          <label for="username"><span class="req">*</span> Username <span id="user_available"></span></label>
                          <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                          <label for="password"><span class="req">*</span> Password</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                          <label for="email"><span class="req">*</span> Email Address <span id="email_available"></span></label></label>
                          <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                          <label for=""></label>
                          <input class="form-control btn btn-success" type="submit" value="Register">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

                <!-- User (Clinic Registration Form) -->
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <form class="registration-form" action="/register-clinic" method="post" id="form-clinic">
                    <input type="hidden" name="userType" value="clinic">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="clinicName"><span class="req">*</span> Clinic Name</label>
                          <input type="text" class="form-control" id="clinicName" name="clinicName" required>
                        </div>
                        <div class="form-group">
                          <label for="contactNumber"><span class="req">*</span> Contact Number <span id="user_available"></span></label>
                          <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
                        </div>
                        <div class="form-group">
                          <label for="emailAddress"><span class="req">*</span> Email Address</label>
                          <input type="text" class="form-control" id="emailAddress" name="emailAddress" required>
                        </div>
                        <div class="form-group">
                          <label for="passWord"><span class="req">*</span> Password</label>
                          <input type="password" class="form-control" id="passWord" name="passWord" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="mapLatitude">Map Latitude</label>
                          <input type="text" class="form-control" id="mapLatitude" name="mapLatitude">
                        </div>
                        <div class="form-group">
                          <label for="mapLongtitude">Map Longtitude</label>
                          <input type="text" class="form-control" id="mapLongtitude" name="mapLongtitude">
                        </div>
                        <div class="form-group">
                          <label for="completeAddress"><span class="req">*</span> Complete Address</label>
                          <input type="text" class="form-control" id="completeAddress" name="completeAddress">
                        </div>
                        <div class="form-group">
                          <label for=""></label>
                          <input class="form-control btn btn-success" type="submit" value="Register">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
              
                  
              <div class="form-group link-login">
                <span>Already have an account? <a href="/login">Click here to login.</a></span>
              </div>
            </div>

          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </main>
</body>
</html>