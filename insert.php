<?php include 'layout/header.php'; ?>
<main>
<?php
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    //recupero i dati in $_POST
    $numero_stanza = intval($_POST['numero_stanza']);
    $piano = intval($_POST['piano']);
    $letti = intval($_POST['letti']);

    //salvare dati in db (chiamare la query INSERT INTO....)
    include 'functions.php';
    $sql = "INSERT INTO stanze (room_number, floor, beds, created_at, updated_at) VALUES ($numero_stanza, $piano, $letti, NOW(), NOW())";
    $result = esegui_query($sql);
    //visualizzare un messaggio di conferma

 ?>
</main>
<?php include 'layout/footer.php'; ?>
