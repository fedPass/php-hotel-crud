<?php
//includi il file con le funzioni
include 'functions.php';
// dichiaro la query
$sql = "SELECT id, room_number, floor, beds FROM stanze";
//recupero i dettagli stanze
$result = esegui_query($sql);
//includi la parte con apertura html, head, apertura body
include 'layout/header.php';
 ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 class="mt-3 mb-3">Stanze Hotel</h1>
                </div>
                <div class="col-6 text-right ">
                    <a class="btn btn-info mt-3 mb-3" href="create.php">Crea nuova</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Numero stanza</th>
                              <th scope="col">Piano</th>
                              <th scope="col">Letti</th>
                              <th scope="col" ></th>
                            </tr>
                          </thead>
                          <tbody>
                                <?php
                                  if ($result && $result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()) { ?>
                                <tr>
                                  <td><?php echo $row['room_number']; ?></td>
                                  <td><?php echo $row['floor']; ?></td>
                                  <td><?php echo $row['beds']; ?></td>
                                  <td class="text-right">
                                      <a class="btn btn-info" href="details.php?id=<?php echo $row['id'];?>">Dettagli</a>
                                      <a class="btn btn-warning" href="edit.php?id=<?php echo $row['id'];?>">Modifica</a>
                                      <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>">Elimina</a>
                                  </td>
                                </tr>
                                <?php
                                    }
                                } elseif ($result) { ?>
                                <tr>
                                    <td colspan="4">Non ci sono risultati</td>
                                </tr>
                                <?php } else { ?>
                                    <tr colspan="4">
                                        <td>Si è verificato un errore</td>
                                    </tr>
                                <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include 'layout/footer.php'; ?>
