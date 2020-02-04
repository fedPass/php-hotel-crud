<?php
    include 'functions.php';
    //se la post non è vuota e controllo dati
    if (!empty($_POST['id']) {
        //recupero i dati in $_POST
        $id = $_POST['id'];
        //chiamare la query DELETE
        $sql = "DELETE FROM stanze WHERE id = $id";
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
    header('Location: index.php'.$get_message);
 ?>
