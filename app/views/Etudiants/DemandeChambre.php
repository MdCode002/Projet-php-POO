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


    <h2 style=" text-align: center; margin-top: 5px;">Vous n'avez pas encore de chambre</h2>
    <div id="containdemande">
        <p id='message'><?php echo $Etudiant->ConnaitreStatutDemandeChambre($connect); ?></p>
        <?php if ($Etudiant->getDemandeChambre() != "enCours") {
            echo " <form action='' method='post'>
            <button type='submit' id='Fdemande' name='Fdemande'>Faire une demande</button>
        </form>";
        } ?>
    </div>
    <?php include('../../../public/include/Menu.php') ?>
    <script src="../../../public/script/script.js"></script>

</body>


</html>