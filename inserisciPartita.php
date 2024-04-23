<?php
    $db = new PDO("mysql:host=localhost;dbname=esercizio20", "root", "");
    $squadre = $db->query("select ID, nome from Squadra");
    $squadre = $squadre->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inserisci Partita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <h1 class="text-center">Inserisci una partita</h1>
    <div class="mx-auto w-25 border border-1 border-primary rounded p-2">
        <form action="./raccoltaRisultati.php" method="post">
            <select class="form-select" name="ID_squadraDiCasa">
                <option selected>Squadra in casa</option>
                <?php
                foreach ($squadre as $s) {
                    echo '<option value="' . $s['ID'] . '">' . $s['nome'] . '</option>';
                }
                ?>
            </select>
            <label class="form-label" for="gool_squadraDiCasa">Gool della squadra di casa</label>
            <input class="form-control w-50" type="number" name="gool_squadraDiCasa" id="gool_squadraDiCasa" />
            <br>
            <select class="form-select" name="ID_squadraOspite">
                <option selected>Squadra ospite</option>
                <?php
                foreach ($squadre as $s) {
                    echo '<option value="' . $s['ID'] . '">' . $s['nome'] . '</option>';
                }
                ?>
            </select>
            <label class="form-label" for="gool_squadraOspite">Gool della squadra ospite</label>
            <input class="form-control w-50" type="number" name="gool_squadraOspite" id="gool_squadraOspite"/>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>