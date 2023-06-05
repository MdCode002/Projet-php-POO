<?php
class  Admin extends User
{
    // Atrributs
    public function __construct($row = null)
    {
        $this->profil = "Admin";
        if ($row != null) {
            $this->hydrate($row);
        }
    }

    //redéfinition
    public function setProfil($profil)
    {
    }



    // Selectionne 4 Etudiants maximum dans la base de donnee
    public function Find4Stud($connect)
    {
        $Etudiant_4max = $connect->query("SELECT NomEtudiant,idEtudiant FROM etudiant  limit 5")->fetchAll();
        return $Etudiant_4max;
    }

    // On recupere 5 demande de Chambre
    public function Find5DemandChambre($connect)
    {
        $demandeChambre_5max = $connect->query('SELECT * from etudiant where DemandeChambre = "enCours" limit 5')->fetchAll();
        return $demandeChambre_5max;
    }
    // On selection tous les etudiant
    public function FindAllStud($connect)
    {
        $Etudiant = $connect->query("SELECT * FROM etudiant ")->fetchAll();
        return $Etudiant;
    }

    // On selection tous les etudiant qui on deja une chambre
    public function FindStudWithRoom($connect)
    {
        $Etudiant = $connect->query("SELECT * FROM etudiant where Chambre != 1 ")->fetchAll();
        return $Etudiant;
    }
    // on selection tous les etudiant qui n'ont pas  de chambre
    public function FindStudNoRoom($connect)
    {
        $Etudiant = $connect->query("SELECT * FROM etudiant where Chambre = 1 ")->fetchAll();
        return $Etudiant;
    }
    public function FindOneStu($IdEtdiant, $connect)
    {
        $selectetu = $connect->query("SELECT * from etudiant WHERE idEtudiant = $IdEtdiant")->fetch();
        return $selectetu;
    }
    public function FindRommOfAStu($IdEtdiant, $connect)
    {
        $selectetu = $this->FindOneStu($IdEtdiant, $connect);
        $selectchambre = $connect->query("SELECT * from chambre WHERE idChambre = $selectetu[7]")->fetch();
        return $selectchambre;
    }
    public function DeletStu($IdEtdiant, $connect)
    {
        $supetudiant = $_POST['supprimer'];
        $selectchambre = $this->FindRommOfAStu($IdEtdiant, $connect);
        $Neweffectif = $selectchambre[5] - 1;
        $connect->query("UPDATE chambre SET effectif = $Neweffectif WHERE idChambre  = " . $selectchambre[0]);
        $connect->query("DELETE FROM etudiant WHERE IdEtudiant  = $supetudiant");

        header("Refresh:0");
    }

    // Modifier les information de l'etudiant 
    public function modifierStu($connect)
    {
        if (isset($_POST['ModifierEtudiant'])) {
            if (!empty($_POST['MnomEtudiant']) || isset($_POST['Mmatricule']) || isset($_POST['MTel']) || isset($_POST['MClasse']) || isset($_POST['MEmail'])) {
                // on verifie si l'utlisateur a remplit tous les champs-----------------------------------------------------------------------
                if (!empty($_POST['Mmatricule'])) {
                    // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
                    $Mmatricule = htmlspecialchars($_POST['Mmatricule']);
                    // On verife si la etudiant est deja present dans la base de données----------------------------------------------------------------
                    $matriculeExist = $connect->prepare('SELECT idEtudiant  FROM etudiant where IdEtudiant  = ?');
                    $matriculeExist->execute(array($Mmatricule));
                    if ($matriculeExist->rowCount() == 0) {
                        // On insert la etudiant dans le site----------------------------------------------------------------------------------
                        $connect->query("UPDATE etudiant  set IdEtudiant = " . $Mmatricule . " Where idEtudiant = " . $_SESSION['IdmodifierEtudiant']);
                        // header("Location: ./Listeetudiant.php");
                    } else {
                        $e = "Cette matricule est déja dans le site.";
                    }
                }
                if (!empty($_POST['MnomEtudiant'])) {
                    // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
                    $MnomEtudiant = htmlspecialchars($_POST['MnomEtudiant']);
                    // On insert la etudiant dans le site----------------------------------------------------------------------------------
                    $connect->query("UPDATE etudiant  set NomEtudiant = '" . $MnomEtudiant . "' Where idEtudiant = " . $_SESSION['IdmodifierEtudiant']);
                }
                if (!empty($_POST['MTel'])) {
                    // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
                    $MTel = htmlspecialchars($_POST['MTel']);
                    // On insert la etudiant dans le site----------------------------------------------------------------------------------
                    $connect->query("UPDATE etudiant  set TelEtudiant = " . $MTel . " Where idEtudiant = " . $_SESSION['IdmodifierEtudiant']);
                }
                if (!empty($_POST['MClasse'])) {
                    // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
                    $MClasse = htmlspecialchars($_POST['MClasse']);
                    // On insert la etudiant dans le site----------------------------------------------------------------------------------
                    $connect->query("UPDATE etudiant  set Classe = '" . $MClasse . "' Where idEtudiant = " . $_SESSION['IdmodifierEtudiant']);
                }
                if (!empty($_POST['MEmail'])) {
                    // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
                    $MEmail = htmlspecialchars($_POST['MEmail']);
                    $EmailExist = $connect->prepare('SELECT idEtudiant  FROM etudiant where emailEtudiant  = ?');
                    $EmailExist->execute(array($MEmail));
                    if ($EmailExist->rowCount() == 0) {
                        // On insert la etudiant dans le site----------------------------------------------------------------------------------
                        $connect->query("UPDATE etudiant  set emailEtudiant = '" . $MEmail . "' Where idEtudiant = " . $_SESSION['IdmodifierEtudiant']);
                        // header("Location: ./Listeetudiant.php");
                    } else {
                        $e = "Cette matricule est déja dans le site.";
                    }
                }
            }

            if (!isset($e)) {
                header("Refresh:0");
            }
        }
    }
    public function AddAdmin($connect)
    {
        $Email = htmlspecialchars($_POST['addemailadmin']);
        $nom = htmlspecialchars($_POST['addnomadmin']);
        $tel = htmlspecialchars($_POST['addteladmin']);
        $mdp = password_hash($_POST['addmspadmin'], PASSWORD_DEFAULT);

        $adminExistETU = $connect->prepare('SELECT emailEtudiant FROM etudiant where emailEtudiant = ?');
        $adminExistETU->execute(array($Email));
        if ($adminExistETU->rowCount() == 0) {
            $adminExist = $connect->prepare('SELECT emailAdmin FROM admin where emailAdmin = ?');
            $adminExist->execute(array($Email));
            if ($adminExist->rowCount() == 0) {
                // On insert l'etudiant dans le site----------------------------------------------------------------------------------
                $insertAdmin = $connect->prepare('INSERT INTO admin (nomAdmin,telAdmin,mdp,emailAdmin) VALUES (?,?,?,?)');
                $insertAdmin->execute(array($nom, $tel, $mdp, $Email));
                $e = "L'administrateur a bien etait ajouter dans le site.";
            } else {
                $e = "Cette email est déja inscrit dans le site.";
            }
        } else {
            $e = "Cette email est déja inscrit dans le site.";
        }
    }
}
