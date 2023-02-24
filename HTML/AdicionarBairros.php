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
                <form>
                    <label for="tCidade1">1° Cidade</label>
                    <input type="text" name="tCidade1" id="tCidade1">
    
                    <label for="tCidade2">2° Cidade</label>
                    <input type="text" name="tCidade2" id="tCidade2">
    
                    <label for="tCidade3">3° Cidade</label>
                    <input type="text" name="tCidade3" id="tCidade3">
    
                    <label for="tCidade4">4° Cidade</label>
                    <input type="text" name="tCidade4" id="tCidade4">
    
                    <input type="submit" value="Salvar cidades de interesse">

                    <?php
                        if(isset($_POST['submit'])){
                            $conexao = new Conexao();
                            $cidade  = new Atualizar();

                            echo $cidade-> update($conexao, 
                            $_POST['tCidade1'],
                            $_POST['tCidade2'],
                            $_POST['tCidade3'],
                            $_POST['tCidade4']); 
                        }//fim do isset
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>