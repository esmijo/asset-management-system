$(document).ready( function () {
  console.log(1)
  $('.list-table').DataTable()


  // if (location.pathname == '/create-appointment') {
  if(location.pathname.indexOf('/create-appointment') == 0) {
    // $('#appointmentDate').prop('disabled', true)
    $('#appointmentTime').prop('disabled', true)
    $('#create-appointment-btn').prop('disabled', true)
    // $('#clinicName').on('change', function() {
    //   $('#appointmentDate').prop('disabled', false)
    //   $('#servicesOffered').empty()
    //   $('#servicesOffered').append('<label for="">Services Offered (Choose at least one.)</label>')
    //   let cid = $(this).val()
    //   axios.get(`/axios_get_lab_tests?ClinicID=${cid}`).then(res => {
    //     let services = res.data
    //     $('#servicesCount').val(services.length)
    //     $.each(services, function(index, val) {
    //       $('#servicesOffered').append('<div class="form-check form-switch">' +
    //         '<input class="form-check-input" type="checkbox" id="' + val.id + ' " name=test-' + val.id + ' value="' + val.id +'">' +
    //         '<label class="form-check-label" for="' + val.id + ' ">' + val.testName + '</label>' +
    //       '</div>')
    //     })
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
          $('#totalAmount').val(total)
        })
    //   })
    // })

    $('#appointmentDate').on('change', function () {
      let cid = $('#clinicName').data('val')
      console.log($(this).val())
      axios.get(`/axios_get_time_slot?ClinicID=${cid}`).then(res => {
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

  

  if(location.pathname == '/clinics-and-services') {
    console.log('here')
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
            state = 'show'
          } else {
            state = ''
          }
          console.log(this.tests)
          $('#clinicAccordion').append('<div class="accordion-item">' +
            '<h2 class="accordion-header" id="heading' + index + '">' +
              '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' + index + '" aria-expanded="true" aria-controls="collapseOne"><h3>' + val.clinicName + '</h3>' +
              '</button>' +
            '</h2>' +
            '<div id="collapse-' + index + '" class="accordion-collapse collapse '+ state + '" aria-labelledby="heading' + index + '" data-bs-parent="#clinicAccordion">' +
              '<div class="accordion-body">' +
                '<div class="row">' +
                  // '<table id="lab_tests"><tr><th>Test Name</th><th>Price</th><th>ID</th></tr></table>' +
                  '<h2>' + val.completeAddress + '</h4>' +
                  '<h4>' + val.contactNumber + '</h4>' +
                  '<h4>' + val.emailAddress + '</h4>' +
                  '<a href="/create-appointment/' + val.id + '" class="btn btn-success">Book an Appointment</a>' +
                  '</div>' +
              '</div>' +
            '</div>' +
          '</div>')
            // for(x = 0; x < this.tests.length; x++) {
            //   $('#lab_tests').append('<tr><td>Test Name</td>1<td>Price</td><td>ID</td></tr>')
            // }
        }) //END OF EACH RES
      })
    }
  }

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
