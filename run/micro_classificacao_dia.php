<?php
    include("connection.php");
    include("select_date.php");

    $curYear = date('Y');
    $curDate = date('Y-m-d');

    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url.'/apifut/api.php?Ano='.$curYear.'&Campeonato=30&Comando=Classificacao',
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

    $db = new BD();
    $conDB = $db-> ConectarBanco();

    $objData = new select_date();
    $resultData = $objData->select();

    if($resultData === true){
        for($p = 0; $p <= 20; $p++){
            $nome = $array[$p]['nome'];
            (int)$pts = $array[$p]['Pts'];
            (int)$pj = $array[$p]['PJ'];
            (int)$vit = $array[$p]['VIT'];
            (int)$e = $array[$p]['E'];
            (int)$der = $array[$p]['DER'];
            (int)$gp = $array[$p]['GP'];
            (int)$gc = $array[$p]['GC'];
            (int)$sg = $array[$p]['SG'];
            $cincoUltimas = 'todo';

            $sqlInsert = "INSERT INTO classificacao (clube, pts, pj, vit, e, der, gp, gc, sg, ultimasCinco) VALUES ('".$nome."', ".$pts.", ".$pj.", ".$vit.", ".$e.", ".$der.", ".$gp.", ".$gc.", ".$sg.", '".$cincoUltimas."');";
            $var = mysqli_query($conDB, $sqlInsert);
        }
        echo 'Pronto!';
        exit();
    }else{
        echo 'Data ja inclusa';
        exit();
    }