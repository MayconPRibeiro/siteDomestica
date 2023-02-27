<?php

namespace siteDomestica\PHP\domestica;

class Conexao{
    
    public function conectar(){
        try{
            $conn = mysqli_connect('faxilover-server.mysql.database.azure.com', 'ipbeeawqyt' , '6BM448405VYANA6A$' ,'site');
            if($conn){
                
                return $conn;
                
            }//fim do if
            echo "<br>Não Entrei!";

        }//fim do try
        catch(Except $erro)
        {
            echo $erro;
        }//fim do catch
    }//fim do conectar

}//fim da classe

?>