<?php
$db = new PDO("mysql:host=localhost;dbname=esercizio20", "root", "");

$squadre = $db->query("UPDATE Squadra SET punti = 0");

$partite = $db->query("SELECT * FROM Partita");
$partite = $partite->fetchAll(PDO::FETCH_OBJ);

foreach ($partite as $partita) {
  if ($partita->gool_squadraDiCasa > $partita->gool_squadraOspite)
    $db->query("UPDATE Squadra SET punti = punti + 3 WHERE ID = " . $partita->ID_squadraDiCasa);
  else if ($partita->gool_squadraDiCasa < $partita->gool_squadraOspite)
    $db->query("UPDATE Squadra SET punti = punti + 3 WHERE ID = " . $partita->ID_squadraOspite);
  else {
    $db->query("UPDATE Squadra SET punti = punti + 1 WHERE ID = " . $partita->ID_squadraDiCasa);
    $db->query("UPDATE Squadra SET punti = punti + 1 WHERE ID = " . $partita->ID_squadraOspite);
  }
}

$squadre = $db->query("SELECT * FROM Squadra");
$squadre = $squadre->fetchAll(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
  <a href="./index.php">Home</a>
  <div class="card mx-auto w-50 position-absolute top-50 start-50 translate-middle">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Squadra</th>
            <th scope="col">Punti</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($squadre as $squadra) {
            echo '
          <tr>
            <td>' . $squadra->nome . '</td>
            <td>' . $squadra->punti . '</td>
          </tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>