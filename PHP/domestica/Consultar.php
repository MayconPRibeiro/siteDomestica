<?php

    namespace siteDomestica\PHP\domestica;

    require_once("Conexao.php");

    use siteDomestica\PHP\domestica\Conexao;

    class Consultar{

        public function ConsultarMeusDados(Conexao $conexao, string $nomeDaTabela, string $cpf){

            try{
                $conn = $conexao->Conectar();
                $sql = "select * from $nomeDaTabela where cpf = '$cpf'";
                $result = mysqli_query($conn, $sql);

                while ($dados = mysqli_fetch_Array($result)){
                    if($dados['cpf'] == $cpf){
                        echo "<br>Cpf: ".$dados["cpf"].
                        "<br>Nome: ".$dados["nome"].
                        "<br>Data de Nascimento: ".$dados["dataDeNascimento"].
                        "<br>Rua: ".$dados["rua"].
                        "<br>Bairro: ".$dados["bairro"].
                        "<br>Cidade: ".$dados["cidade"].
                        "<br>Número: ".$dados["numero"].
                        "<br>Email: ".$dados["email"].
                        "<br>Telefone: ".$dados["telefone"].
                        "<br>Avaliação: ".$dados["avaliacao"];
                        return;
                    }//Fim if
                }//Fim while
            }catch(Except $erro){
                echo $erro;
            }//Fim try catch
        }//Fim Function


        public function consultarVagas(Conexao $conexao){

            try{

                $conn = $conexao->Conectar();
                $sql = "select * from anuncios";
                $result = mysqli_query($conn,$sql);

                while ($dados = mysqli_fetch_Array($result)){
                    echo "<br><br>Título: ".$dados["titulo"].
                    "<br>Descrição: ".$dados["descricao"].
                    "<br>Valor R$".$dados["valor"].
                    "<br>Cidade: ".$dados["cidade"].
                    "<br>Logradouro: ".$dados["logradouro"].
                    "<br>Bairro: ".$dados["bairro"].
                    "<br>Número: ".$dados["numero"].
                    "<br>Publicado em: ".$dados["dataPublicacao"]."<br><br>";
                }//Fim while FAZER REPLACE CARAIO



                mysqli_close($conn);

            }catch(Except $erro){
                echo $erro;
            }//Fim try catch

        }//Fim function consultarVagas








    }//Fim da classe





?>