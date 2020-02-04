<?php
    function connect_db() {
        //includi il file con le variabili
        include 'config-db.php';
        // Connect
        $conn = new mysqli($servername, $username, $password, $dbname);
        return $conn;
    }

    function esegui_query($query) {
        //richiamo con la funzione la creazione della connessione direttamente con la query
        $conn = connect_db();
        // Check connection
        if ($conn && $conn->connect_error) {
            return null;
        } else {
            $result = $conn->query($query);
            $conn->close();
            return $result;
        }
    }

    function controlla_dati_stanza($numero_stanza, $piano, $letti) {
        if(
            !empty($numero_stanza) &&
            !empty($piano) &&
            !empty($letti) &&
            is_numeric($numero_stanza) &&
            is_numeric($piano) &&
            is_numeric($letti) &&
            intval($numero_stanza) > 0 &&
            intval($piano) > 0 &&
            intval($letti) > 0
        ) {
            return true;
        } else {
            return false;
        }
    }

 ?>
