<?php
     namespace siteDomestica\HTML;

     require_once("../PHP/domestica/Conexao.php");
     require_once("../PHP/domestica/Consultar.php");

     use siteDomestica\PHP\domestica\Conexao;
     use siteDomestica\PHP\domestica\Consultar;
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços disponíveis!</title>
</head>
<body>

    <form>
    
        <?php

            $conexao = new Conexao();
            $consul = new Consultar();
            return $consul->consultarVagas($conexao);

        ?>

    </form>

        <br><br><a href="PerfilFaxineira.php"><button>Ver Meu Perfil</button></a>


        
</body>
</html>