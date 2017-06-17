<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calculo dos Índices</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php

//Conexao com o banco
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$banco = "contabilidade";
$conexao = mysql_connect($host, $user, $pass);
mysql_select_db($banco) or die (mysql_error());

$nome_arquivo = $_FILES["file"]["tmp_name"];

//$nome_arquivo = "teste.csv";
$objeto = fopen($nome_arquivo,'r');

$i = 0;

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

while (($dados = fgetcsv($objeto, 1000, ';'))!==FALSE){

    if(!$i){

        $ativo_total = $dados[0];
        $imobilizado = $dados[1];
        $ativo_circulante = $dados[2];
        $disponiveis = $dados[5];
        $passivo_total = $dados[6];
        $passivo_circulante = $dados[7];
        $PL = $dados[9];
        $vendas = $dados[10];
        $lucro_liquido = $dados[11];
        $ano = $dados[12];
        if (($ativo_total != "Ativo Total") || ($imobilizado != "Imobilizado") || ($ativo_circulante != "Ativo Circulante") || ($disponiveis != "Disponiveis") || ($passivo_total != "Passivo Total") || ($passivo_circulante != "Passivo Circulante") || ($PL != "PL") || ($vendas != "Vendas ") || ($lucro_liquido != "Lucro Liquido") || ($ano != "ANO")) {

            echo '<div class="alert alert-danger" role="alert"><b><center>O padrão no CSV inserido encontra-se diferente do padrão esperado.</b> Por favor certifique-se que os dados se encontram no modelo solicitado.</center></div>';
            exit();
        }
    }

    if($i==1){
        $ativo_total = str_replace(',', '.', str_replace('.', '', $dados[0]));
        $imobilizado = str_replace(',', '.', str_replace('.', '', $dados[1]));
        $ativo_circulante = str_replace(',', '.', str_replace('.', '', $dados[2]));
        $ativo_nao_circulante = str_replace(',', '.', str_replace('.', '', $dados[3]));
        $ativo_real_lp = str_replace(',', '.', str_replace('.', '', $dados[4]));
        $disponiveis = str_replace(',', '.', str_replace('.', '', $dados[5]));
        $passivo_total = str_replace(',', '.', str_replace('.', '', $dados[6]));
        $passivo_circulante = str_replace(',', '.', str_replace('.', '', $dados[7]));
        $passivo_nao_circulante = str_replace(',', '.', str_replace('.', '', $dados[8]));
        $PL = str_replace(',', '.', str_replace('.', '', $dados[9]));
        $vendas = str_replace(',', '.', str_replace('.', '', $dados[10]));
        $lucro_liquido = str_replace(',', '.', str_replace('.', '', $dados[11]));
        $ano = $dados[12];

        $sql = mysql_query("SELECT EXISTS (Select ano_dado from dadosempresa where ano_dado = '$ano')");
        $row = mysql_num_rows($sql);
        $consulta = mysql_fetch_array($sql);
        $ano_cadastrado = $consulta[0];

        if ((!$ativo_total)||(!$imobilizado)||(!$ativo_circulante)||(!$ativo_nao_circulante)||(!$ativo_real_lp)||(!$disponiveis)||(!$passivo_total)||(!$passivo_circulante)||(!$passivo_nao_circulante)||(!$PL)||(!$vendas)||(!$lucro_liquido)||(!$ano)) {
            echo '<div class="alert alert-danger" role="alert"><b><center>Existem colunas com valores nulos! Todas as colunas precisam de um valor!</center></b></div>';
            exit();
        }else{

            if ($ano_cadastrado){
                echo '<div class="alert alert-danger" role="alert"><b><center>Já existe dados cadastrados para o ano '.$ano.'!</b> Por favor cadastre um novo ano ou remova o ano de '.$ano.' e reinsira os dados.</center></div>';
                exit();
            }

            $sql = "INSERT INTO dadosempresa VALUES ('$ativo_total','$imobilizado','$ativo_circulante','$ativo_nao_circulante', '$ativo_real_lp','$disponiveis', '$passivo_total', '$passivo_circulante', '$passivo_nao_circulante', '$PL ', '$vendas', '$lucro_liquido','$ano' )";
            mysql_query($sql) or die (mysql_error());

            $PCT = (floatval($passivo_circulante)+floatval($passivo_nao_circulante))/floatval($PL);
            $END = floatval($passivo_circulante)/(floatval($passivo_circulante)+floatval($passivo_nao_circulante));
            $IPL = floatval($imobilizado)/floatval($PL);
            $LC = floatval($ativo_circulante)/floatval($passivo_circulante);
            $LG = (floatval($ativo_real_lp)+floatval($ativo_circulante))/(floatval($passivo_circulante)+floatval($passivo_nao_circulante));
            $LS = floatval($disponiveis)/floatval($passivo_circulante);
            $GA = floatval($vendas)/floatval($ativo_total);
            $ML= floatval($lucro_liquido)/floatval($vendas);
            $RA = floatval($lucro_liquido)/floatval($ativo_total);
            //Calculo RPL
            $sql = mysql_query("select pl from dadosempresa where ano_dado < ".$ano." order by ano_dado desc limit 1;");
            $consulta = mysql_fetch_array($sql);
            $PLanterior = $consulta[0];
            if($PLanterior) {
                $RPL = floatval($lucro_liquido)/((floatval($PLanterior) + floatval($PL)) / 2);
            }
            else {
                $RPL = floatval($lucro_liquido)/floatval($PL);
            }

            $PCT = round($PCT,4);
            $END = round($END,4);
            $IPL = round($IPL,4);
            $LC = round($LC,4);
            $LG = round($LG,4);
            $LS = round($LS,4);
            $GA = round($GA,4);
            $ML = round($ML,4);
            $RA = round($RA,4);
            $RPL = round($RPL,4);

            $sql = "INSERT INTO indices VALUES ('$PCT', '$END', '$IPL', '$LG', '$LC', '$LS', '$GA', '$ML', '$RA', '$RPL', '$ano')";
            mysql_query($sql) or die (mysql_error());

            echo '<div class="alert alert-success" role="alert"><b><center>Arquivo inserido com Sucesso! </b>Veja o cálculo dos índices com o arquivo inserido.<center</div></div>';
        }
    }
    if($i>1){
        break;
    }
    $i++;
}
    fclose($objeto);

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