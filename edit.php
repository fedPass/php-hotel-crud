<?php
include 'functions.php';
include 'layout/header.php';
//recupero l'id della stanza dal get e recupero i dati per precompilare il form
$sql = "SELECT * FROM stanze WHERE id = ". $_GET['id'];
$result = esegui_query($sql);
 ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3 mb-3">Modifica stanza</h1>
            </div>
            <div class="col-6 text-right ">
                <a class="btn btn-info mt-3 mb-3" href="index.php">Torna alla home</a>
            </div>
        </div>
        <?php if (!empty($_GET['success'])) {?>
            <div class="row">
                <div class="col-6 offset-3">
                    <?php if($_GET['success']== 'true') {?>
                    <div class="alert alert-success" role="alert">Modificati dettagli stanza con successo</div>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger" role="alert">Si è verificato un errore :(</div>
        <?php } ?>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-6">
                <?php if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc(); ?>
                    <form method="post" action="update.php">
                        <!-- input hidden per prendere id -->
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                      <div class="form-group row">
                        <label for="numero_stanza" class="col-3 col-form-label">Numero stanza</label>
                        <div class="col-9">
                          <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Numero stanza" required value="<?php echo $row['room_number'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="piano" class="col-3 col-form-label">Piano</label>
                        <div class="col-9">
                          <input name="piano" type="text" class="form-control" id="piano" placeholder="Piano" required value="<?php echo $row['floor'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="letti" class="col-3 col-form-label">Numero letti</label>
                        <div class="col-9">
                          <input name="letti" type="text" class="form-control" id="letti" placeholder="Numero letti" required value="<?php echo $row['beds'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-3 offset-3">
                          <button type="submit" class="btn btn-info">Modifica</button>
                        </div>
                      </div>
                    </form>
                <?php } elseif ($result) {?>
                <p>Non ci sono risultati inerenti alla tua ricerca</p>
                <?php } else {?>
                <p>Si è verificato un errore</p>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php include 'layout/footer.php'; ?>
