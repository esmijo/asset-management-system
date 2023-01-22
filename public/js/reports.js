
if (location.pathname == '/admin-dashboard') {

  $(document).ready( function() {
    loadChart()
  })

  $('#btn-report').on('click',function() {
    loadChart()
  })

  function loadChart(e) {
    //e.preventDefault()
    let approvalStatus = $('#approvalStatus').find(':selected').val()
    let chart = $('#chart').find(':selected').val()

    axios.get('/generate_report', {
        params: {
            approvalStatus: approvalStatus,
            chart: chart
        }
    }).then(res => {
        data = res.data
        console.log(data)
        chartSetup(data)
    })
  }

  // let repChart = null

  function chartSetup(data) {
    $('#main-chart').remove()
    $('#chartContainer').append('<canvas id="main-chart"></canvas>')

    let source = $('#main-chart')[0]
    let ctx = source.getContext('2d')

    ctx.clearRect(0, 0, source.width, source.height)
    let xValues = new Array()
    let yValues = new Array()
    let fillColor = new Array()
    let bgColor = new Array()
    let chart = $('#chart').val()

    let cStatus = ['Approved', 'Rejected', 'Unverified']

    xValues = cStatus

    let rejected = 0
    let approved = 0
    let unverified = 0

    $.each(data, function(index, val) {
      if(val.verified == 'Approved') {
        approved++
      } else if(val.verified == 'Rejected') {
        rejected++
      } else {
        unverified++
      }

      let tempFill = getRandomColor().replace(')', ', 0.75').replace('rgb', 'rgba')
      let tempBG = tempFill.replace('0.75)', ')').replace('rgba', 'rgb')
      fillColor.push(tempFill)
      bgColor.push(tempBG)
    })

    yValues.push(approved, rejected, unverified)

    console.log(yValues)

    repChart = new Chart(source, {
        type: chart,
        data: {
            labels: xValues,
            datasets: [{	
                label: 'Value',
                data: yValues,
                backgroundColor: fillColor,
                borderColor: bgColor,
                borderWidth: 2,
                minBarThickness:20,
                maxBarThickness: 60,
            }]
        },
        options: {
            devicePixelRatio: 2,
            title: {
                display: true,
                text: 'Ticket Summary'
            },
            animation: {
                duration: 2000
            },
            legend: {
                display: true,
                labels: {
                    fontColor: 'rgb(255, 99, 132)'
                }
            }
        }
    })
  }

  let getRandomColor = function() {
    var r = Math.floor(Math.random() * 255)
    var g = Math.floor(Math.random() * 255)
    var b = Math.floor(Math.random() * 255)
    return "rgb(" + r + "," + g + "," + b + ")"
  }

}


// CLINIC REPORTS
if (location.pathname == '/clinic-reports') {

  $(document).ready( function() {
    loadChart()
  })

  // $('#btn-report').click(loadChart)

  $('#btn-report').on('click',function() {

    loadChart()
  })

  function loadChart(e) {
    //e.preventDefault()
    let chart = $('#chart').val()
    let clinicID = $('#clinicID').val()
    let testsAvailed = $('#testsAvailed').find(':selected').val()

    axios.get('/generate_clinic_report', {
        params: {
            chart: chart,
            clinicID: clinicID,
            testsAvailed: testsAvailed
        }
    }).then(res => {
        data = res.data
        chartSetup(res.data)
    })
  }

  // let repChart = null

  function chartSetup(data) {
    console.log(data)
    $('#main-chart').remove()
    $('#chartContainer').append('<canvas id="main-chart"></canvas>')

    let source = $('#main-chart')[0]
    let ctx = source.getContext('2d')

    ctx.clearRect(0, 0, source.width, source.height)
    let xValues = new Array()
    let yValues = new Array()
    let fillColor = new Array()
    let bgColor = new Array()
    let chart = $('#chart').val()

    $.each(data[0], function(index, test) {
        xValues.push(test.testName)
        let qty = 0;
        $.each(data[1], function(index, appointment) {
          let strCount = appointment.servicesAvailed.toString()
          if (strCount.indexOf(test.testName) >= 0) {
            qty = qty + 1
          }
        })
        yValues.push(qty)

        let tempFill = getRandomColor().replace(')', ', 0.75').replace('rgb', 'rgba')
        let tempBG = tempFill.replace('0.75)', ')').replace('rgba', 'rgb')
        fillColor.push(tempFill)
        bgColor.push(tempBG)
    })

    repChart = new Chart(source, {
        type: chart,
        data: {
            labels: xValues,
            datasets: [{	
                label: 'Number of Appointments',
                data: yValues,
                backgroundColor: fillColor,
                borderColor: bgColor,
                borderWidth: 2,
                minBarThickness:20,
                maxBarThickness: 60,
            }]
        },
        options: {
            devicePixelRatio: 2,
            title: {
                display: true,
                text: 'Ticket Summary'
            },
            animation: {
                duration: 2000
            },
            legend: {
                display: true,
                labels: {
                    fontColor: 'rgb(255, 99, 132)'
                }
            }
        }
    })
  }

  let getRandomColor = function() {
    var r = Math.floor(Math.random() * 255)
    var g = Math.floor(Math.random() * 255)
    var b = Math.floor(Math.random() * 255)
    return "rgb(" + r + "," + g + "," + b + ")"
  }

}