<!DOCTYPE html>
<html lang="en">
<head>
    <title>Índices <?php echo $ano;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php

//Conexao com o banco
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$banco = "contabilidade";
$conexao = mysql_connect($host, $user, $pass);
mysql_select_db($banco) or die (mysql_error());


function classifica($diferenca, $temAnoAnteriorCadastrado){
    if($temAnoAnteriorCadastrado){
        if ($diferenca > 0) {
            echo "<span class=\"glyphicon glyphicon-chevron-up\" aria-hidden=\"true\"></span> " . $diferenca . "% maior que no ano passado.";
        } elseif ($diferenca < 0) {
            $diferenca = $diferenca * -1;
            echo "<span class=\"glyphicon glyphicon-chevron-down\" aria-hidden=\"true\"></span> " . $diferenca . "% menor que no ano passado.";
        } else {
            echo "<span class=\"glyphicon glyphicon-minus\" aria-hidden=\"true\"></span> " . " Manteve o índice do ano passado.";
        }
    }
}

$sql = mysql_query("select * from indices order by ano desc limit 1;");
$consulta = mysql_fetch_array($sql);

$PCT = $consulta[0];

if(!$PCT){
    echo '<div class="alert alert-danger" role="alert"><b><center>Nenhum dado inserido no sistema!</b> Por favor insira dados no sistema para visualizar os índices.</center></div>';
    exit();
}

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

$sql = mysql_query("select * from indices where ano < ".$ano." order by ano desc limit 1;");
$consulta = mysql_fetch_array($sql);
$PCTant = $consulta[0];
if($PCTant){
    $ENDant = $consulta[1];
    $IPLant = $consulta[2];
    $LGant = $consulta[3];
    $LCant = $consulta[4];
    $LSant = $consulta[5];
    $GAant = $consulta[6];
    $MLant = $consulta[7];
    $RAant = $consulta[8];
    $RPLant = $consulta[10];

    $difPCT = ($PCT/floatval($PCTant))-1;
    $difEND = ($END/floatval($ENDant))-1;
    $difIPL = ($IPL/floatval($IPLant))-1;
    $difLG = ($LG/floatval($LGant))-1;
    $difLC = ($LC/floatval($LCant))-1;
    $difLS = ($LS/floatval($LSant))-1;
    $difGA = ($GA/floatval($GAant))-1;
    $difML = ($ML/floatval($MLant))-1;
    $difRA = ($RA/floatval($RAant))-1;
    $difRPL = ($RPL/floatval($RPLant))-1;

    $difPCT = round($difPCT,4);
    $difEND = round($difEND,4);
    $difIPL = round($difIPL,4);
    $difLC = round($difLC,4);
    $difLG = round($difLG,4);
    $difLS = round($difLS,4);
    $difGA = round($difGA,4);
    $difML = round($difML,4);
    $difRA = round($difRA,4);
    $difRPL = round($difRPL,4);

    $temAnoAnteriorCadastrado = 1;
}else
    $temAnoAnteriorCadastrado = 0;

?>

<body>
<center><h1><b>ÍNDICES <?php echo $ano;?></b></h1></center><br>
<h2><center>ÍNDICES DE ESTRUTURA DE CAPITAL</center></h2><br>
<div class="row">
    <div class="col-md-4">
        <h5><b><center>PARTICIPAÇÃO DE CAPITAL DE TERCEIROS –PCT</center></b></h5>
        <h3><center><?php echo $PCT*100;?>%</center></h3>
        <center><?php echo classifica($difPCT*100,$temAnoAnteriorCadastrado);?></center>
    </div>
    <div class="col-md-4">
        <h5><b><center>COMPOSIÇÃO DO ENDIVIDAMENTO –END</center></b></h5>
        <h3><center><?php echo $END*100;?>%</center></h3>
        <center><?php echo classifica($difEND*100,$temAnoAnteriorCadastrado);?></center>
    </div>
    <div class="col-md-4">
        <h5><b><center>IMOBILIZAÇÃO DO PATRIMÔNIO LÍQUIDO –IPL</center></b></h5>
        <h3><center><?php echo $IPL*100;?>%</center></h3>
        <center><?php echo classifica($difIPL*100,$temAnoAnteriorCadastrado);?></center>
    </div>
</div>
<br>
<h2><center>ÍNDICES DE LIQUIDEZ</center></h2><br>
<div class="row">
    <div class="col-md-4">
        <h5><b><center>LIQUIDEZ GERAL –LG</center></b></h5>
        <h3><center><?php echo $LG?></center></h3>
        <center><?php echo classifica($difLG*100,$temAnoAnteriorCadastrado);?></center>
    </div>
    <div class="col-md-4">
        <h5><b><center>LIQUIDEZ CORRENTE-LC</center></b></h5>
        <h3><center><?php echo $LC;?></center></h3>
        <center><?php echo classifica($difLC*100,$temAnoAnteriorCadastrado);?></center>
    </div>
    <div class="col-md-4">
        <h5><b><center>LIQUIDEZ SECA-LS</center></b></h5>
        <h3><center><?php echo $LS; ?></center></h3>
        <center><?php echo classifica($difLS*100,$temAnoAnteriorCadastrado);?></center>
    </div>
</div>
<br>
<h2><center>ÍNDICES DE RENTABILIDADE</center></h2><br>
<div class="row">
    <div class="col-md-3">
        <h5><b><center>GIRO DO ATIVO –GA</center></b></h5>
        <h3><center><?php echo $GA*100;?>%</center></h3>
        <center><?php echo classifica($difGA*100,$temAnoAnteriorCadastrado);?></center>
    </div>
    <div class="col-md-3">
        <h5><b><center>MARGEM LÍQUIDA -ML</center></b></h5>
        <h3><center><?php echo $ML*100;?>%</center></h3>
        <center><?php echo classifica($difML*100,$temAnoAnteriorCadastrado);?></center>
    </div>
    <div class="col-md-3">
        <h5><b><center>RENTABILIDADE DO ATIVO -RA</center></b></h5>
        <h3><center><?php echo $RA*100;?>%</center></h3>
        <center><?php echo classifica($difRA*100,$temAnoAnteriorCadastrado);?></center>
    </div>
    <div class="col-md-3">
        <h5><b><center>RENTABILIDADE DO PL-RPL</center></b></h5>
        <h3><center><?php echo $RPL*100;?>%</center></h3>
        <center><?php echo classifica($difRPL*100,$temAnoAnteriorCadastrado);?></center>
    </div>
</div>
</body>
</html>