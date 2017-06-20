<!DOCTYPE html>

<html lang="pt-BR">
<head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable([
              ['Período', 'GA', 'ML', 'RA', 'RPL'],
              ['2014',  0.37, 0.65, 0.50, 0.6],
              ['2015',  0.30, 0.33, 0.66, 0.5],
              ['2016',  0.25, 0.11, 0.99, 0.7]
          ]);

          var options = {
              title: 'ÍNDICES DE RENTABILIDADE',
              curveType: 'function',
              legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('gaml'));

          chart.draw(data, options);
      }
    </script>
</head>

<body>
  <div id="gaml" style="width: 900px; height: 500px"></div>
</body>

</html>

