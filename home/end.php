<!DOCTYPE html>

<html lang="pt-BR">
<head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Período');
      data.addColumn('number', '');
      
      data.addRows([
        [1,  0.37],
        [2,  0.3],
        [3,  0.25],
        [4,  0.11],
        [5,  0.11],
        [6,   0.8],
        [7,   0.7],
        [8,  0.12],
        [9,  0.16],
        [10, 0.12],
        [11,  0.5],
        [12,  0.6],
        [13,  0.4],
        [14,  0.4]
      ]);

      var options = {
        chart: {
          title: 'END',
        },
        width: 390,
        height: 200
      };

      var chart = new google.charts.Line(document.getElementById('end'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
    </script>
</head>

<body>    
  <div id="end" style="width: 900px; height: 500px"></div>
</body>

</html>

