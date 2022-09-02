<?php
    date_default_timezone_set('America/Sao_Paulo');
    class micro_classificacao{
        function ConectarBanco(){
            $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            if($url == 'http://localhost'){
                $con_Bd = mysqli_connect ('localhost','root','','micro_classificacao');
            }elseif($url == 'https://tabelabrasileiroseriea.000webhostapp.com'){
                $con_Bd = mysqli_connect ('localhost','id45324564237_root','g42Um#/31825f234gbnae%','id1931233750295_mic4ro_classifi3452cacao');
            }
            return $con_Bd;
        }

        function Logger(){
            $curDate = date('Y-m-d');
            $logDate = date('Y_m_d-H_i');

            $arquivo = 'logs/log_'.$logDate.'.txt';
            $file = fopen($arquivo, "w+") or die("Erro ao abrir arquivo.");

            $conDB = $this->ConectarBanco();

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

        function selectDate($nome){
            $curDate = date('Y-m-d');
            $conBD = $this->ConectarBanco();

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