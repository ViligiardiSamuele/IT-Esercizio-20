<?php
$db = new PDO("mysql:host=localhost;dbname=esercizio20", "root", "");
if (isset($_POST['ID_squadraOspite'])) {
  if ($_POST['ID_squadraDiCasa'] != $_POST['ID_squadraOspite']) {
    $query = $db->prepare("insert into Partita values (:ID_squadraDiCasa, :ID_squadraOspite, :gool_squadraDiCasa, :gool_squadraOspite)");
    $query->bindParam(":ID_squadraOspite", $_POST['ID_squadraOspite'], PDO::PARAM_INT);
    $query->bindParam(":ID_squadraDiCasa", $_POST['ID_squadraDiCasa'], PDO::PARAM_INT);
    $query->bindParam(":gool_squadraDiCasa", $_POST['gool_squadraDiCasa'], PDO::PARAM_INT);
    $query->bindParam(":gool_squadraOspite", $_POST['gool_squadraOspite'], PDO::PARAM_INT);
    try {
      $result = $query->execute();
    } catch (PDOException $exception) {
      if ($exception->getCode() == 23000) {
        $query = $db->prepare("
          UPDATE Partita
          SET gool_squadraDiCasa = :g1, gool_squadraOspite = :g2
          WHERE ID_squadraDiCasa = :ID1 and ID_squadraOspite = :ID2");
        $query->bindParam(":ID1", $_POST['ID_squadraDiCasa'], PDO::PARAM_INT);
        $query->bindParam(":ID2", $_POST['ID_squadraOspite'], PDO::PARAM_INT);
        $query->bindParam(":g1", $_POST['gool_squadraDiCasa'], PDO::PARAM_INT);
        $query->bindParam(":g2", $_POST['gool_squadraOspite'], PDO::PARAM_INT);
        $result = $query->execute();
      }
    }
  }
}
header('Location: ./index.php');