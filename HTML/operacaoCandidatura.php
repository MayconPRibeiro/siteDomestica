<?php
    namespace siteDomestica\HTML;

    require_once("../PHP/domestica/Conexao.php");
    require_once("../PHP/domestica/Consultar.php");

    use siteDomestica\PHP\domestica\Conexao;
    use siteDomestica\PHP\domestica\Consultar;
    

    $conexao = new Conexao();
    $conexao->conectar();
    $conNome = new Consultar();
    $nome = $conNome->consultarNome($conexao, 'domestica', $_COOKIE['user']);
    $telefone = $conNome->consultarTelefone($conexao, 'domestica', $_COOKIE['user']);

    
    
    if(isset($_POST['linha'])){

        try {
            $conexao = new Conexao();
            $conn   = $conexao->conectar();           
            $codigoVaga = $_POST['linha'];
            if($nome != "Não Encontrado!" || $telefone != "Não Encontrado!"){
                $sql2    = "insert into candidatura (codigoCandidatura, codigoVaga, nome, telefone) values ('', '$codigoVaga', '$nome', '$telefone')";
                $result2 = mysqli_query($conn,$sql2);
                if($result2){
                    echo "Resgistrado";
                } else {
                    echo "Não registrado";
                }
            }else{
                echo "Não encontrado!";
            }
            
        } catch(Except $erro) {
            echo $erro;
        }
    }
?>