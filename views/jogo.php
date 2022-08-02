<html>
    <head>
        <meta charset="UTF-8">
        <title>Jogos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style_jogo.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <?php
            $curYear = date('Y');
            $time = $_GET['Time'];
            $pos = 0;

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://localhost/apifut/api.php?Comando=Jogos&Ano='.$curYear.'&Campeonato=30&Time='.$time,
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
            
            $array = json_decode($response, true);
        ?>

    <body>
        <div class="container-fluid" id="cabecalho">
            <?php echo $array['Equipe']; ?>
            <br> <br> <br>
            <div class="container" id="nav">
                <nav id="nav" class="navbar navbar-light" style="background-color: #10502f;">
                    <li>
                        <a href="#">PARTIDAS</a>
                    </li>
                    <li>
                        <a href="#">NOTICIAS</a>
                    </li>
                    <li>
                        <a href="index.php">CLASSIFICAÇÃO</a>
                    </li>
                    <li>
                        <a href="#">ESTATÍSTICAS</a>
                    </li>
                    <li>
                        <a href="#">JOGADORES</a>
                    </li>
                </nav>
            </div>
        </div>
        <div class="container" id="corpo">
            <?php foreach($array['jogos'] as $value){
            ?>
                <div class="jogo">
                    <div class="times">
                        <img src="<?php echo $value['Brasao1']; ?>">
                        <?php echo $value['Time1']; ?>
                        <?php echo $value['placar1']; ?>
                        <br>
                        <img src="<?php echo $value['Brasao2']; ?>">
                        <?php echo $value['Time2']; ?>
                        <?php echo $value['placar2']; ?>
                    </div>
                    <div class="data">
                        <?php if($value['data'] == ''){
                            echo 'A Confirmar!';
                        }else{
                            echo $value['data'];
                            echo '<br>';
                            echo $value['horario']; 
                        }?>
                    </div>
                </div>
                <br><br>
            <?php } ?>
        </div>
        <div class="container">
            <h6>Todos os horários estão no: Horário de Brasilia.</h6>
        </div>
    </body>
</html>