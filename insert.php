<?php
    include 'functions.php';
    //se la post non è vuota e controllo dati
    if (!empty($_POST) && controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['letti']))) {
        //recupero i dati in $_POST
        $numero_stanza = intval($_POST['numero_stanza']);
        $piano = intval($_POST['piano']);
        $letti = intval($_POST['letti']);
        //salvare dati in db (chiamare la query INSERT INTO....)
        $sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at) VALUES ($numero_stanza, $piano, $letti, NOW(), NOW())";
        // result avrà una sola riga
        $result = esegui_query($sql);
    } else {
        $result = false;
    }
    //se abbiamo un risultato success true
    if ($result) {
        $get_message = '?success=true';
    } else {
        $get_message = '?success=false';
    }
    //redirect
    header('Location: create.php'.$get_message);
 ?>
