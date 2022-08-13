<?php
    class BD{
        public function ConectarBanco(){    
            $con_Bd = mysqli_connect ('localhost','root','','micro_classificacao');
            
            return $con_Bd;
        }
    }