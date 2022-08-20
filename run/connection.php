<?php
    class DB{
        public function ConectarBanco(){
            $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            if($url == 'http://localhost'){
                $con_Bd = mysqli_connect ('localhost','root','','micro_classificacao');
            }elseif($url == 'https://tabelabrasileiroseriea.000webhostapp.com'){
                $con_Bd = mysqli_connect ('localhost','id45324564237_root','g42Um#/31825f234gbnae%','id1931233750295_mic4ro_classifi3452cacao');
            }
            return $con_Bd;
        }
    }