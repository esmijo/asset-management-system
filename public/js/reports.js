
if (location.pathname == '/admin-dashboard') {

  $(document).ready( function() {
    loadChart()
  })

  // $('#btn-report').click(loadChart)

  $('#btn-report').on('click',function() {

    loadChart()
  })

  function loadChart(e) {
    //e.preventDefault()
    let gender = $('#gender').val()
    let chart = $('#chart').val()

    axios.get('/generate_report', {
        params: {
            gender: gender,
            chart: chart
        }
    }).then(res => {
        data = res.data
        chartSetup(res.data)
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
                label: 'Number of Tickets per Category',
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