<?php

        function database(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "micro_classificacao";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Conexão falhou: ".$conn->connect_error);
            }
            echo $conn;
            return $conn;
        }

