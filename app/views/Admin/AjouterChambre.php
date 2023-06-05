<!DOCTYPE html>
<html lang="en">
<?php

require_once('./../../Controller/AdminContoller.php');


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/style/style.css">
    <link rel="icon" type="image/x-icon" href="../../../public/img/icone.png">

    <title>Document</title>
</head>

<body>

    <?php include('../../../public/include/navbarAdmin.php') ?>


    <div class="Ajouter">
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Ajouter une Chambre </h2>
        <form action="" method="post">
            <div id="continaddroom">
                <input type="text" class="addroom" placeholder="Nom de la Chambre" name="nChambre" required>
                <input type="number" class="addroom" placeholder="Superficie de la Chambre" name="superficie" required>
                <input type="number" class="addroom" placeholder="Etage de la chambre" name="etage" required>
                <input type="number" class="addroom" placeholder="Nombre de colocataire maximum " name="colocataire" required>
                <div style="display:flex;align-items: center;justify-content: space-between; width: 270px;margin-top: 20px;">
                    <button type="submit" name="Ajouter" class="addbtn2" onclick="return confirm('Êtes-vous sûr de vouloir Ajouter cette  Chambre ?')">Ajouter</button>
                    <a href="./ListeChambre.php">
                        <div id="annulera">Annuler</div>
                    </a>
                </div>

        </form>



    </div>
    <p class="erreur"> <?php if (isset($e)) {
                            echo $e;
                        } ?></p>
    </div>

    </div>
    </div>
    <div class="hide">
        <div id="hidediv">Merci d'aller sur ordinateur pour voir la liste détailler</div>
    </div>
    <?php include('../../../public/include/MenuAdmin.php') ?>
    <script src="../../../public/script/script.js"></script>
</body>


</html>