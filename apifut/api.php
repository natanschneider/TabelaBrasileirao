<?php
    $ano        = $_GET['Ano'];
    $campeonato = $_GET['Campeonato'];
    $comando    = $_GET['Comando'];

    if($comando == ''){
        echo 'Comando Invalido';
        exit();
    }
    
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://jsuol.com.br/c/monaco/utils/gestor/commons.js?&file=commons.uol.com.br/sistemas/esporte/modalidades/futebol/campeonatos/dados/'.$ano.'/'.$campeonato.'/dados.json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        )
    );
    
    $response = curl_exec($curl);
    curl_close($curl);

    $api = array();
    $api = json_decode($response, true);

    $fase = $api["ordem-fases"][0];

    $pos = 0;

    if($comando == 'Classificacao'){
        $classificacao = $api['fases'][$fase]['classificacao']['grupo']['Único'];
        $equipes = $api['equipes'];
        $pontos = $api['fases'][$fase]['classificacao']['equipe'];

        
        $arrJogos = $api['fases'][$fase]['jogos']['id'];

        $arr = array();
        $o = 0;
        $i = 38;
        
        foreach($classificacao as $key=>$value){
            $arr[$pos]['id'] = $equipes[$value]['id'];
            $arr[$pos]['nome'] = $equipes[$value]['nome-comum'];
            $arr[$pos]['Pts'] = $pontos[$value]['pg']['total'];
            $arr[$pos]['PJ'] = $pontos[$value]['j']['total'];
            $arr[$pos]['VIT'] = $pontos[$value]['v']['total'];
            $arr[$pos]['E'] = $pontos[$value]['e']['total'];
            $arr[$pos]['DER'] = $pontos[$value]['d']['total'];
            $arr[$pos]['GP'] = $pontos[$value]['gp']['total'];
            $arr[$pos]['GC'] = $pontos[$value]['gc']['total'];
            $arr[$pos]['SG'] = $pontos[$value]['sg']['total'];

            $RodadaAtual = $api['fases'][$fase]['rodada']['atual'];
            $numRodadas = ($RodadaAtual - 5);
    
            for($x = $RodadaAtual; $x >= $numRodadas; $x--){
                $idJogos   = $api['fases'][$fase]['jogos']["rodada"][$x];
                foreach($idJogos as $key=>$val){
                    $id_time1 = $arrJogos[$val]['time1'];
                    $id_time2 = $arrJogos[$val]['time2'];
                    (int)$placar1 = $arrJogos[$val]['placar1'];
                    (int)$placar2 = $arrJogos[$val]['placar2'];
                    
                    if($placar1 != null){
                        if((int)$id_time1 == (int)$value){
                            $vit = ($placar1 > $placar2);
                            $der = ($placar1 < $placar2);
                            $e = ($placar1 == $placar2);
                            if($vit === true){
                                $arr[$pos]['Jogos'][] = 'Vitoria';
                            }elseif($der === true){
                                $arr[$pos]['Jogos'][] = 'Derrota';
                            }elseif($e === true){
                                $arr[$pos]['Jogos'][] = 'Empate';
                            }
                            unset($arr[$pos]['Jogos'][5]);
                        }elseif((int)$id_time2 == (int)$value){
                            $vit = ($placar1 < $placar2);
                            $der = ($placar1 > $placar2);
                            $e = ($placar1 == $placar2);
                            if($vit === true){
                                $arr[$pos]['Jogos'][] = 'Vitoria';
                            }elseif($der === true){
                                $arr[$pos]['Jogos'][] = 'Derrota';
                            }elseif($e === true){
                                $arr[$pos]['Jogos'][] = 'Empate';
                            }
                            unset($arr[$pos]['Jogos'][5]);
                        }
                    }
                }
            }
            $arr[$pos++]['brasao'] = $equipes[$value]['brasao'];
        }

        $json = json_encode($arr);
        echo $json;
        exit();

    }else if($comando == 'Equipes'){
        $equipes = $api['equipes'];
        $equipes = json_encode($equipes);
        echo $equipes;
        exit();
        
    }else if($comando == 'Rodada'){
        $idRodada = $_GET['Rodada'];
        $idJogos   = $api['fases'][$fase]['jogos']["rodada"][$idRodada];
        $arrJogos = $api['fases'][$fase]['jogos']['id'];

        $jogos = array();

        foreach($idJogos as $val){
            $time1 = $arrJogos[$val]['time1'];
            $time2 = $arrJogos[$val]['time2'];
            $time1 = $api['equipes'][$time1]['nome-comum'];
            $time2 = $api['equipes'][$time2]['nome-comum'];

            $jogos[$pos]['Data'] = $arrJogos[$val]['data'];
            $jogos[$pos]['Horario'] = $arrJogos[$val]['horario'];
            $jogos[$pos]['Time1'] = $time1;
            $jogos[$pos]['Time2'] = $time2;
            $jogos[$pos]['Placar1'] = $arrJogos[$val]['placar1'];
            $jogos[$pos]['Placar2'] = $arrJogos[$val]['placar2'];
            $jogos[$pos]['Estadio'] = $arrJogos[$val]['estadio'];
            $jogos[$pos++]['URL'] = $arrJogos[$val]['url-posjogo'];
        }
        $json = json_encode($jogos);
        echo $json;
        exit();

    }else if($comando == 'Equipe'){
        $equipe  = $_GET['Time'];
        $equipes = $api['equipes'][$equipe];
        $equipes = json_encode($equipes);
        echo $equipes;
        exit();

    }else if($comando == 'Jogos'){
        $time = $_GET['Time'];
        $arrJogos = $api['fases'][$fase]['jogos']['id'];
        $equipe = $api['equipes'];

        foreach($arrJogos as $value){
            $time1 = $value['time1'];
            $time2 = $value['time2'];

            $jogos['Equipe'] = $equipe[$time]['nome-comum'];
            if($time1 == $time){
                $jogos['jogos'][$pos]['Time1'] = $equipe[$time1]['nome-comum'];
                $jogos['jogos'][$pos]['Time2'] = $equipe[$time2]['nome-comum'];
                $jogos['jogos'][$pos]['placar1'] = $value['placar1'];
                $jogos['jogos'][$pos]['placar2'] = $value['placar2'];
                $jogos['jogos'][$pos]['data'] = $value['data'];
                $jogos['jogos'][$pos]['horario'] = $value['horario'];
                $jogos['jogos'][$pos]['url'] = $value['url-posjogo'];
                $jogos['jogos'][$pos]['Brasao1'] = $equipe[$time1]['brasao'];
                $jogos['jogos'][$pos++]['Brasao2'] = $equipe[$time2]['brasao'];    
            }elseif($time2 == $time){
                $jogos['jogos'][$pos]['Time1'] = $equipe[$time1]['nome-comum'];
                $jogos['jogos'][$pos]['Time2'] = $equipe[$time2]['nome-comum'];
                $jogos['jogos'][$pos]['placar1'] = $value['placar1'];
                $jogos['jogos'][$pos]['placar2'] = $value['placar2'];
                $jogos['jogos'][$pos]['data'] = $value['data'];
                $jogos['jogos'][$pos]['horario'] = $value['horario'];
                $jogos['jogos'][$pos]['url'] = $value['url-posjogo'];
                $jogos['jogos'][$pos]['Brasao1'] = $equipe[$time1]['brasao'];
                $jogos['jogos'][$pos++]['Brasao2'] = $equipe[$time2]['brasao']; 
            }
        }

        $json = json_encode($jogos);
        echo $json;
        exit();

    }else{
        echo 'Comando invalido';
        exit();
    }
?>