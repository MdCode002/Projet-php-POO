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
    <div class="continerListeEtudiant">
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Liste des Chambres </h2>
        <form action="" method="post">
            <input type="number" placeholder="Chercher ID" name="Searchchambre" id="Searchchambre">
            <select name="filtrechambre" id="filtre">
                <option value="tout" selected>Tout</option>
                <option value="complet" <?php if (isset($_POST["filtrechambre"]) && $_POST["filtrechambre"] == "complet") echo "selected"; ?>>
                    Chambres complètes</option>
                <option value="dispo" <?php if (isset($_POST["filtrechambre"]) && $_POST["filtrechambre"] == "dispo") echo "selected"; ?>>
                    Chambres disponibles
                </option>
            </select>
            <input type="submit" id="validefiltre" name="validefiltre" value="Filtrer">
        </form>
        <div>
            <div id="Liste">
                <div id="Lesprenom">
                    <div style="margin: 10px;">Nom Chambre</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                        <div id="ListeName"><?php echo $Chambre['nomChambre']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">ID Chambre</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                        <div id="ListeName"><?php echo $Chambre['idChambre']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Nombre Locataire</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                        <div id="ListeName"><?php echo $Chambre['effectif'] . "/" . $Chambre['effectifMax']; ?></div>
                    <?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Superficie</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                        <div id="ListeName"><?php echo $Chambre['Superficie'] . " m²"; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Supprimer</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                        <form action="" method="post">
                            <button id="ListeName" name="supprimerchambre" value="<?php echo $Chambre[0]; ?>" onclick="return confirm('Êtes-vous sûr de vouloir Supprimer cette Chambre  ?')">Supprimer</button>
                        </form><?php } ?>

                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Modifier</div>
                    <br>
                    <?php foreach ($Leschambres as $Chambre) { ?>
                        <form action="" method="post">
                            <button id="ListeName" name="modifieroom" value="<?php echo $Chambre[0]; ?>">modifier<?php $Chambre[0]; ?></button>
                        </form><?php } ?>
                </div>
            </div>
        </div>
    </div>
    <a href="./AjouterChambre.php">
        <div id="ajouteroom">
            <img src="../../../public/img/Vector.png" alt="" height="35px" style="margin: 10px;">
            <p>Ajouter une Chambre</p>
        </div>
    </a>
    <div class="hide">
        <div id="hidediv">Merci d'aller sur ordinateur pour voir la liste détailler</div>
    </div>
    <?php include('../../../public/include/MenuAdmin.php') ?>
    <script src="../../../public/script/script.js"></script>
</body>


</html>