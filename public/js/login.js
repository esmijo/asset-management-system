$(document).ready( function () {
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
})