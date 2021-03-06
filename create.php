<?php include 'layout/header.php'; ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3 mb-3">Aggiungi una nuova stanza</h1>
            </div>
            <div class="col-6 text-right ">
                <a class="btn btn-info mt-3 mb-3" href="index.php">Torna alla home</a>
            </div>
        </div>
        <?php if (!empty($_GET['success'])) {?>
            <div class="row">
                <div class="col-6 offset-3">
                    <?php if($_GET['success']== 'true') {?>
                    <div class="alert alert-success" role="alert">Inserita nuova stanza con successo</div>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger" role="alert">Si è verificato un errore :(</div>
        <?php } ?>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-6">
                <!-- form per inviare i dati alla pagina insert.php -->
                <form method="post" action="insert.php">
                  <div class="form-group row">
                    <label for="numero_stanza" class="col-3 col-form-label">Numero stanza</label>
                    <div class="col-9">
                      <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Numero stanza" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="piano" class="col-3 col-form-label">Piano</label>
                    <div class="col-9">
                      <input name="piano" type="text" class="form-control" id="piano" placeholder="Piano" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="letti" class="col-3 col-form-label">Numero letti</label>
                    <div class="col-9">
                      <input name="letti" type="text" class="form-control" id="letti" placeholder="Numero letti" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-3 offset-3">
                      <button type="submit" class="btn btn-info">Conferma</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
</main>
<?php include 'layout/footer.php'; ?>
