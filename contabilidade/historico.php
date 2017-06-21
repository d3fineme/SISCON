<?php

//Conexao com o banco
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$banco = "contabilidade";
$conexao = mysql_connect($host, $user, $pass);
mysql_select_db($banco) or die (mysql_error());

function imprimeDados()
{

    $sql = mysql_query("select * from indices order by ano desc") or die(mysql_error());
    while ($consulta = mysql_fetch_array($sql)) {
        $PCT = $consulta[0];
        $END = $consulta[1];
        $IPL = $consulta[2];
        $LG = $consulta[3];
        $LC = $consulta[4];
        $LS = $consulta[5];
        $GA = $consulta[6];
        $ML = $consulta[7];
        $RA = $consulta[8];
        $RPL = $consulta[9];
        $ano = $consulta[10];

        echo "<tr>";
        echo "<td><center>" . $ano . "</td>";
        echo "<td><center>" . ($PCT * 100) . "%</td>";
        echo "<td><center>" . ($END * 100) . "%</td>";
        echo "<td><center>" . ($IPL * 100) . "%</td>";
        echo "<td><center>" . $LG . "</td>";
        echo "<td><center>" . $LC . "</td>";
        echo "<td><center>" . $LS . "</td>";
        echo "<td><center>" . ($GA * 100) . "%</td>";
        echo "<td><center>" . ($ML * 100) . "%</td>";
        echo "<td><center>" . ($RA * 100) . "%</td>";
        echo "<td><center>" . ($RPL * 100) . "</td>";
        echo "</tr>";

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Remover dados inseridos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h2><center><b>Histórioco dos Índices</b></center></h2><br>
<br>
<table class="table table-striped">
    <thead>
    <tr>
        <th><center><b>ANO</b></center></th>
        <th><center><b>PCT</b></center></th>
        <th><center><b>END</b></center></th>
        <th><center><b>IPL</b></center></th>
        <th><center><b>LG</b></center></th>
        <th><center><b>LC</b></center></th>
        <th><center><b>LS</b></center></th>
        <th><center><b>GA</b></center></th>
        <th><center><b>ML</b></center></th>
        <th><center><b>RA</b></center></th>
        <th><center><b>RPL</b></center></th>
    </tr>
    </thead>
    <tbody>
    <?php imprimeDados(); ?>
    </tbody>
</table>
</body>