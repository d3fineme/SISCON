<?php

//Conexao com o banco
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$banco = "contabilidade";
$conexao = mysql_connect($host, $user, $pass);
mysql_select_db($banco) or die (mysql_error());

function imprimeLQ()
{

    $sql = mysql_query("select * from indices order by ano") or die(mysql_error());
    while ($consulta = mysql_fetch_array($sql)) {
        $LG = $consulta[3];
        $LC = $consulta[4];
        $LS = $consulta[5];
        $ano = $consulta[10];

        echo ",['".$ano."',".($LG).",".($LC).",".($LS)."]";
    }
}
?>


<!DOCTYPE html>

<html lang="pt-BR">
<head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
          var data = google.visualization.arrayToDataTable([
              ['Período', 'LG', 'LC', 'LS']
              <?php imprimeLQ(); ?>
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

