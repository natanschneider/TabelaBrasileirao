<?php
    class DB{
        public function ConectarBanco(){
            $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            if($url == 'http://localhost'){
                $con_Bd = mysqli_connect ('localhost','root','','micro_classificacao');
            }elseif($url == 'https://tabelabrasileiroseriea.000webhostapp.com'){
                $con_Bd = mysqli_connect ('localhost','id4534567_root','gUm#/3825fgbnae%','id1933750295_micro_classificacao');
            }
            return $con_Bd;
        }
    }