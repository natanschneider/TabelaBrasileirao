<?php
    date_default_timezone_set('America/Sao_Paulo');
    class select_date{
        function select($nome){
            $curDate = date('Y-m-d');
            $db = new DB();
            $conBD = $db->ConectarBanco();

            $sql = "SELECT data FROM classificacao WHERE data = '".$curDate."' AND clube = '".$nome."';";

            $res = mysqli_query($conBD, $sql);
            $count_row = mysqli_num_rows($res);

            if($count_row >= 1){
                return false;
            }else{
                return true;
            }
        }
    }