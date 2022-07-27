<html>
    <head>
        <meta charset="utf-8">
        <title>Tabela do Campeonato Brasileiro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="style.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <?php
        $curDate = date('Y');

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://localhost/apifut/api.php?Comando=Classificacao&Ano='.$curDate.'&Campeonato=30',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $array = json_decode($response, true);
    ?>

    <body>
        <div class="container-fluid" id="cabecalho">
            Brasileirão Série A
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
                        <a href="#">CLASSIFICAÇÂO</a>
                    </li>
                    <li>
                        <a href="#">ESTATISTICAS</a>
                    </li>
                    <li>
                        <a href="#">JOGADORES</a>
                    </li>  
                </nav>              
            </div>
        </div>
        <div class="container">
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
                    <td class="cinco">Últimas Cinco</td>
                </tr>
                <?php $o = 1; $f = 1; foreach($array as $value){
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
                        <td style="background-color: <?php echo $color;?>;"></td>
                        <td><?php echo $o++; ?></td>
                        <td> <img src="<?php echo $value['brasao']; ?>"> </td>
                        <td><?php echo $value['nome']; ?></td>
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
                                if($valor == 'Vitoria'){
                                    ?> <img src="<?php echo '../imagens/VIT.svg'; ?>"> <?php
                                }elseif($valor == 'Derrota'){
                                    ?> <img src="<?php echo '../imagens/DER.svg'; ?>"> <?php
                                }elseif($valor == 'Empate'){
                                    ?> <img src="<?php echo '../imagens/E.svg'; ?>"> <?php
                                }
                            }
                        ?></td>
                    </tr>
                <?php } ?>
            </table>
            <div class="container">
                            
            </div>
        </div>
    </body>
</html>