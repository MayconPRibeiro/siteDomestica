<?php
    namespace siteDomestica\HTML;

    require_once("../PHP/domestica/Conexao.php");
    require_once("../PHP/domestica/Inserir.php");

    use siteDomestica\PHP\domestica\Conexao;
    use siteDomestica\PHP\domestica\Inserir;
?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crie seu anuncio!</title>
        <link rel="stylesheet" href="../css/styleTelaCadastrar.css">
    </head>
        <body>
            <header id="navegacao">   
                <img id="logo" src="../imagens/iconeSite.png" alt="Icone do Site"> 
                <nav>
                    <ul class="navLink">
                        <li><a href="PaginaCadastrar.php"><b>Cadastre-se</b></a></li>
                        <li><a href="PaginaLogin.php"><b>Login</b></a></li>
                    </ul>
                </nav>
            </header>        

            <div id="blocoCadastrar">
                <h3>Crie seu anúncio</h3>      

                <div id="formulario">
                    <form method="POST">
                        <label for="tTitulo">Título:</label>
                        <input type="text" id="tTitulo" name="tTitulo" placeholder="Insira o título do seu anuncio aqui." >
        
                        <label for="tDescricao">Descrição:</label>
                        <input type="text" id="tDescricao" name="tDescricao" placeholder="Descreva o serviço que você precisa.">
                        <br>
                        <p>Informe abaixo o seu endereço:<p>
                        <br>
                        <label for="tLogradouro">Logradouro:</label>
                        <input type="text" name="tLogradouro" id="tLogradouro">
        
                        <label for="tNumero">Numero:</label>
                        <input type="text" name="tNumero" id="tNumero">
        
                        <label for="tBairro">Bairro:</label>
                        <input type="text" name="tBairro" id="tBairro">
        
                        <label for="tCidade">Cidade</label>
                        <input type="text" name="tCidade" id="tCidade"> 

                        <label for="valor">Valor</label>
                        <input type="number" name="valor" id="valor" placeholder="100.00" required>
            
                        <label for="image">Selecione uma imagem</label>
                        <input type="file" name="image"  accept=".png, .jpg" required>
            
                                            
                        <div class="opcoes">  
                            <button type="submit" name="submit" class="botao"> Criar anúncio </button>
                            <a href="PaginaPerfilContratante.php"><button type="button" name="PerfilContratante" class="botao"> Voltar</button></a> 
                                                        
                            </div>
                <?php
                if(isset($_POST['submit'])) {
                    $caminho = "";
                    $conexao = new Conexao();
                    $conexao->conectar();
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

                    $inser->inserirAnuncio($conexao, $_COOKIE['user'], $_POST['tTitulo'], $_POST['tDescricao'], $_POST['tLogradouro'], $_POST['tNumero'], $_POST['tBairro'], $_POST['tCidade'], $_POST['valor'], $caminho);
                    
                } 
            ?>
        </form>
    </body>
</html>