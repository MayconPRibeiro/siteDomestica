<?php
    namespace siteDomestica\HTML;

    require_once('../PHP/domestica/Conexao.php');
    require_once('../PHP/domestica/Atualizar.php');

    use siteDomestica\PHP\domestica\Atualizar;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Bairros</title>
    <link rel="stylesheet" href="../css/styleTelaCadastrar.css">
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
        <div id="blocoCadastrar">
            <h3>Selecione as Cidades de interesse</h3>
            <div id="formulario">

                <?php
                    if(isset($_POST['submit'])){
                            $conexao = new Conexao();
                            $cidade  = new Atualizar(); 
                        }//fim do isset
                ?>
                <form>
                    <label for="tCidade1">1° Cidade</label>
                    <input type="text" name="tCidade1" id="tCidade1" value="<?php $cidade->interesse1($conexao, 'domestica', $_COOKIE['tCidade1']); ?>" disabled>
    
                    <label for="tCidade2">2° Cidade</label>
                    <input type="text" name="tCidade2" id="tCidade2" value="<?php $cidade->interesse2($conexao, 'domestica', $_COOKIE['tCidade2']); ?>" disabled>
    
                    <label for="tCidade3">3° Cidade</label>
                    <input type="text" name="tCidade3" id="tCidade3" value="<?php $cidade->interesse3($conexao, 'domestica', $_COOKIE['tCidade3']); ?>" disbaled>
    
                    <label for="tCidade4">4° Cidade</label>
                    <input type="text" name="tCidade4" id="tCidade4" value="<?php $cidade->interesse4($conexao, 'domestica', $_COOKIE['tCidade4']); ?>" disabled>
    
                    <input type="submit" value="Salvar cidades de interesse">

                    <?php
                        if(isset($_POST['submit'])){


                            if($_POST['tCpf'] != "" && $_POST['tSenha'] != ""){
                                $conexao = new Conexao();
                                $conexao->conectar();

                            }//Fim if

                            if($_POST['tOpcao'] == 'domestica'){
                                $entrar = new Consultar();
                                setcookie('user', $_POST['tCpf']);
                                $entrar->logar($conexao, $_POST['tCpf'], $_POST['tSenha']);
                            }//Fim if

                     }//Fim if isset

                    ?>
                </form>
            </div>
        </div>
    </body>
</html>