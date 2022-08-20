<?php
    include('connection.php');

    $curDate = date('Y-m-d');
    $logDate = date('Y_m_d-H_i');

    $arquivo = 'logs/log_'.$logDate.'.txt';
    $file = fopen($arquivo, "w+") or die("Erro ao abrir arquivo.");

    fwrite($file, $logDate.PHP_EOL);

    $objDB = new DB();
    $conDB = $objDB->ConectarBanco();

    $query = "SELECT * FROM classificacao WHERE data = '".$curDate."';";
    $result = $conDB->query($query);

    while($row = $result->fetch_array(MYSQLI_NUM)){
        foreach($row as $value){
            fwrite($file, $value.'-');
        }
        fwrite($file, PHP_EOL);
    }
    fclose($file);

    echo 'Log criado com sucesso.';