<?php
    namespace siteDomestica\HTML;
    require_once("../PHP/domestica/Conexao.php");
    use siteDomestica\PHP\domestica\Conexao;

    $conexao = new Conexao();
    $conn   = $conexao->conectar();
    $sql    = "select * from anuncio";
    $sql2   = "select * from candidatura";
    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de anúncios</title>
    <link rel="stylesheet" href="../css/styleVerAnuncios.css">
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

        <form id="formularioExcluir">
            <label for="exluir">Informe o código da vaga</label>
            <input type="int" name="exluir" id="excluir">

            <input type="submit" name="excluir">
        </form>


        <div class="card">
            <?php
                while($dados = mysqli_fetch_Array($result)) {
            ?>
            <div class="titulos">
                <h2><?php echo $dados['cod']; ?></h2>
                <h2><?php echo $dados['titulo']; ?></h2>
            </div>
            <div class="tabela">
                <?php
                    while($dados2 = mysqli_fetch_Array($result2)) {
                ?>
                <table style="width:100%">
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                    </tr>
                    <tr>
                        <td><?php echo $dados2['nome']; ?></td>
                        <td><?php echo $dados2['telefone']; ?></td>
                    </tr>
                </table>
                <?php
                    }
                ?>
            </div>
            <?php
                }
            ?>
        </div>
    </body>
</html>