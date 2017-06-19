<?php
//Conexao com o banco
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "";
$banco = "contabilidade";
$conexao = mysql_connect($host, $user, $pass);
mysql_select_db($banco) or die (mysql_error());

if (isset($_GET['id'])){
    $ano = $_GET['id'];
    $query = "delete from dadosempresa where ano_dado = '$ano'; ";
    mysql_query($query) or die(mysql_error());
    $query = "delete from indices where ANO = '$ano';";
    mysql_query($query) or die (mysql_error());

    header("Location: remover_dados.php");
}

function imprimeDados(){

    $query = "SELECT ano_dado FROM dadosempresa order by ano_dado";
    $sql = mysql_query($query) or die(mysql_error());
    $row = mysql_num_rows($sql);
    if($row){
        while ($linha = mysql_fetch_array($sql)) {
            $ano = $linha['ano_dado'];
            echo "<tr>";
            echo     '<th scope="row"></th>';
            echo     "<td><center>".$ano."</td>";
        echo     '<td><center><button type="button" class="btn btn-danger" onclick ="return validar('.$ano.');">Remover Dado</button></center></td>';
            echo  "</tr>";

        }
    }else{
        echo '<div class="alert alert-danger" role="alert"><b><center>Nenhum dado inserido no sistema!</b></center></div>';
        exit();
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
    <script language="JavaScript">
        function validar($ano){
            if ( confirm("Tem certeza que deseja remover?") ){
                window.location = 'remover_dados.php?id='+$ano;
            }
            else{
                window.close();
            }
        }

    </script>
</head>
<body>
<h2><center><b>Remover Dados</b></center></h2><br>
<br>
<table class="table table-striped">
    <thead>
    <tr>
        <th></th>
        <th><center><b>ANO</b></center></th>
        <th><center><b>AÇÃO</b></center></th>
    </tr>
    </thead>
    <tbody>
    <?php imprimeDados(); ?>
    </tbody>
</table>
</body>

