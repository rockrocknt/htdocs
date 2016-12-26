/**
* @author dhsign
* @copyright Copyright (c) 2015 dhsign
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

    "use strict";
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
          ['Country', 'Share'],
          ['Bulgaria', 0.8],
          ['Ireland', 1.2],
          ['Romania', 1.3],
          ['Hungary', 3.0],
          ['Netherlands', 2.4],
          ['Cyprus', 2.4],
          ['Luxembourg', 2.8],
          ['United Kingdom', 4.3],
          ['United States', 0.6],
          ['Belgium', 3.6],
          ['Poland', 3.4],
          ['Lithuania', 5.4],
          ['Greece', 3.7],
          ['Denmark', 6.1],
          ['Germany', 5.9],
          ['Portugal', 5.8],
          ['Slovenia', 6.3],
          ['Spain', 5.9],
          ['Finland', 7.4],
          ['Italy', 8.7],
          ['Slovakia', 9.0],
          ['Latvia', 9.4],
          ['Czech Republic', 10.5],
          ['Estonia', 12.5],
          ['Sweden', 14.1],
          ['Austria', 19.7],
          ['France', 3.1],
          ['Argentina', 3],
          ['Australia', 2.9],
          ['Egypt', 2.2],
          ['Turkey', 1.6],
          ['Mexico', 1.5],
          ['Canada', 1],
          ['Brazil', 0.7],
          ['China', 0.3],
          ['India', 0.4],
          ['RU', 0.02]
        ]);

        var options = {region: 'world',
        displayMode: 'regions',
        colorAxis: {colors: ['#69bd43']}
    };
        var chart = new google.visualization.GeoChart(document.getElementById('world_share'));
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
    };
