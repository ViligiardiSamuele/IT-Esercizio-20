<?php
$db = new PDO("mysql:host=localhost;dbname=esercizio20", "root", "");
if (isset($_POST['ID_squadraOspite'])) {
    if($_POST['ID_squadraDiCasa'] != $_POST['ID_squadraOspite']){
        $query = $db->prepare("insert into Partita values (:ID_squadraDiCasa, :ID_squadraOspite, :gool_squadraDiCasa, :gool_squadraOspite)");
        $query->bindParam(":ID_squadraOspite", $_POST['ID_squadraOspite'], PDO::PARAM_INT);
        $query->bindParam(":ID_squadraDiCasa", $_POST['ID_squadraDiCasa'], PDO::PARAM_INT);
        $query->bindParam(":gool_squadraDiCasa", $_POST['gool_squadraDiCasa'], PDO::PARAM_INT);
        $query->bindParam(":gool_squadraOspite", $_POST['gool_squadraOspite'], PDO::PARAM_INT);
        $result = $query->execute();
    } else {
        echo 'impossibile inserire una squadra contro se stessa';
        exit;
    }
}

$squadre = $db->query("select ID, nome from Squadra");
$squadre = $squadre->fetchAll(PDO::FETCH_ASSOC);
//var_dump($squadre);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Inserisci una partita</h1>
    <form action="#" method="post">
        <select class="form-select">
            <option selected>Squadra in casa</option>
            <?php
            foreach ($squadre as $s) {
                echo '<option value="'. $s['ID'] .'">'. $s['nome'] .'</option>';
            }
            ?>
        </select>
        <br>
        <select class="form-select">
            <option selected>Squadra ospite</option>
            <?php
            foreach ($squadre as $s) {
                echo '<option value="'. $s['ID'] .'">'. $s['nome'] .'</option>';
            }
            ?>
        </select>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>