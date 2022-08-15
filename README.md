# Tabela Brasileirao Série A

Projeto desenvolvendo utilizando uma API provida pela UOL.
Feito em PHP, HTML e CSS, utilizando XAMPP, para virtualizar o ambiente.
Microserviço feito com PHP e MariaDB. (Para utilizalo, crie um CronJob na hospedajem para rodar 1 vez ao dia.
Script: ../run/micro_classificacao_dia.php || Necessario colocar credenciais da sua DB).

Parâmetros necessários no POSTMAN ou INSOMNIA:

Comando: Classificação / Equipes / Equipe / Rodada / Jogos.

Ano (Ano atual a 2018).

Rodada (Necessário no Comando Rodada).

Equipe (Necessário no Comando: Jogos e Equipe, trata-se de um ID, portanto rode o comando Equipes para visualizar os ID's).

Campeonato: <br>
    Campeonato Brasileiro      30 <br>
    Campeonato Alemão          12 <br>
    Amistosos                  13 <br>
    Campeonato Baiano          28 <br>
    Campeonato Carioca         34 <br>
    Campeonato Cearense        36 <br>
    Copa América               39 <br>
    Copa da Alemanha           41 <br>
    Copa da França             42 <br>
    Copa da Inglaterra         43 <br>
    Copa da Itália             44 <br>
    Copa do Brasil             48 <br>
    Copa do Nordeste           55 <br>
    Copa do Rei                56 <br>
    Copa São Paulo de Jr       58 <br>
    Copa Sul-Americana         59 <br>
    Eliminatória Sul-Americana 68 <br>
    Campeonato Espanhol        72 <br>
    Eurocopa                   74 <br>
    Campeonato Francês         76 <br>
    Campeonato Gaúcho          77 <br>
    Campeonato Inglês          79 <br>
    Campeonato Italiano        81 <br>
    Copa Libertadores          82 <br>
    Liga dos Campeões da UEFA  83 <br>
    Liga Europa                84 <br>
    Campeonato Mineiro         86 <br>
    Mundial de Clubes          87 <br>
    Campeonato Paranaense      103 <br>
    Campeonato Paulista        104 <br>
    Camp. Paulista Série A-2   105 <br>
    Campeonato Pernambucano    107 <br>
    Recopa Sul-Americana       110 <br>
    Camp. Brasileiro - Série B 112 <br>
    Camp. Brasileiro - Série C 113 <br>
    Camp. Brasileiro - Série D 114 <br>
    Supercopa da Espanha       117 <br>
    Supercopa da Europa        118 <br>
    Supercopa da Inglaterra    119 <br>
    Supercopa da Itália        120 <br>

OBS: Fique atento na porta utilizada pelo XAMPP, talvez seja necessario mudar as URL's diretamente no código.

Microsserviço: Rode 1 vez ao dia utilizando a função de Cron da sua hospedagem, o arquivo: "../run/micro_classificacao_dia.php";
Fique atento as informações do seu banco de dados no arquivo "../run/connection.php";
