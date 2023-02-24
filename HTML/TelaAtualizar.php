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

            <?php

                 $conexao = new Conexao();
                 $conexao->conectar();
                 $consul = new Consultar();
                                  

            ?>                
                <form method='POST'>                    
    
                    <label for="tTelefone">Telefone</label>
                    <input type="text" name="tTelefone" id="tTelefone" value="<?php $consul->ConsultarTelefone($conexao, 'cliente', $_COOKIE['user']); ?>" >
    
                    <label for="tRua">Rua</label>
                    <input type="text" name="tRua" id="tRua" value="<?php $consul->consultarRua($conexao, 'cliente', $_COOKIE['user']); ?>">
    
                    <label for="tNumero">Numero</label>
                    <input type="text" name="tNumero" id="tNumero" value="<?php $consul->consultarNumero($conexao, 'cliente', $_COOKIE['user']); ?>" >
    
                    <label for="tBairro">Bairro</label>
                    <input type="text" name="tBairro" id="tBairro" value="<?php $consul->consultarBairro($conexao, 'cliente', $_COOKIE['user']); ?>" >
    
                    <label for="tCidade">Cidade</label>
                    <input type="text" name="tCidade" id="tCidade" value="<?php $consul->consultarCidade($conexao, 'cliente', $_COOKIE['user']); ?>" >
    
                    <br>
                    <input type="submit" value="Atualizar Informações">  

                </form>     
            </div>

        </div>
    </body>
</html>