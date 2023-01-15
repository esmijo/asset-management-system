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
          <div class="col-md-2"></div>
          <div class="col-md-8">

            <div class="registration-container">
              <div class="row">
                @if(session()->has('error'))
                    <div class="login-error login-message" id="login-error">
                        <span><strong>Username</strong> already exists!</span>
                    </div>
                @endif 
              </div>
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
                          <input type="date" class="form-control" id="birthday" name="birthday" max="2004-01-01" required>
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
                          <input class="form-control btn btn-primary" type="button" value="Register"  data-bs-toggle="modal" data-bs-target="#patientAgreement">
                        </div>
                      </div>

                      {{-- AGREEMENT POLICY MODAL --}}
                      <div class="modal fade" id="patientAgreement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Agreement Policy</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 50px;"></button>
                            </div>
                            <div class="modal-body">
                              <p>Terms and Conditions for Company Name
                                Introduction
                                These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Webiste Name accessible at Website.com.
                                
                                These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.
                                
                                Minors or people below 18 years old are not allowed to use this Website.
                                
                                Intellectual Property Rights
                                Other than the content you own, under these Terms, Company Name and/or its licensors own all the intellectual property rights and materials contained in this Website.
                                
                                You are granted limited license only for purposes of viewing the material contained on this Website.
                                
                                Restrictions
                                You are specifically restricted from all of the following:
                                
                                publishing any Website material in any other media;
                                selling, sublicensing and/or otherwise commercializing any Website material;
                                publicly performing and/or showing any Website material;
                                using this Website in any way that is or may be damaging to this Website;
                                using this Website in any way that impacts user access to this Website;
                                using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;
                                engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;
                                using this Website to engage in any advertising or marketing.
                                Certain areas of this Website are restricted from being access by you and Company Name may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.
                                
                                Your Content
                                In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Company Name a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
                                
                                Your Content must be your own and must not be invading any third-party's rights. Company Name reserves the right to remove any of Your Content from this Website at any time without notice.
                                
                                No warranties
                                This Website is provided “as is,” with all faults, and Company Name express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.
                                
                                Limitation of liability
                                In no event shall Company Name, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  Company Name, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.
                                
                                Indemnification
                                You hereby indemnify to the fullest extent Company Name from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.
                                
                                Severability
                                If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.
                                
                                Variation of Terms
                                Company Name is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.
                                
                                Assignment
                                The Company Name is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.
                                
                                Entire Agreement
                                These Terms constitute the entire agreement between Company Name and you in relation to your use of this Website, and supersede all prior agreements and understandings.
                                
                                Governing Law & Jurisdiction
                                These Terms will be governed by and interpreted in accordance with the laws of the State of Country, and you submit to the non-exclusive jurisdiction of the state and federal courts located in Country for the resolution of any disputes.</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100%;">Close</button>
                              <input class="form-control btn btn-primary" type="submit" value="Agree and Register">
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- END OF AGREEMENT POLICY MODAL --}}

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
                          <label for="passWord"><span class="req">*</span> Password</label>
                          <input type="password" class="form-control" id="passWord" name="passWord" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        {{-- <div class="form-group">
                          <label for="mapLatitude">Map Latitude</label>
                          <input type="text" class="form-control" id="mapLatitude" name="mapLatitude">
                        </div>
                        <div class="form-group">
                          <label for="mapLongtitude">Map Longtitude</label>
                          <input type="text" class="form-control" id="mapLongtitude" name="mapLongtitude">
                        </div> --}}
                        <div class="form-group">
                          <label for="emailAddress"><span class="req">*</span> Email Address</label>
                          <input type="text" class="form-control" id="emailAddress" name="emailAddress" required>
                        </div>
                        <div class="form-group">
                          <label for="completeAddress"><span class="req">*</span> Complete Address (Google Map Address)</label>
                          <input type="text" class="form-control" id="completeAddress" name="completeAddress">
                        </div>
                        <div class="form-group">
                          <label for=""></label>
                          <input class="form-control btn btn-primary" type="button" value="Register"  data-bs-toggle="modal" data-bs-target="#clinicAgreement">
                        </div>
                      </div>

                      {{-- AGREEMENT POLICY MODAL --}}
                      <div class="modal fade" id="clinicAgreement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Agreement Policy</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 50px;"></button>
                            </div>
                            <div class="modal-body">
                              <p>Terms and Conditions for Company Name
                                Introduction
                                These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Webiste Name accessible at Website.com.
                                
                                These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.
                                
                                Minors or people below 18 years old are not allowed to use this Website.
                                
                                Intellectual Property Rights
                                Other than the content you own, under these Terms, Company Name and/or its licensors own all the intellectual property rights and materials contained in this Website.
                                
                                You are granted limited license only for purposes of viewing the material contained on this Website.
                                
                                Restrictions
                                You are specifically restricted from all of the following:
                                
                                publishing any Website material in any other media;
                                selling, sublicensing and/or otherwise commercializing any Website material;
                                publicly performing and/or showing any Website material;
                                using this Website in any way that is or may be damaging to this Website;
                                using this Website in any way that impacts user access to this Website;
                                using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;
                                engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;
                                using this Website to engage in any advertising or marketing.
                                Certain areas of this Website are restricted from being access by you and Company Name may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.
                                
                                Your Content
                                In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Company Name a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
                                
                                Your Content must be your own and must not be invading any third-party's rights. Company Name reserves the right to remove any of Your Content from this Website at any time without notice.
                                
                                No warranties
                                This Website is provided “as is,” with all faults, and Company Name express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.
                                
                                Limitation of liability
                                In no event shall Company Name, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  Company Name, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.
                                
                                Indemnification
                                You hereby indemnify to the fullest extent Company Name from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.
                                
                                Severability
                                If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.
                                
                                Variation of Terms
                                Company Name is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.
                                
                                Assignment
                                The Company Name is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.
                                
                                Entire Agreement
                                These Terms constitute the entire agreement between Company Name and you in relation to your use of this Website, and supersede all prior agreements and understandings.
                                
                                Governing Law & Jurisdiction
                                These Terms will be governed by and interpreted in accordance with the laws of the State of Country, and you submit to the non-exclusive jurisdiction of the state and federal courts located in Country for the resolution of any disputes.</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100%;">Close</button>
                              <input class="form-control btn btn-primary" type="submit" value="Agree and Register">
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- END OF AGREEMENT POLICY MODAL --}}

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