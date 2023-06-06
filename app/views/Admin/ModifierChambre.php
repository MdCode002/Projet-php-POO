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
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Modifier Chambre </h2>
        <form action="" method="post">
            <div id="continaddroom">
                <div id="updatecontainer">
                    <h3> Nom : </h3> <input type="text" class="modifieroom" placeholder="<?php echo $arrayMChambre[0]["nomChambre"]; ?>" name="MnomChambre">
                </div>
                <div id="updatecontainer">
                    <h3> Superficie en m² : </h3> <input type="number" class="modifieroom" placeholder="<?php echo $arrayMChambre[0]["Superficie"]; ?>" name="Msuperficie">
                </div>
                <div id="updatecontainer">
                    <h3> Etage : </h3> <input type="number" class="modifieroom" placeholder="<?php echo $arrayMChambre[0]["etageChambre"]; ?>" name="Metage">
                </div>
                <div id="updatecontainer">
                    <h3> Nbr max locataire: </h3> <input type="number" class="modifieroom" placeholder="<?php echo $arrayMChambre[0]["effectifMax"]; ?>" name="Mcolocataire">
                </div>
                <h3 style="margin: 10px;">Supprimer locataire de la chambre:</h3>
                <div id="coloc">
                    <div id="Lesprenom">
                        <div style="margin: 10px;">Prenoms Noms</div>
                        <br>
                        <?php foreach ($coloc as $etudiant) { ?>
                            <div id="ListeName" style="background: white;"><?php echo $etudiant['NomEtudiant']; ?></div>
                        <?php } ?>
                    </div>
                    <div id="Lesprenom">
                        <div style="margin: 10px;">Matricule</div>
                        <br>
                        <?php foreach ($coloc as $etudiant) { ?>
                            <div id="ListeName" style="background: white;"><?php echo $etudiant[0]; ?></div>
                        <?php } ?>
                    </div>

                    <div id="Lesprenom">
                        <div style="margin: 10px;">Supprimer</div>
                        <br>
                        <?php foreach ($coloc as $etudiant) { ?>
                            <form action="" method="post">
                                <button id="ListeName" style="background: white;" name="suppEtCha" value="<?php echo $etudiant['0']; ?>">Supprimer</button>
                            <?php } ?>
                            </form>
                    </div>
                </div>

                <div><button type="submit" name="ModifierChambre" class="addbtn">Modifier</button>
                    <button class="addbtn" name="annuler">Retour</button>
                </div>
                <p class="erreur"> <?php if (isset($e)) {
                                        echo $e;
                                    } ?></p>
            </div>
        </form>
    </div>
    </div>
    <div class="hide">
        <div id="hidediv">Merci d'aller sur ordinateur pour voir la liste détailler</div>
    </div>
    <?php include('../../../public/include/MenuAdmin.php') ?>
    <script src="../../../public/script/script.js"></script>
</body>

</html>