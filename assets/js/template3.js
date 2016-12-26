/**
* @author dhsign
* @copyright Copyright (c) 2015 dhsign
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

    "use strict";
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Continent', 'Organic Agricultural Land'],
          ['Oceania',     33],
          ['Europe',      27],
          ['Latin America',  23],
          ['Asia', 7],
          ['Northern America',    7],
          ['Africa',    3],
        ]);

        var options = {
          title: 'Organic Agricultural Land',
          legend: 'true',
          is3D: 'true',
          pieSliceText: '',
          colors:['#69bd43','#6576c2','#cc2149','#ff804e','#008dff', '#a16a2a'],
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
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
