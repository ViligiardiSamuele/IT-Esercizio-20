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
          if($exception->getCode() ==   1062){
            echo "1062";
          }
          echo "exception" . $exception->getCode();
        }
        if($result){
          echo "no";
        } else {
          echo "si";
        }
    } else {
        echo 'impossibile inserire una squadra contro se stessa';
        exit;
    }
}
//header('Location: ./index.php');