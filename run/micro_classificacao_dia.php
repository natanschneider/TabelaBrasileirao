<?php
    date_default_timezone_set('America/Sao_Paulo');
    include("connection.php");
    include("select_date.php");
    include("log.php");

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

    $db = new DB();
    $conDB = $db-> ConectarBanco();

    for($p = 0; $p <= 19; $p++){
        $nome = $array[$p]['nome'];
        (int)$pts = $array[$p]['Pts'];
        (int)$pj = $array[$p]['PJ'];
        (int)$vit = $array[$p]['VIT'];
        (int)$e = $array[$p]['E'];
        (int)$der = $array[$p]['DER'];
        (int)$gp = $array[$p]['GP'];
        (int)$gc = $array[$p]['GC'];
        (int)$sg = $array[$p]['SG'];
        $ult1 = $array[$p]['Jogos'][0];
        $ult2 = $array[$p]['Jogos'][1];
        $ult3 = $array[$p]['Jogos'][2];
        $ult4 = $array[$p]['Jogos'][3];
        $ult5 = $array[$p]['Jogos'][4];

        $objData = new select_date();
        $resultData = $objData->select($nome);

        if($resultData === true) {
            $sqlInsert = "INSERT INTO classificacao (clube, pts, pj, vit, e, der, gp, gc, sg, ult1, ult2, ult3, ult4, ult5, teste) VALUES ('" . $nome . "', " . $pts . ", " . $pj . ", " . $vit . ", " . $e . ", " . $der . ", " . $gp . ", " . $gc . ", " . $sg . ", '" . $ult1 . "', '" . $ult2 . "', '" . $ult3 . "', '" . $ult4 . "', '" . $ult5 . "', 'Inserido');";
            $var = mysqli_query($conDB, $sqlInsert);
            if($p == 19){
                echo 'Inserido com sucesso';
            }
        }elseif($resultData === false){
            $sqlUpdate = "UPDATE classificacao SET clube='".$nome."', pts=".$pts.", pj=".$pj.", vit=".$vit.", e=".$e.", der=".$der.", gp=".$gp.", gc=".$gc.", sg=".$sg.", `data`=current_timestamp(), ult1='".$ult1."', ult2='".$ult2."', ult3='".$ult3."', ult4='".$ult4."', ult5='".$ult5."', teste='Atualizado' WHERE clube='".$nome."' AND data='".$curDate."';";
            $var = mysqli_query($conDB, $sqlUpdate);
            if($p == 19){
                echo 'Atualizado com sucesso';
            }
        }
    }

    $objLog = new log();
    $resultLog = $objLog->create();

    echo $resultLog;