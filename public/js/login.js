$(document).ready( function () {
  
  if(location.pathname == '/login') {
    console.log($('#userName').val())
    $('#userName').on('keyup', function() {
      var username = $(this).val()
      if (username.indexOf('@') > -1) {
        $('#userType').val('Clinic')
        console.log('Clinic')
      } else {
        $('#userType').val('Person')
        console.log('Person')
      }
    })

    if ( $('#register-success').length ) {
      $('#register-modal').modal('show')
    }

    if ( $('#clinic-not-verified').length ) {
      $('#not-verified-modal').modal('show')
    }
  }

  //AGE VERIFICATION ON REGISTER
  if (location.pathname == '/register') {
    var today = new Date()
    var dd = today.getDate()
    var mm = today.getMonth()+1 //January is 0!
    var yyyy = today.getFullYear()-18
    if(dd<10){
      dd='0'+dd
    } 
    if(mm<10){
      mm='0'+mm
    } 

    today = yyyy+'-'+mm+'-'+dd
    document.getElementById('birthday').setAttribute('max', today)
  }
})