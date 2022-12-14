<html>
    <head>
        <meta charset="utf-8">
        <title>Tabela do Campeonato Brasileiro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link href="style.css" rel="stylesheet">
    </head>

    <?php
        date_default_timezone_set('America/Sao_Paulo');
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
    ?>

    <body>
        <div class="container-fluid" id="cabecalho">
            Brasileir??o S??rie A
            <br> <br> <br>
            <div class="container" id="nav">
                <nav class="navbar navbar-light" style="background-color: #10502f;">
                    <li>
                        <a href="#">PARTIDAS</a>
                    </li>
                    <li>
                        <a href="#">NOTICIAS</a>
                    </li>
                    <li>
                        <a href="#">CLASSIFICA????O</a>
                    </li>
                    <li>
                        <a href="#">ESTAT??STICAS</a>
                    </li>
                    <li>
                        <a href="#">JOGADORES</a>
                    </li>  
                </nav>              
            </div>
        </div>
        <div class="container">
            <div class="tabela">
                <br>
                <table>
                    <tr>
                        <td class="color_div" ></td>
                        <td class="tabela"></td>
                        <td class="tabela"></td>
                        <td class="clube" >Clube</td>
                        <td class="tabela">Pts</td>
                        <td class="tabela">PJ</td>
                        <td class="tabela">VIT</td>
                        <td class="tabela">E</td>
                        <td class="tabela">DER</td>
                        <td class="tabela">GP</td>
                        <td class="tabela">GC</td>
                        <td class="tabela">SG</td>
                        <td class="tabela">??ltimas Cinco</td>
                    </tr>
                    <?php $o = 1; $f = 1; 
                        foreach($array as $value){
                        if($o >= '1' && $o <= '4'){
                            $color = '#5883ca';
                        }elseif($o == '5'){
                            $color = '#ee7e29';
                        }elseif($o == '6'){
                            $color = '#ee7e29';
                        }elseif($o >= '7' && $o <= '12'){
                            $color = '#3da359';
                        }elseif($o >= '17' && $o <= '20'){
                            $color = '#db483d';
                        }else{
                            $color = '#ffffff';
                        }
                        ?>
                        <tr>
                            <td class="color_div" style="background-color: <?php echo $color;?>;"></td>
                            <td><?php echo $o++; ?></td>
                            <td> <img src="<?php echo $value['brasao']; ?>"> </td>
                            <td> <a style="color: black;" href="<?php echo $url.'/views/jogo.php?Time='.$value['id']; ?>"><?php echo $value['nome']; ?></a></td>
                            <td><?php echo $value['Pts']; ?></td>
                            <td><?php echo $value['PJ']; ?></td>
                            <td><?php echo $value['VIT']; ?></td>
                            <td><?php echo $value['E']; ?></td>
                            <td><?php echo $value['DER']; ?></td>
                            <td><?php echo $value['GP']; ?></td>
                            <td><?php echo $value['GC']; ?></td>
                            <td><?php echo $value['SG']; ?></td>
                            <td><?php
                                foreach($value['Jogos'] as $valor){
                                    if($valor == 'V'){
                                        ?> <img src="<?php echo '../imagens/VIT.svg'; ?>"> <?php
                                    }elseif($valor == 'D'){
                                        ?> <img src="<?php echo '../imagens/DER.svg'; ?>"> <?php
                                    }elseif($valor == 'E'){
                                        ?> <img src="<?php echo '../imagens/E.svg'; ?>"> <?php
                                    }
                                }
                            ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <br><br>
        </div>
        <div id="banana">
            <br>
            <div class="container" id="Rodape">
                <div id="classi">
                    <div class="negrito">Qualifica????o/Rebaixamento</div>
                    <div> Fase de grupos da Copa Libertadores </div>
                    <div> Qualificat??rias da Copa Libertadores</div>
                    <div> Fase de grupos da Copa Sul-Americana</div>
                    <div> Rebaixamento</div>            
                </div>
                <div id="ultiCinco">
                    <div class="negrito">Cinco Ultimas Partidas</div>
                    <div> <img src="<?php echo '../imagens/VIT.svg'; ?>" alt=""> Vitoria</div>
                    <div> <img src="<?php echo '../imagens/E.svg'; ?>" alt=""> Empate</div>
                    <div> <img src="<?php echo '../imagens/DER.svg'; ?>" alt=""> Derrota</div>
                </div>
            </div>
            <br>
        </div>
    </body>
</html>