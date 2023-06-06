<?php
spl_autoload_register(function ($class) {
    $path = "./../../model/" . $class . ".php";
    require_once($path);
});
require('./../../../config/bdd.php');

// Si l'etudiant existe 
if (isset($_SESSION['etudiant'])) {
    $Etudiant = $_SESSION['etudiant'];

    // A chaque chargement on verifie si le satut de l'etudiant n'a pas changer et on le ridirige si oui
    $Etudiant->PasDeChambre($connect);

    // On affiche le statut de la demande de chambre de l'etudiant
    $Etudiant->ConnaitreStatutDemandeChambre($connect);

    $coloc = $Etudiant->Colocataire($connect);
    $chambre = $Etudiant->Chambre($connect);
    $Chambredeuser = $Etudiant->ChambreEtudiant($connect);
    $Etudiant->UpdateDemande($connect);

    if (isset($_POST['deconnexion'])) {
        $Etudiant->logout();
    }
} else {
    session_destroy();
    header('Location : ../index.php');
}
