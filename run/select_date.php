<?php
    class select_date{
        function select(){
            $curDate = date('Y-m-d');
            $db = new DB();
            $conBD = $db->ConectarBanco();

            $sql = "SELECT data FROM classificacao WHERE data = '".$curDate."';";

            $res = mysqli_query($conBD, $sql);
            $count_row = mysqli_num_rows($res);

            if($count_row >= 1){
                return false;
            }else{
                return true;
            }
        }
    }