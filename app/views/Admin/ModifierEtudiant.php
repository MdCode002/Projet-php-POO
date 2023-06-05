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
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Modifier l'etudiant </h2>
        <form action="" method="post">
            <div id="continaddroom">
                <div id="updatecontainer">
                    <h3> Prenom Nom : </h3> <input type="text" class="modifieroom" placeholder="<?php echo $etudiantdeuser["NomEtudiant"]; ?>" name="MnomEtudiant">
                </div>
                <div id="updatecontainer">
                    <h3> Matricule : </h3> <input type="text" class="modifieroom" placeholder="<?php echo $etudiantdeuser["IdEtudiant"]; ?>" name="Mmatricule">

                </div>
                <div id="updatecontainer">
                    <h3> Telephone : </h3> <input type="text" class="modifieroom" placeholder="<?php echo $etudiantdeuser["TelEtudiant"]; ?>" name="MTel">
                </div>
                <div id="updatecontainer">
                    <h3> classe : </h3> <input type="text" class="modifieroom" placeholder="<?php echo $etudiantdeuser["Classe"]; ?>" name="MClasse">
                </div>
                <div id="updatecontainer">
                    <h3> email : </h3> <input type="text" class="modifieroom" placeholder="<?php echo $etudiantdeuser["emailEtudiant"]; ?>" name="MEmail">
                </div>


                <div style="display:flex;align-items: center;justify-content: space-between; width: 270px;margin-top: 20px;">
                    <button type="submit" name="ModifierEtudiant" class="addbtn2">Ajouter</button>
                    <a href="./ListeEtudiant.php">
                        <div id="annulera">Annuler</div>
                    </a>
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