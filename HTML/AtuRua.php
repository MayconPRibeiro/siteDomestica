<?php

    namespace siteDomestica\HTML;

    require_once("../PHP/domestica/Conexao.php");
    require_once("../PHP/domestica/Consultar.php");
    require_once("../PHP/domestica/Atualizar.php");


    use siteDomestica\PHP\domestica\Conexao;
    use siteDomestica\PHP\domestica\Consultar;
    use siteDomestica\PHP\domestica\Atualizar;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/stylePerfilPrestador.css">
</head>
    <body>
        <header id="navegacao">   
            <a href="http://localhost/siteDomestica/Html/PaginaPrincipal.php">   
            <img id="logo" src="../imagens/iconeSite.png" alt="Icone do Site"> 
            </a>
            <nav>
                <ul class="navLink">
                    <li><a href="PaginaCadastrar.php"><b>Cadastre-se</b></a></li>
                    <li><a href="PaginaLogin.php"><b>Login</b></a></li>
                </ul>
            </nav>
        </header>
        <h2>Atualize suas informações!</h2>
        <p>
            Aqui você poderá editar alguns campos.
        </p>


        <div id="formularioPerfil">
            <div id="formularioInterno">
              
                <form method='POST'>                    
    
 
    
                    <label for="tRua">Rua</label>
                    <input type="text" name="tRua" id="tRua" >
                    <input type="submit" name="submit" value="Atualizar Rua">  
    
    
                    <br>
                    

                    <?php


                    if(isset($_POST['submit'])){
                        $conexao = new Conexao();
                        $conexao->conectar();                        
                        $atu = new Atualizar();

                        $atu->AtualizarRua($conexao, $_COOKIE['tipo'], $_COOKIE['user'], $_POST['tRua']);
                    }//Fim
                    

                    ?>

                </form>     

                
            </div>

        </div>

        


    </body>
</html>