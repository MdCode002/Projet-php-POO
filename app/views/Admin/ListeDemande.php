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
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Liste demande de Chambres</h2>
        <div>
            <div id="Liste">
                <div id="Lesprenom">
                    <div style="margin: 10px;">Prenoms Noms</div>
                    <br>
                    <?php foreach ($Admin->Find5DemandChambre($connect) as $etudiant) { ?>
                        <div id="ListeName"><?php echo $etudiant['NomEtudiant']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Matricules</div>
                    <br>
                    <?php foreach ($Admin->Find5DemandChambre($connect) as $etudiant) { ?>
                        <div id="ListeName"><?php echo $etudiant[0]; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Telephone</div>
                    <br>
                    <?php foreach ($Admin->Find5DemandChambre($connect) as $etudiant) { ?>
                        <div id="ListeName"><?php echo $etudiant['TelEtudiant']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;">Classe</div>
                    <br>
                    <?php foreach ($Admin->Find5DemandChambre($connect) as $etudiant) { ?>
                        <div id="ListeName"><?php echo $etudiant['Classe']; ?></div><?php } ?>
                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Accepter</div>
                    <br>
                    <?php foreach ($Admin->Find5DemandChambre($connect) as $etudiant) { ?>
                        <form action="" method="post">
                            <a href="./AccorderChambre.php"><button id="ListeName" name="Accepterdemande" value="<?php echo $etudiant[0]; ?>">Accepter</button></a>
                        </form><?php } ?>

                </div>
                <div id="Lesprenom">
                    <div style="margin: 10px;"> Rejeter</div>
                    <br>
                    <?php foreach ($Admin->Find5DemandChambre($connect) as $etudiant) { ?>
                        <form action="" method="post">
                            <button onclick="return confirm('Êtes-vous sûr de vouloir rejeter cette demande  ?')" id="ListeName" name="rejeter" value="<?php echo $etudiant[0]; ?>">Rejeter</button>
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