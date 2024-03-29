# DATABASE UPDATER COVID PLATFORM

Il progetto si occupa di aggiornare il database mysql importando i dati dalla repository ufficiale della protezione civile (https://github.com/pcm-dpc/COVID-19).

Questi dati vengono poi elaborati e mostrati dagli altri due progeti presenti rispettivamente nelle repository apiCovidPlatform e clientCovidPlatform.

## INSTALLAZIONE

Per eseguire correttamente il progetto è necessario avere installata sulla macchina una versione recente di PHP, è inoltre necessario eseguire i seguenti passaggi:

* Modifica del file 'php.ini' presente nella directory di installazione di PHP (rimozione ';' e asegnamento maggiore quantitativo di memoria):
  
  ```ini
  extension=pdo_mysql
  extension=openssl
  memory_limit = 4G
  ```

* Creazione del database mysql adeguato con il seguente codice:

  ```sql
  CREATE TABLE `andamento_nazionale` (
    `data` date NOT NULL,
    `ricoverati_con_sintomi` int DEFAULT NULL,
    `terapia_intensiva` int DEFAULT NULL,
    `totale_ospedalizzati` int DEFAULT NULL,
    `isolamento_domiciliare` int DEFAULT NULL,
    `totale_positivi` int DEFAULT NULL,
    `variazione_totale_positivi` int DEFAULT NULL,
    `nuovi_positivi` int DEFAULT NULL,
    `dimessi_guariti` int DEFAULT NULL,
    `deceduti` int DEFAULT NULL,
    `totale_casi` int DEFAULT NULL,
    `tamponi` int DEFAULT NULL,
    PRIMARY KEY (`data`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

  CREATE TABLE `andamento_regionale` (
    `data` date NOT NULL,
    `denominazione_regione` varchar(45) NOT NULL,
    `ricoverati_con_sintomi` int DEFAULT NULL,
    `terapia_intensiva` int DEFAULT NULL,
    `totale_ospedalizzati` int DEFAULT NULL,
    `isolamento_domiciliare` int DEFAULT NULL,
    `totale_positivi` int DEFAULT NULL,
    `variazione_totale_positivi` int DEFAULT NULL,
    `nuovi_positivi` int DEFAULT NULL,
    `dimessi_guariti` int DEFAULT NULL,
    `deceduti` int DEFAULT NULL,
    `totale_casi` int DEFAULT NULL,
    `tamponi` int DEFAULT NULL,
    PRIMARY KEY (`data`,`denominazione_regione`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

  CREATE TABLE `andamento_provinciale` (
    `data` date NOT NULL,
    `denominazione_regione` varchar(45) NOT NULL,
    `denominazione_provincia` varchar(45) NOT NULL,
    `totale_casi` int DEFAULT NULL,
    PRIMARY KEY (`data`,`denominazione_regione`,`denominazione_provincia`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

  CREATE TABLE `utenti` (
    `user` varchar(45) NOT NULL,
    `password` varchar(45) NOT NULL,
    `tipo` int NOT NULL,
    PRIMARY KEY (`user`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
  ```

* Modifica dei dati di accesso al database all'interno del file 'connessione.php':
  
  ```python
  $servername = "nomeHost";
  $username = "nomeUtente";
  $password = "password";
  $db="nomeDatabase";
  ```

* Esegui il progetto da terminale:

  ```
  php -S localhost:8000
  ```

## UTILIZZO

Una volta avviato il progetto, collegandosi via browser all'indirizzo specificato durante l'esecuzione (localhost:8000),
sara' eseguito automaticamente l'aggiornamento dei dati all'interno del database e verrà visualizata la relativa conferma:

<div align="center">
  <img width="500" alt="Senza titolo" src="https://github.com/scio97/databaseUpdaterCovidPlatform/assets/56976553/7714a86a-bc4d-40aa-8397-6f88581bbde3">
</div>

