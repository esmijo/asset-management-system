$(document).ready( function () {
  console.log(1)
  $('.list-table').DataTable()


  if (location.pathname == '/create-appointment') {
    $('#appointmentDate').prop('disabled', true)
    $('#timeSlots').prop('disabled', true)
    $('#create-appointment-btn').prop('disabled', true)
    $('#clinicName').on('change', function() {
      $('#appointmentDate').prop('disabled', false)
      $('#servicesOffered').empty()
      $('#servicesOffered').append('<label for="">Services Offered (Choose at least one.)</label>')
      let cid = $(this).val()
      axios.get(`/axios_get_lab_tests?ClinicID=${cid}`).then(res => {
        let services = res.data
        $('#servicesCount').val(services.length)
        $.each(services, function(index, val) {
          $('#servicesOffered').append('<div class="form-check form-switch">' +
            '<input class="form-check-input" type="checkbox" id="' + val.id + ' " name=test-' + val.id + ' value="' + val.id +'">' +
            '<label class="form-check-label" for="' + val.id + ' ">' + val.testName + '</label>' +
          '</div>')
        })
        $('.form-check-input').on('change', function() {
          console.log($(this).val())
          checked = $("input[type=checkbox]:checked").length
          if(checked > 0) {
            $('#create-appointment-btn').prop('disabled', false)
          } else {
            $('#create-appointment-btn').prop('disabled', true)
          }
        })
      })
    })

    $('#appointmentDate').on('change', function () {
      let cid = $('#clinicName').val()
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



    function liveSearch() {
      let keyword = $(this).val()
      axios.get(`/axios_live_search?keyWord=${keyword}`).then(res => {
        let result = res.data
        console.log(result)
          $('#clinicAccordion').empty()
        $.each(result, function(index, val) {
          let state = ''
          if(index == 0) {
            state = 'show'
          } else {
            state = ''
          }
          $('#clinicAccordion').append('<div class="accordion-item">' +
            '<h2 class="accordion-header" id="heading' + index + '">' +
              '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' + index + '" aria-expanded="true" aria-controls="collapseOne"><strong>' + val.clinicName + '</strong>' +
              '</button>' +
            '</h2>' +
            '<div id="collapse-' + index + '" class="accordion-collapse collapse '+ state + '" aria-labelledby="heading' + index + '" data-bs-parent="#clinicAccordion">' +
              '<div class="accordion-body">' +
                  '<h1>ETO YUNG BODY!</h1>' +
                  '<button class="btn btn-success">Book an Appointment</button>' +
              '</div>' +
            '</div>' +
          '</div>')
        })
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
