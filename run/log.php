<?php
    class log{
        function create(){
            $curDate = date('Y-m-d');
            $logDate = date('Y_m_d-H_i');

            $arquivo = 'logs/log_'.$logDate.'.txt';
            $file = fopen($arquivo, "w+") or die("Erro ao abrir arquivo.");

            $objDB = new DB();
            $conDB = $objDB->ConectarBanco();

            $query = "SELECT * FROM classificacao WHERE data = '".$curDate."';";
            $result = $conDB->query($query);

            $i = 0;
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $rows['micro_classificacao'][$i++] = $row;
            }

            fwrite($file, json_encode($rows, JSON_PRETTY_PRINT));
            fclose($file);

            return 'Log criado com sucesso.';
        }
    }