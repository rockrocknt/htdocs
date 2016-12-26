/**
* @author dhsign
* @copyright Copyright (c) 2015 dhsign
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

    "use strict";
      google.load("visualization", "1.1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable
            ([['Year', 'Happy Clients'],
          ['2013',  1000],
          ['2014',  1170],
          ['2015',  1660],
          ['2016',  2030]
        ]);

        var options = {
          title: 'Company Performance over the years',
          legend: { position: 'bottom'},
          colors: ['#f1c40f'],
          pointSize: 25,
          pointShape: { type: 'circle'}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        function resizeHandler () {
        chart.draw(data, options);
    }
    if (window.addEventListener) {
        window.addEventListener('resize', resizeHandler, false);
    }
    else if (window.attachEvent) {
        window.attachEvent('onresize', resizeHandler);
    }
    }
