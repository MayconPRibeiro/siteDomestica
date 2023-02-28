<?php

namespace siteDomestica\PHP\domestica;


class Conexao{
    
    public function conectar(){
        try{
            $conn = mysqli_init();
            mysqli_ssl_set($conn,NULL,NULL, "{path to CA cert}", NULL, NULL);
            mysqli_real_connect($conn, "faxilover-server.mysql.database.azure.com", "ipbeeawqyt", "Faxi@lover", "site", 3306, MYSQLI_CLIENT_SSL);

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
