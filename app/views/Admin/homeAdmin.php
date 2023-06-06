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


    <h2 style="margin:20px;">Liste chambres</h2>
    <div id="containroom">
        <?php foreach ($Chambre->Find5Room($connect) as $nomchambre) { ?>
            <div class="room">
                <img src="../../../public/img/lit-double 1.png" alt="" height="50px" id="lit" style="margin: 5px;">
                <p><?php echo $nomchambre['nomChambre']; ?></p>
            </div><?php } ?>
    </div>
    <a href="./ListeChambre.php">
        <div id="Listeroom">
            <img src="../../../public/img/Vector.png" alt="" height="50px" style="margin: 10px;">
            <p>Voire toutes les Chambres</p>
        </div>
    </a>

    <div id="listeEte">
        <h3 style="margin: 10px;">Liste Des etudiant</h3>
        <div id="cointainerListe">
            <div id="Lesprenom">
                <div style="margin: 10px;">Prenoms et Noms</div>
                <?php foreach ($Admin->Find4Stud($connect) as $etudiant) { ?>
                    <div id="prenom"><?php echo $etudiant['NomEtudiant']; ?></div><?php } ?>
            </div>
            <div id="Lesprenom">
                <div style="margin: 10px;">Matricules</div>
                <?php foreach ($Admin->Find4Stud($connect) as $etudiant) { ?>
                    <div id="matricule"><?php echo $etudiant['idEtudiant']; ?></div><?php } ?>
            </div>

            <a href="./ListeEtudiant.php">
                <div id="valideListe">Détails complets</div>
            </a>
        </div>
    </div>
    <div id="listeMess">
        <h3 style="margin: 10px;">Demande de Chambre</h3>
        <div id="cointainerListe">
            <div id="Lesdemanderoom">
                <!-- <h3>Aucune demande de chambre</h3> -->
                <?php foreach ($Admin->Find5DemandChambre($connect) as $etudiant) { ?>
                    <div class="demanderoom">
                        <?php echo $etudiant['NomEtudiant'] . "(" . $etudiant['IdEtudiant'] . ")" . " Demande une chambre"; ?>
                    </div>
                <?php } ?>
            </div>
            <a href="./ListeDemande.php">
                <div id="valideListe">Détails complets</div>
            </a>
        </div>
    </div>
    </div>
    <?php include('../../../public/include/MenuAdmin.php') ?>
    <script src="../../../public/script/script.js"></script>
</body>


</html>