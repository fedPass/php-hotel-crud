<?php
//connessione db
    //includi il file con le variabili
    include 'config-db.php';
    // Connect
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn && $conn->connect_error) {
        echo ("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "SELECT * FROM stanze WHERE id = ". $_GET['id'];
        $result = $conn->query($sql);
        $conn->close();
        //recupero dettagli della stanza
        //visualizzo i dettagli
    }
//includi la parte con apertura html, head, apertura body
include 'layout/header.php';
 ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3 mb-3">Dettaglio stanza</h1>
            </div>
            <div class="col-6 text-right ">
                <a class="btn btn-info mt-3 mb-3" href="index.php">Torna alla home</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                  if ($result && $result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) { ?>
                          <div id="info-box" class="card text-white bg-info mb-3">
                            <div class="card-header">Stanza: <?php echo $row['id']; ?></div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>Numero Stanza: <?php echo $row['room_number']; ?></li>
                                    <li>Piano: <?php echo $row['floor']; ?></li>
                                    <li>Numero letti: <?php echo $row['beds']; ?></li>
                                    <li>Data creazione: <?php echo $row['created_at']; ?></li>
                                    <li>Data ultima modifica: <?php echo $row['updated_at']; ?></li>
                                </ul>
                            </div>
                          </div>
                <?php }
                } elseif ($result) { ?>
                    <p>Non ci sono risultati</p>
                <?php } else { ?>
                    <p>Si è verificato un errore</p>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
<?php include 'layout/footer.php'; ?>
