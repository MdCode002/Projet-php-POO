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
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Profil</h2>
        <div>
            <div id="Liste" style="flex-direction : column;align-items: center; font-family: 'Lato',sans-serif; top: 50px;">
                <h4 style="margin:10px"><span id="infogray">Prenoms et Nom </span> :
                    <?php echo $Chambredeuser['NomEtudiant']; ?></h4>
                <h4 style="margin:10px"><span id="infogray">Matricule</span> :
                    <?php echo $Chambredeuser['IdEtudiant']; ?> </h4>
                <h4 style="margin:10px"><span id="infogray">Telephone</span>:
                    <?php echo $Chambredeuser['TelEtudiant']; ?></h4>
                <h4 style="margin:10px"><span id="infogray">Classe</span> :
                    <?php echo $Chambredeuser['Classe']; ?> </h4>
                <h4 style="margin:10px"><span id="infogray">Email</span> :
                    <?php echo $Chambredeuser['emailEtudiant']; ?> </h4>
                <h4 style="margin:10px"><span id="infogray">Chambre</span> :
                    <?php if ($Chambredeuser['Chambre'] == 1) {
                        echo "Pas de chambre";
                    } else {
                        echo $chambre['nomChambre'];
                    }; ?>
                </h4>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php include('../../../public/include/Menu.php') ?>
    <script src="../../../public/script/script.js"></script>
</body>


</html>