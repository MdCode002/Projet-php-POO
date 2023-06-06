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
        <h3 style="position: relative;width:420px; left: 50%; transform: translate(-50%);top:10px">Accorder une chambre
            a
            <?php echo $etudiantChambre[1] . "(" . $etudiantChambre[0] . ")"; ?></h4>
            <h5 style="position: absolute; left: 50%; transform: translate(-50%);top:35px">Chambre disponible</h5>
            <div id="continaddroom">
                <form action="" method="post">
                    <select name="chambre" id="chambreselect">
                        <?php foreach ($Leschambres as $Chambre) { ?>
                            <option <?php if (isset($_POST["chambre"]) && $_POST["chambre"] == $Chambre['nomChambre']) echo "selected"; ?> value="<?php echo $Chambre['nomChambre']; ?>"><?php echo $Chambre['nomChambre']; ?>
                            </option><?php } ?>
                    </select>
                    <button type="submit" id="Choisirechambre" name="Choisire">Choisire </button>
                </form>
                <?php if (isset($_POST['Choisire'])) { ?>
                    <div style="display: flex;    align-items: flex-start;">
                        <div id="Lesprenom">
                            <div style="margin: 3px;">Locataire</div>
                            <br>
                            <?php if (isset($m)) {
                                echo $m;
                            }
                            foreach ($Listecolocataire as $Etudiant) { ?>
                                <div id="ListeName" style="background: white; margin-top: 0;">
                                    <?php echo $Etudiant['NomEtudiant']; ?></div>
                            <?php } ?>
                        </div>
                        <div id="Lesprenom">
                            <div style="margin: 3px;">Nombre Locataire</div>
                            <br>
                            <div id="ListeName" style="background: white; margin-top: 0;">
                                <?php echo $selectchambre[5] . "/" . $selectchambre[4]; ?>
                            </div>

                        </div>
                        <div id="Lesprenom">
                            <div style="margin: 3px;">Superficie</div>
                            <br>
                            <div id="ListeName" style="background: white; margin-top: 0;">
                                <?php echo $selectchambre[2] . "m²"; ?>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post">
                        <div><button type="submit" name="accorder" class="addbtn">Accorder</button>
                            <button class="addbtn" name="annuler">Annuler</button>
                        </div>
                    </form>
                <?php } ?>


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