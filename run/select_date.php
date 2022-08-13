<?php
    class select_date{
        public function select(){
            $dataAtual = date('Y-m-d');
            $db = new BD();
            $conBD = $db->ConectarBanco();

            $sql = "SELECT data FROM classificacao WHERE data = '".$dataAtual."';";

            $res = mysqli_query($conBD, $sql);
            $count_row = mysqli_num_rows($res);

            if($count_row >= 1){
                return false;
            }else{
                return true;
            }
        }
    }