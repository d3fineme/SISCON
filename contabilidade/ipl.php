<!DOCTYPE html>

<html lang="pt-BR">
<head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable([
              ['Período', 'PCT', 'END', 'IPL'],
              ['2014',  37, 65, 50],
              ['2015',  30, 33, 66],
              ['2016',  25, 11, 99]
          ]);

          var options = {
              title: 'ÍNDICES DE ESTRUTURA CAPITAL',
              curveType: 'function',
              legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('ipl'));

          chart.draw(data, options);
      }
    </script>
</head>

<body>
  <div id="ipl" style="width: 900px; height: 500px"></div>
</body>

</html>

