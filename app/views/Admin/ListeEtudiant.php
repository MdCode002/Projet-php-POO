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
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Liste des étudiants </h2>
        <form action="" method="post">
            <input type="number" placeholder="Chercher un matricule" name="Searchetudiant" id="Searchchambre">

            <select name="filtre" id="filtre">
                <option value="all" selected>Tout</option>
                <option value="loge" <?php if (isset($_POST["filtre"]) && $_POST["filtre"] === "loge") echo "selected"; ?>>Logé</option>
                <option value="nonloge" <?php if (isset($_POST["filtre"]) && $_POST["filtre"] === "nonloge") echo "selected"; ?>>Non logé
                </option>
            </select>
            <input type="submit" id="validefiltre" name="validefiltreEtu" value="Filtrer">
        </form>
        <div>
            <div id="Liste">
                <div id="Lesprenom">
                    <div style="margin: 10px;">Prenoms Noms</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                        <div id="ListeName"><?php echo $etudiant['NomEtudiant']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Matricules</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                        <div id="ListeName"><?php echo $etudiant[0]; ?></div><?php } ?>
                </div>
                <div id="Lesprenom" class="telli">
                    <div style="margin: 10px;">Telephone</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                        <div id="ListeName"><?php echo $etudiant['TelEtudiant']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Classe</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                        <div id="ListeName"><?php echo $etudiant['Classe']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Chambres</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                        <div id="ListeName"><?php if ($etudiant['Chambre'] == 1) {
                                                echo "Pas de chambre";
                                            } else $Chambre->chambreName($etudiant['Chambre'], $connect); ?></div>
                    <?php } ?>

                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Supprimer</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                        <form action="" method="post">
                            <button id="ListeName" name="supprimer" value="<?php echo $etudiant[0]; ?>" onclick="return confirm('Êtes-vous sûr de vouloir Supprimer cette Étudiant  ?')">Supprimer<?php $etudiant[0]; ?></button>
                        </form><?php } ?>

                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Modifier</div>
                    <br>
                    <?php foreach ($Etudiant as $etudiant) { ?>
                        <form action="" method="post">
                            <button id="ListeName" name="modifieretudiant" value="<?php echo $etudiant[0]; ?>">modifier<?php $etudiant[0]; ?></button>
                        </form><?php } ?>
                </div>
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