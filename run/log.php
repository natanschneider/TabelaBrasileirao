<?php
    class log{
        public function create(){
            include('connection.php');

            $curDate = date('Y-m-d');
            $logDate = date('Y_m_d-H-i');

            $arquivo = 'log_'.$logDate.'.txt';
            $file = fopen($arquivo, 'w+');

            $query = "SELECT * FROM classificacao WHERE data = '".$curDate."';";
            $objDB = new DB();
            $conDB = $objDB->ConectarBanco();

            $result = $conDB->query($query);

            while($row = $result->fetch_array(MYSQLI_NUM)){
                foreach($row as $key=>$value){
                    fwrite($file, $value);
                }
            }
            fclose($file);
        }
    }
