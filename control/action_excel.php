<?php
    include('../run/functions.php');

    header("Content-Type: application/csv");
    header("Content-Disposition: attachment; filename=tabela_brasileirao.csv");
    header("Pragma: no-cache");

    $curDate = date('Y-m-d');

    $objDB = new micro_classificacao;
    $conDB = $objDB->ConectarBanco();

    $query = "SELECT * FROM classificacao WHERE data = '".$curDate."';";
    $result = $conDB->query($query);

    $fp = fopen('php://output', 'wb');

    $colunas = ['id', 'clube', 'pts', 'pj', 'vit', 'e', 'der', 'gp', 'gc', 'sg', 'data', 'hora', 'ult1', 'ult2', 'ult3', 'ult4', 'ult5'];
    fputcsv($fp, $colunas, "\t");

    $i = 0;
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        fputcsv($fp, array_values($row), "\t");
    }

    fclose($fp);