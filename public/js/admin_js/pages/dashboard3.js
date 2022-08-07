$(function () {
  // alert('dfd')
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  $.ajax({
    type: 'get',
    url: '/admin/get-daily-visit-count',
    data: {
    },
    success: function(response) {
        console.log(response)
        var $salesChart = $('#sales-chart')
        // var array = [response.hourCount];
        // var day = new Date();
        // console.log(day)
        // $("#total_sales").text('Rs.' + response.total_sales)
            // firstMonth = firstMonth-1
        var $salesChart = new Chart($salesChart, {
            type: 'line',
            data: {
                labels: [response.last_day6,response.last_day5,response.last_day4,response.last_day3,response.last_day2,response.last_day1,response.current_day],
                datasets: [{
                        backgroundColor: '#007BFF',
                        borderColor: '#007BFF',
                        data: [response.lastday5,response.lastday1,response.lastday2,response.lastday3,response.lastday4,response.yestdaday,response.today]
                    },
             
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        // display: false,
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                if (value >= 1000) {
                                    value /= 1000
                                    value += 'k'
                                }
                                return '' + value
                            }
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        })
    }
});

  // var $salesChart = $('#sales-chart')
  // var salesChart  = new Chart($salesChart, {
  //   type   : 'bar',
  //   data   : {
  //     labels  : _ydata,
  //     datasets: [
  //       {
  //         backgroundColor: '#007bff',
  //         borderColor    : '#007bff',
  //         data           : _xdata,
  //       },
  //     ]
  //   },
  //   options: {
  //     maintainAspectRatio: false,
  //     tooltips           : {
  //       mode     : mode,
  //       intersect: intersect
  //     },
  //     hover              : {
  //       mode     : mode,
  //       intersect: intersect
  //     },
  //     legend             : {
  //       display: false
  //     },
  //     scales             : {
  //       yAxes: [{
  //         // display: false,
  //         gridLines: {
  //           display      : true,
  //           lineWidth    : '4px',
  //           color        : 'rgba(0, 0, 0, .2)',
  //           zeroLineColor: 'transparent'
  //         },
  //         ticks    : $.extend({
  //           beginAtZero: true,

  //           // Include a dollar sign in the ticks
  //           callback: function (value, index, values) {
  //             if (value >= 1000) {
  //               value /= 1000
  //               value += 'k'
  //             }
  //             return '' + value
  //           }
  //         }, ticksStyle)
  //       }],
  //       xAxes: [{
  //         display  : true,
  //         gridLines: {
  //           display: false
  //         },
  //         ticks    : ticksStyle
  //       }]
  //     }
  //   }
  // })

  var $visitorsChart = $('#visitors-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
      datasets: [{
        type                : 'line',
        data                : [100, 120, 170, 167, 180, 177, 160],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : [60, 80, 70, 67, 80, 77, 100],
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })


})
