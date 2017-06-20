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
      data.addColumn('number', 'GA');
      data.addColumn('number', 'ML');

      
      data.addRows([
        [1,  0.37, 0.655],
        [2,  0.3, 0.33],
        [3,  0.25, 0.11],
        [4,  0.11, 0.63],
        [5,  0.11, 0.5],
        [6,   0.8, 0.4],
        [7,   0.7, 0.35],
        [8,  0.12, 0.38],
        [9,  0.16, 0.30],
        [10, 0.12, 0.60],
        [11,  0.5, 0.55],
        [12,  0.6, 0.53],
        [13,  0.4, 0.51],
        [14,  0.4, 0.62]
      ]);

      var options = {
        chart: {
          title: '',
        },
        width: 900,
        height: 300
      };

      var chart = new google.charts.Line(document.getElementById('gaml'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
    </script>
</head>

<body>    
  <div id="gaml" style="width: 900px; height: 500px"></div>
</body>

</html>

