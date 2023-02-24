<?php
    namespace siteDomestica\HTML;
    require_once("../PHP/domestica/Conexao.php");
    use siteDomestica\PHP\domestica\Conexao;
    
    $_COOKIE['vaga'];

    public

    
    
    if(isset($_POST['linha'])){
        try {
            $conexao = new Conexao();
            $conn   = $conexao->conectar();
            $codigoVaga = $_POST['linha'];
            $sql2    = "insert into candidatura (codigoCandidatura, codigoVaga, nome, telefone) values ('', '$codigoVaga', 'PessoaDaVaga', 'NumeroDaPessoa')";
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