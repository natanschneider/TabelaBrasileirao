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

    $db = include('connection.php');
    $query = mysqli_query($db, "INSERT INTO classificacao (clube, pts, pj, vit, e, der, gp, gc, sg, ultimasCinco, `data`) VALUES('', 0, 0, 0, 0, 0, 0, 0, 0, '', current_timestamp());");
    $var = mysqli_fetch_assoc($query);