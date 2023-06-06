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
    <div class="continerListeEtudiant">
        <h2 style="position: absolute; left: 50%; transform: translate(-50%);top:10px">Profil</h2>
        <div>
            <div id="Liste" style="flex-direction : column;align-items: center; font-family: 'Lato',sans-serif; top: 50px;">
                <h4 style="margin:10px"><span id="infogray">Nom </span> :
                    <?php echo  $Admin->getNom(); ?></h4>
                <h4 style="margin:10px"><span id="infogray">Id</span> :
                    <?php echo $Admin->getId(); ?> </h4>
                <h4 style="margin:10px"><span id="infogray">Telephone</span>:
                    <?php echo $Admin->getTel(); ?></h4>
                <h4 style="margin:10px"><span id="infogray">Email</span> :
                    <?php echo $Admin->getEmail(); ?> </h4>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php include('../../../public/include/MenuAdmin.php') ?>
    <script src="../../../public/script/script.js"></script>
</body>


</html>