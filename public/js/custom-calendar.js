$(document).ready( function () {

  if(location.pathname.indexOf('/my-appointments') == 0) {

    let patientID = $('#patientID').val()

    axios.get(`/axios_get_patient_appointments?patientID=${patientID}`).then(res => {
      var result = res.data 
      var eventsArray = []

      $.each(result, function(index, val) {
        eventsArray.push({
          title: val.clinic.clinicName,
          start: val.appointmentDate + 'T' + val.appointmentTime,
          url: '#',
          extendedProps: {
            servicesAvailed: val.servicesAvailed,
            fullName: val.patientName,
            appDate: val.appointmentDate,
            appTime: val.appointmentTime,
            totalBill: val.totalAmount,
            clinicName: val.clinic.clinicName,
            clinicPhoto: val.clinic.imagePath,
            appStatus: val.status,
            appID: val.id
          }
        })
      })

      var calendarEl = document.getElementById('calendar-container')
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next',
          center: 'title',
          right: 'dayGridMonth,timeGridDay'
        },
        contentHeight: 580,
        // height: 'auto',
        fixedWeekCount: false,
        events: eventsArray,
        eventClick: function(calEvent, jsEvent, view) {
          var patientName = calEvent.event._def.extendedProps.fullName
          var appointmentDate = calEvent.event._def.extendedProps.appDate
          var appointmentTime = calEvent.event._def.extendedProps.appTime
          var testsAvailed = calEvent.event._def.extendedProps.servicesAvailed
          var totalBill = calEvent.event._def.extendedProps.totalBill
          var clinicName = calEvent.event._def.extendedProps.clinicName
          var clinicPhoto = calEvent.event._def.extendedProps.clinicPhoto
          var appStatus = calEvent.event._def.extendedProps.appStatus
          var appID = calEvent.event._def.extendedProps.appID
          $('.rm-btn').remove()

          $('#downloadAppDetails').attr('data-clinic', clinicName)
          $('#downloadAppDetails').attr('data-date', appointmentDate)
          $('#downloadAppDetails').attr('data-time', appointmentTime)

          $('#patientName').text(patientName)
          $('#appointmentDate').text(appointmentDate)
          $('#appointmentTime').text(appointmentTime)
          $('#testsAvailed').text(testsAvailed)
          $('#totalBill').text(totalBill)
          $('#clinicName').text(clinicName)
          $('#clinicPhoto').attr('src', clinicPhoto)

          if(appStatus == 'Pending') {
            $('#downloadAppDetails').after('<a href="/edit-appointment/' + appID  + '" class="btn btn-warning w-100 rm-btn">Edit</a>' +
            '<button type="button" class="btn btn-danger w-100 rm-btn" id="cancel-app-btn" data-id="'+ appID +'">Cancel</button>')
          } else {
            $('#downloadAppDetails').after('<button class="btn btn-dark w-100 rm-btn">No Actions Allowed</button>')
          }

          $('#appointment-info-modal').modal('show')

          $('#cancel-app-btn').on('click', function() {
            console.log('test')
            $('#cancel-form').attr('action', '/cancel-appointment/' + appID)
            $('#cancelModal').modal('show')
          })
        }
      })
      calendar.render()
    })
  }

  //CLINIC APPOINTMENT CALENDAR
  if(location.pathname.indexOf('/clinic-appointments') == 0) {

    let clinicID = $('#clinicID').val()

    axios.get(`/axios_get_clinic_appointments?clinicID=${clinicID}`).then(res => {
      var result = res.data 
      var eventsArray = []

      $.each(result, function(index, val) {

        console.log(val)
        eventsArray.push({
          title: val.patientName,
          start: val.appointmentDate + 'T' + val.appointmentTime,
          url: '#',
          extendedProps: {
            servicesAvailed: val.servicesAvailed,
            patientName: val.patientName,
            appDate: val.appointmentDate,
            appTime: val.appointmentTime,
            totalBill: val.totalAmount,
            patientPhoto: val.patient.imagePath,
            appStatus: val.status,
            appID: val.id
          }
        })
      })

      var calendarEl = document.getElementById('calendar-container')
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'prev,next',
          center: 'title',
          right: 'dayGridMonth,timeGridDay'
        },
        contentHeight: 580,
        // height: 'auto',
        fixedWeekCount: false,
        events: eventsArray,
        eventClick: function(calEvent, jsEvent, view) {
          var patientName = calEvent.event._def.extendedProps.patientName
          var appointmentDate = calEvent.event._def.extendedProps.appDate
          var appointmentTime = calEvent.event._def.extendedProps.appTime
          var testsAvailed = calEvent.event._def.extendedProps.servicesAvailed
          var totalBill = calEvent.event._def.extendedProps.totalBill
          var patientPhoto = calEvent.event._def.extendedProps.patientPhoto
          var appStatus = calEvent.event._def.extendedProps.appStatus
          var appID = calEvent.event._def.extendedProps.appID
          $('.rm-btn').remove()

          $('#downloadAppDetails').attr('data-clinic', patientName)
          $('#downloadAppDetails').attr('data-date', appointmentDate)
          $('#downloadAppDetails').attr('data-time', appointmentTime)

          $('#patientName').text('Patient Name: ' + patientName)
          $('#appointmentDate').text(appointmentDate)
          $('#appointmentTime').text(appointmentTime)
          $('#testsAvailed').text(testsAvailed)
          $('#totalBill').text(totalBill)
          $('#patientPhoto').attr('src', patientPhoto)

          if(appStatus == 'Pending') {
            $('#downloadAppDetails').after('<button class="btn btn-success w-100"><strong>Complete</strong></button>' +
            '<button type="button" class="btn btn-danger w-100 rm-btn" id="cancel-app-btn" data-id="'+ appID +'">Cancel</button>')
          } else {
            $('#downloadAppDetails').after('<button class="btn btn-dark w-100 rm-btn">No Actions Allowed</button>')
          }

          $('#complete-app-form').attr('action', '/complete-appointment/' + appID)
          $('#appointment-info-modal').modal('show')

          $('#cancel-app-btn').on('click', function() {
            console.log('test')
            $('#cancel-form').attr('action', '/cancel-appointment/' + appID)
            $('#cancelModal').modal('show')
          })
        }
      })
      calendar.render()
    })
  }
})