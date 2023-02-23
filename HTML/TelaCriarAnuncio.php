<?php
    namespace siteDomestica\HTML;

    require_once("../PHP/domestica/Conexao.php");
    require_once("../PHP/domestica/Inserir.php");

    use siteDomestica\PHP\domestica\Conexao;
    use siteDomestica\PHP\domestica\Inserir;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Anúncio</title>
    <link rel="stylesheet" href="../css/styleCriarAnuncio.css">
</head>
    <body>
        <header id="navegacao">   
            <a href="http://localhost/siteDomestica/Html/PaginaPrincipal.php">   
            <img id="logo" src="../imagens/iconeSite.png" alt="Icone do Site"> 
            </a>
            <nav>
                <ul class="navLink">
                    <li><a href="PaginaCadastar.php"><b>Cadastre-se</b></a></li>
                    <li><a href="PaginaLogin.php"><b>Login</b></a></li>
                </ul>
            </nav>
        </header>

        <form id="CadastrarAnuncio" method="POST" enctype="multipart/form-data">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" required>

            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" required>

            <label for="logradouro">Rua</label>
            <input type="text" name="logradouro" id="logradouro" required>

            <label for="numero">Número</label>
            <input type="number" name="numero" id="numero" required>

            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="bairro" required>

            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="cidade" required>

            <label for="valor">Valor</label>
            <input type="number" name="valor" id="valor" placeholder="100.00" required>

            <label for="image">Selecione uma imagem</label>
            <input type="file" name="image"  accept=".png, .jpg" required>

            <button type=submit name="submit">Criar Anúncio</button>

            <?php
                if(isset($_POST['submit'])) {
                    $caminho = "";
                    $conexao = new Conexao();
                    $inser  = new Inserir();

                    $nome       = $_FILES['image']['name'];
                    $tmp        = $_FILES['image']['tmp_name'];
                    $tamanho    = $_FILES['image']['size'];
                    $errors     = $_FILES['image']['error'];

                    $imagemTipo = explode('.', $nome);
                    $imagemTipoNew = strtolower(end($imagemTipo));

                    if($errors === 0) {
                        if($tamanho < 4000000) {
                            $novoNome = uniqid('', true).".".$imagemTipoNew;
                            $caminho = 'uploads/'.$novoNome;
                            move_uploaded_file($tmp, $caminho);
                        } else {
                            echo "Imagem grande demais!";
                        }
                    } else {
                        echo "Houve um erro!";
                    }
                    echo $inser->inserirAnuncio($conexao, '123456789', $_POST['titulo'], $_POST['descricao'], $_POST['logradouro'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'], $_POST['valor'], $caminho);
                } 
            ?>
        </form>
    </body>
</html>