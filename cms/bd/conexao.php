<?php

    function conexaoMysql(){
        
        $server = (string) "54.173.137.158"; //local de instalação do banco de dados
        $user = (string) "pedro"; //usuario para conexão com o banco de dados
        $password = (string) "bcd127"; //senha para conexão com o banco de dados
        $database = (string) "deliciagelada"; //nome do database

        $conexao = mysqli_connect($server, $user, $password, $database);
        
        return $conexao;
    }
    
?>