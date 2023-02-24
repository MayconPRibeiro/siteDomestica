<?php
    namespace siteDomestica\HTML;

    require_once("../PHP/domestica/Conexao.php");
    require_once("../PHP/domestica/Consultar.php");

    use siteDomestica\PHP\domestica\Conexao;
    use siteDomestica\PHP\domestica\Consultar;
    

    $conexao = new Conexao();
    $conexao->conectar();
    $conNome = new Consultar();
    $conNome->consultarNome($conexao, 'domestica', $_COOKIE['user']);
    $conTele = new Consultar();
    $conTele->consultarTelefone($conexao, 'domestica', $_COOKIE['user']);

    
    
    if(isset($_POST['linha'])){

        try {
            $conexao = new Conexao();
            $conn   = $conexao->conectar();           
            $codigoVaga = $_POST['linha'];
            $sql2    = "insert into candidatura (codigoCandidatura, codigoVaga, nome, telefone) values ('', '$codigoVaga', '$conNome', '$conTele')";
            $result2 = mysqli_query($conn,$sql2);
            if($result2){
                echo "Resgistrado";
            } else {
                echo "Não registrado";
            }
        } catch(Except $erro) {
            echo $erro;
        }
    }
?>