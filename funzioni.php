<?php
include("connessione.php");
//////////UPDATEANDAMENTO_NAZIONALE//////////
function updateAndamento_nazionale(){
    global $conn;
    $url = "https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale.json";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    $stmt = $conn->prepare("SELECT * FROM andamento_nazionale");
    $stmt->execute();
    $rows = $stmt->rowCount();
    for($i=$rows;$i<count($risposta);++$i){
        $data=$risposta[$i]->data;
        $ricoverati_con_sintomi=$risposta[$i]->ricoverati_con_sintomi;
        $terapia_intensiva=$risposta[$i]->terapia_intensiva;
        $totale_ospedalizzati=$risposta[$i]->totale_ospedalizzati;
        $isolamento_domiciliare=$risposta[$i]->isolamento_domiciliare;
        $totale_positivi=$risposta[$i]->totale_positivi;
        $variazione_totale_positivi=$risposta[$i]->variazione_totale_positivi;
        $nuovi_positivi=$risposta[$i]->nuovi_positivi;
        $dimessi_guariti=$risposta[$i]->dimessi_guariti;
        $deceduti=$risposta[$i]->deceduti;
        $totale_casi=$risposta[$i]->totale_casi;
        $tamponi=$risposta[$i]->tamponi;
        $stmt = $conn->prepare("INSERT INTO andamento_nazionale (data,ricoverati_con_sintomi,terapia_intensiva,totale_ospedalizzati,isolamento_domiciliare,totale_positivi,variazione_totale_positivi,nuovi_positivi,dimessi_guariti,deceduti,totale_casi,tamponi) VALUES ('$data','$ricoverati_con_sintomi','$terapia_intensiva','$totale_ospedalizzati','$isolamento_domiciliare','$totale_positivi','$variazione_totale_positivi','$nuovi_positivi','$dimessi_guariti','$deceduti','$totale_casi','$tamponi')");
        $stmt->execute();
    }
    echo "Aggiornamento tabella andamento_nazionale completato correttamente";
}
//////////UPDATEANDAMENTO_REGIONALE//////////
function updateAndamento_regionale(){
    global $conn;
    $url = "https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni.json";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    $stmt = $conn->prepare("SELECT * FROM andamento_regionale");
    $stmt->execute();
    $rows = $stmt->rowCount();
    for($i=$rows;$i<count($risposta);++$i){
        $data=$risposta[$i]->data;
        $denominazione_regione=addslashes($risposta[$i]->denominazione_regione);
        $ricoverati_con_sintomi=$risposta[$i]->ricoverati_con_sintomi;
        $terapia_intensiva=$risposta[$i]->terapia_intensiva;
        $totale_ospedalizzati=$risposta[$i]->totale_ospedalizzati;
        $isolamento_domiciliare=$risposta[$i]->isolamento_domiciliare;
        $totale_positivi=$risposta[$i]->totale_positivi;
        $variazione_totale_positivi=$risposta[$i]->variazione_totale_positivi;
        $nuovi_positivi=$risposta[$i]->nuovi_positivi;
        $dimessi_guariti=$risposta[$i]->dimessi_guariti;
        $deceduti=$risposta[$i]->deceduti;
        $totale_casi=$risposta[$i]->totale_casi;
        $tamponi=$risposta[$i]->tamponi;
        $stmt = $conn->prepare("INSERT INTO andamento_regionale (data,denominazione_regione,ricoverati_con_sintomi,terapia_intensiva,totale_ospedalizzati,isolamento_domiciliare,totale_positivi,variazione_totale_positivi,nuovi_positivi,dimessi_guariti,deceduti,totale_casi,tamponi) VALUES ('$data','$denominazione_regione','$ricoverati_con_sintomi','$terapia_intensiva','$totale_ospedalizzati','$isolamento_domiciliare','$totale_positivi','$variazione_totale_positivi','$nuovi_positivi','$dimessi_guariti','$deceduti','$totale_casi','$tamponi')");
        $stmt->execute();
    }
    echo "Aggiornamento tabella andamento_regionale completato correttamente";
}
//////////UPDATEANDAMENTO_PROVINCIALE//////////
function updateAndamento_provinciale(){
    global $conn;
    $url = "https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-province.json";
    $file = file_get_contents($url);
    $risposta = json_decode($file);
    $stmt = $conn->prepare("SELECT * FROM andamento_provinciale");
    $stmt->execute();
    $rows = $stmt->rowCount();
    for($i=$rows;$i<count($risposta);++$i){
        $data=$risposta[$i]->data;
        $denominazione_regione=addslashes($risposta[$i]->denominazione_regione);
        $denominazione_provincia=addslashes($risposta[$i]->denominazione_provincia);
        $totale_casi=$risposta[$i]->totale_casi;
        $stmt = $conn->prepare("INSERT INTO andamento_provinciale (data,denominazione_regione,denominazione_provincia,totale_casi) VALUES ('$data','$denominazione_regione','$denominazione_provincia','$totale_casi')");
        $stmt->execute();
    }
    echo "Aggiornamento tabella andamento_provinciale completato correttamente";
}
?>