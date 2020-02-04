<?php
    include 'functions.php';
    //se la post non è vuota e controllo dati
    if (!empty($_POST) && !empty($_POST['id']) && controlla_dati_stanza($_POST['numero_stanza'], $_POST['piano'], intval($_POST['letti']))) {
        //recupero i dati in $_POST
        $numero_stanza = intval($_POST['numero_stanza']);
        $piano = intval($_POST['piano']);
        $letti = intval($_POST['letti']);
        $id = intval($_POST['id']);
        //salvare dati in db (chiamare la query UPDATE..SET)
        $sql = "UPDATE stanze SET room_number = $numero_stanza, floor = $piano, beds = $letti, updated_at = NOW() WHERE id = $id";
        // result avrà una sola riga
        $result = esegui_query($sql);
    } else {
        $result = false;
    }
    //se abbiamo un risultato success true
    if ($result) {
        $get_message = '?success=true&id='.$id;
    } else {
        $get_message = '?success=false&id='.$id;
    }
    //redirect
    header('Location: edit.php'.$get_message);
 ?>
