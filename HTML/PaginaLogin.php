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
    <title>Cadastrar</title>
    <link rel="stylesheet" href="../css/styleTelaLogin.css">
</head>
    <body>
        <header id="nav">   
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

        <div id="blocoLogin">

        <h3>Login</h3>
        <br><br>
        <h2>Insira abaixo suas informaçoes para login!</h2>

        <div id="formLoginsenha">
        <form method="POST">
            <br><br><label for="tCpf">  <b>CPF:</b> </label>
                 <input type="text" placeholder="Insira o CPF" name="tCpf" id="tCpf" required />
                 
                 <br><br>
                 <label for="tSenha"> <b>Senha:</b> </label>
                 <input type="password" name="tSenha" id="tSenha" placeholder="Insira sua senha">


                 <br><br>
                 <div class="btnRadio">
                    <input type="radio" checked name="tOpcao" id="tOpcao1" value="domestica">
                    <label for="tOpcao">Sou prestador de Serviço</label>
                    <br>
                    <input type="radio" name="tOpcao" id="tOpcao2" value="cliente">
                    <label for="tOpcao">Sou contratante</label><br>
                 </div> 

                 <br>
                 <a ><input name="submit" value="Entrar" type="submit"></a> 


                 <?php

                if(isset($_POST['submit'])){


                    if($_POST['tCpf'] != "" && $_POST['tSenha'] != ""){
                        $conexao = new Conexao();
                        $conexao->conectar();

                        if($_POST['tOpcao'] == 'domestica'){
                            $entrar = new Consultar();
                            setcookie('user', $_POST['tCpf']);
                            setcookie('tipo', $_POST['tOpcao']);
                            $entrar->logar($conexao, $_POST['tCpf'], $_POST['tSenha']);
                        }else{

                            $entrar = new Consultar();
                            setcookie('user', $_POST['tCpf']);
                            setcookie('tipo', $_POST['tOpcao']);
                            $entrar->logarCliente($conexao, $_POST['tCpf'], $_POST['tSenha']);

                        }//Fim if else
                        
                        

                    }//Fim if
                }//Fim isset


                ?>

           
                </form>
                </div>
            </body>
            </html>