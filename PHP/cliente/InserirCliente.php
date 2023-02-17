<?php
    namespace siteDomestica\PHP\cliente;
    
    require_once('../PHP/domestica/Conexao.php');

    use siteDomestica\PHP\domestica\Conexao;

    class Inserir{
        
        public function cadastrar(
            Conexao $conexao,
            string $nomeDaTabela, 
            int $cpf,
            string $nome,
            string $rua,
            string $cidade,
            int $numero,
            string $telefone,
            string $dataDeNascimento,
            string $senha,
            string $email)
        {
            try{
                $conn = $conexao->conectar();//Abrindo a conexão com o banco
                $sql  = "insert into $nomeDaTabela(cpf, nome, dataDeNascimento, rua, cidade, numero, telefone, senha, email, avaliacao) 
                values ('$cpf','$nome','$rua', '$cidade', '$numero', '$telefone ', '$dataDeNascimento', '$senha', '$email', '0')";//Escrevi o script
                $result = mysqli_query($conn,$sql);//Executa a ação do script no banco

                mysqli_close($conn);//fechando a conexão com sucesso!
                
                if($result){
                    return "<br><br>Inserido com sucesso!";
                }
                return "<br><br>Não Inserido!";
            }
            catch(Exception $erro){
                echo $erro;
            }//fim do catch

        }//fim do cadastrar
        
    }//fim da classe

?>