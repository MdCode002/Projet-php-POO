<?php
spl_autoload_register(function ($class) {
    $path = "./../../model/" . $class . ".php";
    require_once($path);
});
require('./../../../config/bdd.php');
$currentFile = basename($_SERVER['PHP_SELF']);
if (isset($_SESSION['admin'])) {
    $Admin = $_SESSION['admin'];
    $Chambre = new Chambre;


    // On selection tous les Etudiant
    $Etudiant = $Admin->FindAllStud($connect);
    // On filtre la selection des etudiant
    if (isset($_POST["filtre"]) && $_POST["filtre"] == "all") {
        $Etudiant = $Admin->FindAllStud($connect);
    }
    if (isset($_POST["filtre"]) && $_POST["filtre"] == "loge") {
        $Etudiant = $Admin->FindStudWithRoom($connect);
    }
    if (isset($_POST["filtre"]) && $_POST["filtre"] == "nonloge") {
        $Etudiant = $Admin->FindStudNoRoom($connect);
    }

    // Supprimer un etudiant
    if (isset($_POST['supprimer'])) {
        $Admin->DeletStu($_POST['supprimer'], $connect);
    }

    // Chercher Un etudiant
    if (isset($_POST['validefiltreEtu'])) {
        if (!empty($_POST['Searchetudiant'])) {
            $Etudiant = $Admin->FindOneStu($_POST['Searchetudiant'], $connect);
        }
    }

    // Bouton modifier etudiant 
    if (isset($_POST['modifieretudiant'])) {
        $_SESSION['IdmodifierEtudiant'] = $_POST['modifieretudiant'];
        header("Location: ./ModifierEtudiant.php");
    }
    // Si nous somme dans la page ModifierEtudiant
    if ($currentFile === 'ModifierEtudiant.php') {

        $etudiantdeuser = $connect->query("SELECT * FROM etudiant WHERE IdEtudiant  = " . $_SESSION['IdmodifierEtudiant'])->fetch();
        $Admin->modifierStu($connect);
    }
    if (isset($_POST['rejeter'])) {
        $Chambre->RejectDemandeChambre($connect);
    }
    if (isset($_POST['Accepterdemande'])) {
        $_SESSION['accetudiant'] = $_POST['Accepterdemande'];
        header("Location: ./AccorderChambre.php");
    }

    if (isset($_POST['deconnexion'])) {
        $Admin->logout();
    }
    if ($currentFile === 'AccorderChambre.php' || $currentFile === "ListeChambre.php") {
        if (isset($_SESSION['accetudiant'])) {
            $accetudiant = $_SESSION['accetudiant'];
            $etudiantChambre = $connect->query("SELECT * from etudiant where IdEtudiant = $accetudiant")->fetch();
            $Leschambres = $connect->query("SELECT * FROM chambre where effectifMax > effectif and idChambre != 1 ")->fetchAll();
            if (isset($_POST['Choisire'])) {
                $chambre =  $_POST['chambre'];
                $selectchambre = $connect->query("SELECT *  from chambre where nomChambre = '$chambre'")->fetch();
                $nomChambre = $selectchambre[0];
                $_SESSION['selectchambre'] = $selectchambre;
                $colocataire = $connect->query("SELECT * from etudiant where Chambre = $nomChambre");
                $Listecolocataire = $colocataire->fetchAll();
                if ($colocataire->rowCount() == 0) {
                    $m = "Aucun locataire";
                }
            }
        } else {
            header("Location: ./ListeDemande.php");
        }

        if (isset($_POST['accorder'])) {
            $selectchambre = $_SESSION['selectchambre'];
            $connect->query("UPDATE etudiant SET DemandeChambre = 'valider' WHERE IdEtudiant  = " . $etudiantChambre[0]);
            $connect->query("UPDATE etudiant SET Chambre = $selectchambre[0] WHERE IdEtudiant = $etudiantChambre[0]");
            $Neweffectif = $selectchambre[5] + 1;
            $connect->query("UPDATE chambre SET effectif = $Neweffectif WHERE idChambre  = " . $selectchambre[0]);
            header("Location: ./ListeDemande.php");
        }
    }
    if (isset($_POST['modifieroom'])) {
        $_SESSION['Idmodifieroom'] = $_POST['modifieroom'];
        header("Location: ./ModifierChambre.php");
    }
    if (isset($_POST['supprimerchambre'])) {
        $Chambre->DeleteRoom($connect);
    }

    if (isset($_SESSION['Idmodifieroom'])) {
        // Afficheer les residant de la chambre
        $coloc = $connect->query("SELECT * FROM etudiant WHERE chambre = " . $_SESSION['Idmodifieroom'])->fetchall();
        $arrayMChambre = $connect->query('SELECT * FROM chambre where IdChambre = ' . $_SESSION['Idmodifieroom'])->fetchAll();
        if (isset($_POST['ModifierChambre'])) {
            if (!empty($_POST['MnomChambre']) || isset($_POST['Msuperficie']) || isset($_POST['Metage']) || isset($_POST['Mcolocataire'])) {
                // on verifie si l'utlisateur a remplit tous les champs-----------------------------------------------------------------------
                if (!empty($_POST['MnomChambre'])) {
                    // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
                    $MnomChambre = htmlspecialchars($_POST['MnomChambre']);
                    // On verife si la chambre est deja present dans la base de données----------------------------------------------------------------
                    $chambreExist = $connect->prepare('SELECT nomChambre FROM chambre where nomChambre = ?');
                    $chambreExist->execute(array($MnomChambre));
                    if ($chambreExist->rowCount() == 0) {
                        // On insert la chambre dans le site----------------------------------------------------------------------------------
                        $connect->query("UPDATE chambre  set nomChambre = '" . $MnomChambre . "' Where idChambre = " . $_SESSION['Idmodifieroom']);
                        // header("Location: ./ListeChambre.php");
                    } else {
                        $e = "Le nom de cette chambre existe déja.";
                    }
                }
                if (!empty($_POST['Msuperficie'])) {
                    // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
                    $Msuperficie = htmlspecialchars($_POST['Msuperficie']);
                    // On insert la chambre dans le site----------------------------------------------------------------------------------
                    $connect->query("UPDATE chambre  set Superficie = " . $Msuperficie . " Where idChambre = " . $_SESSION['Idmodifieroom']);
                }
                if (!empty($_POST['Metage'])) {
                    // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
                    $Metage = htmlspecialchars($_POST['Metage']);
                    // On insert la chambre dans le site----------------------------------------------------------------------------------
                    $connect->query("UPDATE chambre  set etageChambre = " . $Metage . " Where idChambre = " . $_SESSION['Idmodifieroom']);
                }
                if (!empty($_POST['Mcolocataire'])) {
                    // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
                    $Mcolocataire = htmlspecialchars($_POST['Mcolocataire']);
                    if ($Mcolocataire >= $arrayMChambre[0]["effectif"]) {
                        // On insert la chambre dans le site----------------------------------------------------------------------------------
                        $connect->query("UPDATE chambre  set effectifMax = " . $Mcolocataire . " Where idChambre = " . $_SESSION['Idmodifieroom']);
                    } else {
                        $e = "L'effectif max doit etre superieur au nombre de locataire actuellement present dans la chambre";
                    }
                }

                if (!isset($e)) {
                    header("Refresh:0");
                }
            }
        }
        if (isset($_POST['suppEtCha'])) {
            $connect->query("UPDATE etudiant SET chambre = 1 WHERE IdEtudiant = " . $_POST['suppEtCha']);
            $connect->query("UPDATE etudiant SET DemandeChambre = 'rejeter' WHERE IdEtudiant = " . $_POST['suppEtCha']);
            $neweffectif = $arrayMChambre[0]["effectif"] - 1;
            $connect->query("UPDATE chambre  set effectif = " . $neweffectif . " Where idChambre = " . $_SESSION['Idmodifieroom']);
        }
    } else {
        header('Location: ./ListeChambre.php');
    }
    if (isset($_SESSION['Ajouter'])) {
        $Chambre->AddRoom($connect);
    }
    if (isset($_POST['annuler'])) {
        header("Location:  ./ListeChambre.php");
    }
    if (isset($_POST['AjouterAdmin'])) {
        $Admin->AddAdmin($connect);
    }
} else {
    session_destroy();
    header('Location: ../../../index.php');
}
