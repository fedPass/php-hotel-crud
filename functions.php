<?php
    function connect_db() {
        //includi il file con le variabili
        include 'config-db.php';
        // Connect
        $conn = new mysqli($servername, $username, $password, $dbname);
        return $conn;
    }

    function esegui_query() {
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

 ?>
