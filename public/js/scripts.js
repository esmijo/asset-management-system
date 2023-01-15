$(document).ready( function () {
  console.log(1)
  $('.list-table').DataTable()

  if(location.pathname.indexOf('/create-appointment') == 0) {
    // $('#appointmentDate').prop('disabled', true)
    $('#appointmentTime').prop('disabled', true)
    $('#create-appointment-btn').prop('disabled', true)

    let total = parseFloat(0.00)
    $('.form-check-input').on('change', function() {
      // console.log($(this).val())

      let total = 0

      $('input:checkbox:checked').each(function(){
        total += isNaN(parseFloat($(this).data('price'))) ? 0 : parseInt($(this).data('price'))
      })
      
      checked = $("input[type=checkbox]:checked").length
      if(checked > 0) {
        // total = total + parseFloat($(this).data('price'))
        $('#create-appointment-btn').prop('disabled', false)
      } else {
        // total = total - parseFloat($(this).data('price'))
        $('#create-appointment-btn').prop('disabled', true)
      }
      console.log(total)
      $('#totalAmount').val(parseFloat(total).toFixed(2))
    })
    //   })
    // })

    $('#appointmentDate').on('change', function () {
      let clinicID = $('#clinicName').data('val')
      let appointmentDate = $(this).val()
      // console.log($(this).val())
      axios.get(`/axios_get_time_slot?clinicID=${clinicID}&appointmentDate=${appointmentDate}`).then(res => {
        $('#appointmentTime').prop('disabled', false)
        $('#appointmentTime').empty()
        $('#appointmentTime').append('<option value="">Choose a time slot...</>')
        let time_slots = res.data
        console.log(time_slots)
        $.each(time_slots, function(index, val) {
          // axios.get(`/axios_get_available_time?appTime=${val.id}`).then(res => {
          //   let availability = res.data
          //   if(availability == 'available') {
              $('#appointmentTime').append(
                $('<option>', {
                    value: val.realTime,
                    text: val.timeSlotName
                })
              ) //Change Time Slot dropdown values
          //   }
          // })
        })
      })
    })

  }


  if(location.pathname.indexOf('/edit-appointment') == 0) {
    // $('#appointmentTime').prop('disabled', true)
    // $('#create-appointment-btn').prop('disabled', true)
    let total = parseFloat(0.00)
    $('.form-check-input').on('change', function() {
      // console.log($(this).val())

      let total = 0

      $('input:checkbox:checked').each(function(){
        total += isNaN(parseFloat($(this).data('price'))) ? 0 : parseInt($(this).data('price'))
      })
      
      checked = $("input[type=checkbox]:checked").length
      if(checked > 0) {
        // total = total + parseFloat($(this).data('price'))
        $('#create-appointment-btn').prop('disabled', false)
      } else {
        // total = total - parseFloat($(this).data('price'))
        $('#create-appointment-btn').prop('disabled', true)
      }
      console.log(total)
      $('#totalAmount').val(parseFloat(total).toFixed(2))
    })

    $('#appointmentDate').on('change', function () {
      let cid = $('#clinicName').data('val')
      console.log($(this).val())
      axios.get(`/axios_get_time_slot?clinicID=${cid}&appointmentDate=${appointmentDate}`).then(res => {
        $('#appointmentTime').prop('disabled', false)
        $('#appointmentTime').empty()
        $('#appointmentTime').append('<option value="">Choose a time slot...</>')
        let time_slots = res.data
        console.log(time_slots)
        $.each(time_slots, function(index, val) {
          // axios.get(`/axios_get_available_time?appTime=${val.id}`).then(res => {
          //   let availability = res.data
          //   if(availability == 'available') {
              $('#appointmentTime').append(
                $('<option>', {
                    value: val.realTime,
                    text: val.timeSlotName
                })
              ) //Change Time Slot dropdown values
          //   }
          // })
        })
      })
    })
  }


  if(location.pathname =='/my-profile') {
    $('#update-profile-btn').prop('disabled', 'disabled')
    $('#password').on('keyup', function() {
      let password = $('#password').val()
      axios.get(`/axios_match_password?passWord=${password}`).then(res => {
        console.log(res.data)
        if(res.data == 'true') {
          $('#update-profile-btn').prop('disabled', false)
        } else {
          $('#update-profile-btn').prop('disabled', true)
        }
      })
    })
  }

  if(location.pathname =='/clinic-profile') {
    $('#update-profile-btn').prop('disabled', 'disabled')
    $('#password').on('keyup', function() {
      let password = $('#password').val()
      axios.get(`/axios_match_password?passWord=${password}`).then(res => {
        console.log(res.data)
        if(res.data == 'true') {
          $('#update-profile-btn').prop('disabled', false)
        } else {
          $('#update-profile-btn').prop('disabled', true)
        }
      })
    })
  }

  if(location.pathname == '/clinics-and-services') {
    console.log('here')
    liveSearch() // load search results on page.ready
    $('#liveSearch').keyup(liveSearch)

    $('#liveSearchBtn').click(liveSearch)


    function liveSearch() {
      let keyword = $('#liveSearch').val()
      axios.get(`/axios_live_search?keyWord=${keyword}`).then(res => {
        let result = res.data
          $('#clinicAccordion').empty()
        $.each(result, function(index, val) {
          let state = ''
          if(index == 0) {
            state = ''
          } else {
            state = ''
          }
          $('#clinicAccordion').append('<div class="accordion-item">' +
            '<h2 class="accordion-header create-appt-btn" data-id="'+ val.id + '" id="heading-' + index + '">' +
              '<button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' + index + '" aria-expanded="true" aria-controls="collapseOne" ><h3>' + val.clinicName + '</h3>' +
              '</button>' +
            '</h2>' +
            '<div id="collapse-' + index + '" class="accordion-collapse collapse '+ state + '" aria-labelledby="heading' + index + '" data-bs-parent="#clinicAccordion">' +
              '<div class="accordion-body">' +
                '<div class="row">' +
                  '<div class="col-md-6">' +
                    '<div class="row">' +
                      '<h3>Clinic Details</h3>' +
                      '<table class="table">' +
                      '<tr><th>Logo</th><th> : </th><td><img src="' + val.imagePath + '" alt="Clinic Logo" width="150" height="150" style="border: 1px solid grey; border-radius: 5px;"></td></tr>' +
                      '<tr><th>Address</th><th> : </th><td>' + val.completeAddress + '</td></tr>' +
                      '<tr><th>Contact Number</th><th> : </th><td>' + val.contactNumber + '</td></tr>' +
                      '<tr><th>Email Address</th><th> : </th><td>' + val.emailAddress + '</td></tr>' +
                      '</table>' +
                    '</div>' +
                    '<div class="row">' +
                    '<br><h3>Clinic Location</h3>' +
                    '<iframe width="450" height="250" frameborder="0" style="border:0" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBpg1YYfO6E5bT2solb9CAYwv2WOf2Atik&q=' + val.completeAddress  + '"></iframe>' +
                    '</div>' +
                  '</div>' +

                  '<div class="col-md-6">' +
                  '<h3>Services Offered</h3>' +
                    '<table id="lab_tests_'+ val.id +'" class="table table-bordered"><tr><th>Test Name</th><th>Price</th></tr></table>' +
                  '</div>' +
                  '<a href="/create-appointment/' + val.id + '" class="btn btn-primary">Book an Appointment</a>' +
                  '</div>' +
              '</div>' +
            '</div>' +
          '</div>')

            console.log(this.tests)
          // })
            for(x = 0; x < this.tests.length; x++) {
              $('#lab_tests_' + val.id).append('<tr><td>' + this.tests[x].testName + '</td>1<td>' + this.tests[x].price + '</td></tr>')
            }
            // var output = '';
            // for (var property in val.tests) {
            //   output += property + ': ' + object[property]+'; ';
            //   console.log(output)
            // }
            // console.log(output)
            // $('#lab_tests_' + val.id).append(output)
        }) //END OF EACH RES
      })
    }

    // $('.create-appt-btn').click(function() {
    //   let btn_id = $(this).data('id')
    //   console.log(btn_id)
    //   axios.get(`/axios_live_search_tests?clinicID=${btn_id}`).then(res => {
    //     let tests = res.data
    //     for(x = 0; x < tests.length; x++) {
    //       $('#lab_tests_' + btn_id).append('<tr><td>Test Name</td>1<td>Price</td><td>ID</td></tr>')
    //     }
    //   })
    // })
  }
  $('#downloadAppDetails').on('click', function() {
    var clinic = $(this).data('clinic')
    var date = $(this).data('date')
    var time = $(this).data('time')
    CreatePDFfromHTML(clinic, date, time)
  })
  
  //START JSPDF
  function CreatePDFfromHTML(clinic, date, slot) {
    var filename = clinic + '-' + date + '-' + slot + '.pdf';
    var HTML_Width = $(".print-details").width();
    var HTML_Height = $(".print-details").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".print-details")[0]).then(function (canvas) {
      var imgData = canvas.toDataURL("image/jpeg", 1.0);
      var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
      pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
      for (var i = 1; i <= totalPDFPages; i++) { 
          pdf.addPage(PDF_Width, PDF_Height);
          pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
      }
      pdf.save(filename);
    });
  }
  //END JSPDF

  $('.nav-icon').on('click', function() {
   $('#admin-side-nav').toggleClass('responsive');
  })

  
})


// console.log(3)
// $('#datetimepicker').datetimepicker({
//   format:'d.m.Y H:i',
//   inline:true,
//   lang:'en',
//   allowTimes:[
//     '08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00'
//    ]
// })
