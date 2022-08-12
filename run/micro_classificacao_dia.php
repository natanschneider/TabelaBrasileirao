<?php
    $curDate = date('Y');
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url.'/apifut/api.php?Ano='.$curDate.'&Campeonato=30&Comando=Classificacao',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    $array = json_decode($response, true);

    echo 'Acabei de rodar o CURL <br>';

    $servername = 'localhost';
    $username = 'root';
    $database = 'micro_classificacao';

    foreach($array as $value){
        echo 'Estou no foreach <br>';

        $conn = mysqli_connect($servername, $username, '', $database);
        echo 'Acabei de conectar com o banco <br>';
        $query = mysqli_prepare($conn, "INSERT INTO classificacao (clube, pts, pj, vit, e, der, gp, gc, sg, ultimasCinco) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'noSEI');");
        echo 'Prepared statement <br>';

        $nome = $value['nome'];
        $pts = $value['Pts'];
        $pj = $value['PJ'];
        $vit = $value['VIT'];
        $e = $value['E'];
        $der = $value['DER'];
        $gp = $value['GP'];
        $gc = $value['GC'];
        $sg = $value['SG'];

        echo 'Peguei os dados da Array <br>';

        mysqli_stmt_bind_param($query, $nome, $pts, $pj, $vit, $e, $der, $gp, $gc, $sg);
        echo 'bind_param <br>';
        mysqli_stmt_execute($query);
        echo 'Acabei de executar a query <br>';
        $conn->close();
        echo 'Acabei de fechar o banco <br>';
    }
    echo 'Sai do foreach <br>';