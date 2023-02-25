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
        <h2>Minhas Informações</h2>
        <p>
            Esta é a sua página. Aqui você pode editar alguns campos.
            Por exemplo, telefone e endereço (caso eles tenham mudado)
        </p>
        <div id="formularioPerfil">
            <div id="formularioInterno">

            <?php

                 $conexao = new Conexao();
                 $conexao->conectar();
                 $consul = new Consultar();               

            ?>
                
                <form method='POST'> 
                    <label for="tNome">Nome</label>
                    <input type="text" id="tNome" name="tNome" value="<?php echo $consul->consultarNome($conexao, 'domestica', $_COOKIE['user']); ?>"  disabled>
    
                    <label for="tData">Data de Nascimento</label>
                    <input type="text" id="tData" name="tData" value="<?php $consul->ConsultarNascimento($conexao, 'domestica', $_COOKIE['user']); ?>" disabled>
    
                    <label for="tTelefone">Telefone</label>
                    <input type="text" name="tTelefone" id="tTelefone" value="<?php echo $consul->ConsultarTelefone($conexao, 'domestica', $_COOKIE['user']); ?>" disabled>
    
                    <label for="tCPF">CPF</label>
                    <input type="text" name="tCPF" id="tCPF" value="<?php $consul->consultarCpf($conexao, 'domestica', $_COOKIE['user']); ?>" disabled>
    
                    <label for="tRua">Rua</label>
                    <input type="text" name="tRua" id="tRua" value="<?php $consul->consultarRua($conexao, 'domestica', $_COOKIE['user']); ?>" disabled>
    
                    <label for="tNumero">Numero</label>
                    <input type="text" name="tNumero" id="tNumero" value="<?php $consul->consultarNumero($conexao, 'domestica', $_COOKIE['user']); ?>" disabled>
    
                    <label for="tBairro">Bairro</label>
                    <input type="text" name="tBairro" id="tBairro" value="<?php $consul->consultarBairro($conexao, 'domestica', $_COOKIE['user']); ?>" disabled>
    
                    <label for="tCidade">Cidade</label>
                    <input type="text" name="tCidade" id="tCidade" value="<?php $consul->consultarCidade($conexao, 'domestica', $_COOKIE['user']); ?>" disabled>
       
                    <br>   
                           
                    <a href="AtuTelefone.php"><button type="button" name="submit" > Atualizar Telefone</button></a>      <a href="AtuRua.php"><button type="button" name="submit" > Atualizar Rua</button></a>                <a href="AtuNumero.php"><button type="button" name="submit" > Atualizar Numero</button></a>          <a href="AtuBairro.php"><button type="button" name="submit" > Atualizar Bairro</button></a>          <a href="AtuCidade.php"><button type="button" name="submit" > Atualizar Cidade</button></a>          

                </form>
                
            </div>
             
            <div id="opcoesBotoes">   
               <a href="AdicionarBairros.php"><button class="botao">Adicionar Bairros de Interesse</button></a>
               <a href="TelaVagas.php"><button class="botao">Procurar Vagas</button></a>
            </div>
        </div>
    </body>
</html>