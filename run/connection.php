<?php
    class BD{
        public function ConectarBanco(){
            $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            if($url == 'http://localhost'){ //use esse if para conectar com o MySQL do xampp
                $con_Bd = mysqli_connect ('localhost','root','','micro_classificacao');
            }elseif($url == 'URL da pagina após deploy para hospedagem'){
                $con_Bd = mysqli_connect ('hostname','usuario','senha','database');
            }
            return $con_Bd;
        }
    }