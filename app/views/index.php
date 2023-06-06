<!DOCTYPE html>
<html lang="fr">
<?php require("./../Controller/AuthentificationController.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../public/style/logsign.css">
    <title>Accueil</title>
</head>

<body>
    <?php include("../../public/include/header.php"); ?>
    <div id="log">
        <pre id="slogan"><span id="txtg">SAMA NEEK</span>KOU NEK AK SA NEEK</pre>
        <p id="connexion">Connexion</p>
        <form action="" method="post">
            <div class="form">
                <input type="text" placeholder="Email" name="email" required>
                <input type="password" placeholder="Mots de passe" name="mdp" required>
                <p class="erreur"> <?php if (isset($e)) {
                                        echo $e;
                                    } ?></p>
                </p>

                <button id="btn" type="submit" name="validerLogin"> Se connecter</button>
                <p id="sinscrire"><span>Vous n’avais pas de compte?
                        <a href="./Signup.php"> <span style="text-decoration-line: underline;color: black;font-weight: 900;cursor: pointer;">
                                <br> S’inscrire</span></a></span></p>
            </div>
        </form>

    </div>

</body>
<footer>

</footer>

</html>