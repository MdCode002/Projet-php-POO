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


    </div>
    <div class="Ajouter">
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Ajouter un Admin</h2>
        <form action="" method="post">
            <div id="continaddroom">
                <input type="text" class="addroom" placeholder="Nom de l'Admin" name="addnomadmin" required>
                <input type="number" class="addroom" placeholder="Telephone" name="addteladmin" required>
                <input type="email" class="addroom" placeholder="Email" name="addemailadmin" required>
                <input type="passwoed" class="addroom" placeholder="mots de passe" name="addmspadmin" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Le mot de passe doit comporter au moins 8 caractères, dont au moins une minuscule, une majuscule et un chiffre." required>
                <div style="display:flex;align-items: center;justify-content: space-between; width: 270px;margin-top: 20px;">
                    <button type="submit" name="AjouterAdmin" class="addbtn2" onclick="return confirm('Êtes-vous sûr de vouloir Ajouter cette  Administrateur ?')">Ajouter</button>
                    <a href="./homeAdmin.php">
                        <div id="annulera">Annuler</div>
                    </a>
                </div>
                <br>
                <?php if (isset($e)) {
                    echo "<h4>$e</h4>";
                } ?>

        </form>



    </div>
    </div>

    </div>
    </div>
    <!-- <div class="hide">
        <div id="hidediv">Merci d'aller sur ordinateur pour Ajouter un administrateur</div>
    </div> -->
    <?php include('../../../public/include/MenuAdmin.php') ?>
    <script src="../../../public/script/script.js"></script>
</body>


</html>