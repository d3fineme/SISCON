<!DOCTYPE html>

<html lang="pt-BR">
<head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable([
              ['Período', 'LG', 'LC', 'LS'],
              ['2014',  0.37, 0.65, 0.50],
              ['2015',  0.30, 0.33, 0.66],
              ['2016',  0.25, 0.11, 0.99]
          ]);

          var options = {
              title: 'ÍNDICES DE LIQUIDEZ',
              curveType: 'function',
              legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('liquidez'));

          chart.draw(data, options);
      }
    </script>
</head>

<body>
  <div id="liquidez" style="width: 900px; height: 500px"></div>
</body>

</html>

