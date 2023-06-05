<!DOCTYPE html>
<html lang="en">
<?php

require('../../Controller/EtudiantController.php')

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/style/style.css">
    <title>Document</title>
</head>

<body>
    <?php include('../../../public/include/navbar.php') ?>
    <div class="continerListeEtudiant">
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Ma chambre</h2>
        <div>
            <div id="Liste" style="flex-direction : column;align-items: center; font-family: 'Lato',sans-serif; top: 50px;">
                <h4 style="margin:10px"><span id="infogray">Nom de votre chambre </span> :
                    <?php echo $chambre['nomChambre']; ?></h4>
                <h4 style="margin:10px"><span id="infogray"> Etage de la chambre</span> :
                    <?php echo $chambre['etageChambre']; ?> </h4>
                <h4 style="margin:10px"><span id="infogray">Superficie de votre Chambre </span>:
                    <?php echo $chambre['Superficie']; ?> m² </h4>
                <h4 style="margin:10px"><span id="infogray"> nombre de locataire </span> :
                    <?php echo $chambre['effectif']; ?>/<?php echo $chambre['effectifMax']; ?> </h4>
                <h4 style="margin:10px"> <span id="infogray">Vos colocataire </span> : </h4>
                <div id="coloc">
                    <div id="Lesprenom">
                        <div style="margin: 10px;">Prenoms Noms</div>
                        <br>
                        <?php foreach ($coloc as $etudiant) { ?>
                            <div id="ListeName" style="background: white;"><?php echo $etudiant['NomEtudiant']; ?></div>
                        <?php } ?>
                    </div>
                    <div id="Lesprenom">
                        <div style="margin: 10px;">Telephone</div>
                        <br>
                        <?php foreach ($coloc as $etudiant) { ?>
                            <div id="ListeName" style="background: white;"><?php echo $etudiant['TelEtudiant']; ?></div>
                        <?php } ?>
                    </div>
                    <div id="Lesprenom">
                        <div style="margin: 10px;">Classe</div>
                        <br>
                        <?php foreach ($coloc as $etudiant) { ?>
                            <div id="ListeName" style="background: white;"><?php echo $etudiant['Classe']; ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include('../../../public/include/Menu.php') ?>
    <script src="../../../public/script/script.js"></script>
</body>


</html>