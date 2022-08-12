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

    //echo 'Response: '.$response;

    $array = json_decode($response, true);

    require('connection.php');

    $db = new database();
    $query = $db->query("SELECT * FROM classificacao");
    $result = $query->fetch_assoc();

    var_dump($result);

    echo('First: '.$db);

    /*foreach($array as $value){
        $nome = $value['nome'];
        $pts = $value['Pts'];
        $pj = $value['PJ'];
        $vit = $value['VIT'];
        $e = $value['E'];
        $der = $value['DER'];
        $gp = $value['GP'];
        $gc = $value['GC'];
        $sg = $value['SG'];

        $query = $db->query("INSERT INTO classificacao (clube, pts, pj, vit, e, der, gp, gc, sg, ultimasCinco, `data`) 
                    VALUES('".$nome."', ".$pts.", ".$pj.", ".$vit.", ".$e.", ".$der.", ".$gp.", ".$gc.", ".$sg.", '', current_timestamp());");

        $var = $query->fetch_assoc();
    }

    echo('Second: '.$db);
    echo('query->fetch_assoc: '.$var['_msg']);
*/
    $db->close();
