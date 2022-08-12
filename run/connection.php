<?php
    class connection{
        function database(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "micro_classificacao";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
                return $conn;
        }
    }

