<?php
    class BD{
        public function ConectarBanco(){
            $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

            if($url == 'http://localhost'){ //use esse if para conectar com o MySQL do xampp
                $con_Bd = mysqli_connect ('localhost','root','','micro_classificacao');
            }elseif($url == 'https://tabelabrasileiroseriea.000webhostapp.com'){
                $con_Bd = mysqli_connect ('localhost','id1937342355_root','gUmasdaR#6d6}nae%','id1933423476755_micro_classificacao');
            }

            return $con_Bd;
        }
    }