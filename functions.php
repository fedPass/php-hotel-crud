<?php
    function connect_db() {
        //includi il file con le variabili
        include 'config-db.php';
        // Connect
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn && $conn->connect_error) {
            echo ("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connection established";
        }
    }

 ?>
