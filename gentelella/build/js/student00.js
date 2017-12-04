function init_charts() {
    Chart.defaults.global.defaultFontFamily = '"Libre Franklin", -apple-system, "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif';

    if ($('#bar_processes').length ){ 
        var ctx = document.getElementById("bar_processes");
        var bar_processes = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
            label: 'On Average',
            backgroundColor: "#26B99A",
            data: [51, 30, 40, 28, 92, 50, 45]
            }, {
            label: 'Today',
            backgroundColor: "#03586A",
            data: [41, 56, 25, 48, 72, 34, 12]
            }]
        },

        options: {
            scales: {
            yAxes: [{
                ticks: {
                beginAtZero: true
                }
            }]
            },
            legend: {
                display: false,
                position: 'right',
    labels: {
        fontColor: 'rgb(255, 99, 132)'
    }
    }
        }
        });
    }

    if ($('#doughnut_process').length ){ 
        var ctx = document.getElementById("doughnut_process");
        var data = {
          labels: [
            "Sophomore",
            "Junior",
            "Senior"
          ],
          datasets: [{
            data: [120, 50, 140],
            backgroundColor: [
              "#9B59B6",
              "#BDC3C7",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#B370CF",
              "#CFD4D8",
              "#49A9EA"
            ]

          }]
        };

        var canvasDoughnut = new Chart(ctx, {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: data
        });
       
      } 
    
    if ($('#bar_logins').length ){ 
        var ctx = document.getElementById("bar_logins");
        var bar_logins = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
            label: 'On Average',
            backgroundColor: "#26B99A",
            data: [51, 30, 40, 28, 92, 50, 45]
            }, {
            label: 'Today',
            backgroundColor: "#03586A",
            data: [41, 56, 25, 48, 72, 34, 12]
            }]
        },

        options: {
            scales: {
            yAxes: [{
                ticks: {
                beginAtZero: true
                }
            }]
            },
            legend: {
                display: false,
                position: 'right',
    labels: {
        fontColor: 'rgb(255, 99, 132)'
    }
    }
        }
        });
    }

    if ($('#line_performance').length ){	
        
          var ctx = document.getElementById("line_performance");
          var line_performance = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
              datasets: [{
                label: "My First dataset",
                backgroundColor: "rgba(38, 185, 154, 0.31)",
                borderColor: "rgba(38, 185, 154, 0.7)",
                pointBorderColor: "rgba(38, 185, 154, 0.7)",
                pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointBorderWidth: 1,
                data: [31, 74, 6, 39, 20, 85, 7]
              }, {
                label: "My Second dataset",
                backgroundColor: "rgba(3, 88, 106, 0.3)",
                borderColor: "rgba(3, 88, 106, 0.70)",
                pointBorderColor: "rgba(3, 88, 106, 0.70)",
                pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(151,187,205,1)",
                pointBorderWidth: 1,
                data: [82, 23, 66, 9, 99, 4, 2]
              }]
            },
          });
        
        }

}




$(document).ready(function() {
    init_charts();
});