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
      data.addColumn('number', 'PCT');
      data.addColumn('number', 'END');
      data.addColumn('number', 'IPL');
      
      data.addRows([
        [1,  0.37, 0.65, 0.5],
        [2,  0.3, 0.33, 0.66],
        [3,  0.25, 0.11, 0.99],
        [4,  0.11, 0.63, 0.89],
        [5,  0.11, 0.5, 0.80],
        [6,   0.8, 0.4, 0.7],
        [7,   0.7, 0.35, 0.65],
        [8,  0.12, 0.38, 0.63],
        [9,  0.16, 0.30, 0.60],
        [10, 0.12, 0.60, 0.30],
        [11,  0.5, 0.55, 0.40],
        [12,  0.6, 0.53, 0.55],
        [13,  0.4, 0.51, 0.64],
        [14,  0.4, 0.62, 0.74]
      ]);

      var options = {
        chart: {
          title: '',
        },
        width: 900,
        height: 300
      };

      var chart = new google.charts.Line(document.getElementById('ipl'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
    </script>
</head>

<body>    
  <div id="ipl" style="width: 900px; height: 500px"></div>
</body>

</html>

