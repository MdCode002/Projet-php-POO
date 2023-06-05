<?php
class User
{
    // Atrributs
    protected $ID;
    protected $nom;
    protected $mdp;
    protected $profil;
    protected $tel;
    protected $email;

    public function __construct($row = null)
    {
        if ($row != null) {
            $this->hydrate($row);
        }
    }
    // redefinition
    public function hydrate($row)
    {
        $this->ID = $row["id"];
        $this->email = $row["email"];
        $this->nom = $row["nom"];
        $this->tel = $row["tel"];
        $this->mdp = $row["mdp"];
    }
    
    // Getter
    public function getNom()
    {
        return $this->nom;
    }

    public function getMDP()
    {
        return $this->mdp;
    }


    public function getID()
    {
        return $this->ID;
    }
    public function getprofile()
    {
        return $this->profil;
    }

    //Setter
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setMDP($nom)
    {
        $this->nom = $nom;
    }
    public function setID($Id)
    {
        $this->nom = $Id;
    }
    public function setProfil($profil)
    {
        $this->profil = $profil;
    }
    // fonction qui retourne le nom complet



    // fonction connexion
    public function login($connect)
    {
        if (isset($_POST['email']) && isset($_POST['mdp'])) {
            $Email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $emailExist = $connect->prepare('SELECT * FROM etudiant WHERE emailEtudiant = ?');
            $emailExist->execute(array($Email));

            if ($emailExist->rowCount() > 0) {
                $userinfo = $emailExist->fetch();

                if (password_verify($mdp, $userinfo['mdp'])) {
                    $row = [
                        "id" => $userinfo['IdEtudiant'],
                        "nom" => $userinfo['NomEtudiant'],
                        "class" => $userinfo['Classe'],
                        "email" => $userinfo['emailEtudiant'],
                        "tel" => $userinfo['TelEtudiant'],
                        "mdp" => $userinfo['mdp'],
                        "DemandeChambre" => $userinfo['DemandeChambre'],
                        "Chambre " => $userinfo['Chambre ']
                    ];
                    $etudiant = new Etudiant($row);

                    $_SESSION['etudiant'] =
                        $etudiant;
                    header('Location: ./Etudiants/homeEtudiant.php');
                } else {
                    $e = "Mots de passe incorrect";
                    return $e;
                }
            } else {
                $emailExist = $connect->prepare('SELECT * FROM admin WHERE emailAdmin = ?');
                $emailExist->execute(array($Email));
                if ($emailExist->rowCount() > 0) {
                    $admininfo = $emailExist->fetch();
                    if (password_verify($mdp, $admininfo['mdp'])) {
                        $row = [
                            "id" => $admininfo['IdAdmin'],
                            "nom" => $admininfo['nomAdmin'],
                            "email" => $admininfo['emailAdmin'],
                            "tel" =>  $admininfo['telAdmin'],
                            "mdp" => $admininfo['mdp']
                        ];
                        $admin = new Admin($row);
                        $_SESSION['admin'] = $admin;
                        header('Location: ./Admin/homeAdmin.php');
                    } else {
                        $e = "Le Mots de passe est incorrect";
                        return $e;
                    }
                } else {
                    $e = "Cette email n'est pas inscrit dans le site";
                    return $e;
                }
            }
        } else {
            $e = "Remplit tous les champs";
            return $e;
        }
    }


    // fonction pour s'incrire 
    public function signup($connect)
    {
        // on verifie si l'utlisateur a remplit tous les champs-----------------------------------------------------------------------
        if (!empty($_POST['Email']) && isset($_POST['nom']) && isset($_POST['tel']) && isset($_POST['id']) && isset($_POST['mdp']) && isset($_POST['classe'])) {
            // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
            $Email = htmlspecialchars($_POST['Email']);
            $nom = htmlspecialchars($_POST['nom']);
            $tel = htmlspecialchars($_POST['tel']);
            $id = htmlspecialchars($_POST['id']);
            $classe = htmlspecialchars($_POST['classe']);
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            // On verife si l'email est deja present dans la base de données----------------------------------------------------------------
            $emailExist = $connect->prepare('SELECT emailEtudiant FROM etudiant where emailEtudiant = ?');
            $emailExist->execute(array($Email));
            if ($emailExist->rowCount() == 0) {
                // on verifie si l'utilisateur n'a pas entré l'email d'un admin-------------------------------------------
                $adminExist = $connect->prepare('SELECT emailAdmin FROM admin where emailAdmin = ?');
                $adminExist->execute(array($Email));
                if ($adminExist->rowCount() == 0) {
                    // On verifie si le matricule  est deja present dans la base de données-------------------------------------------------------
                    $idExist = $connect->prepare('SELECT IdEtudiant FROM etudiant where IdEtudiant = ? ');
                    $idExist->execute(array($id));
                    if ($idExist->rowCount() == 0) {
                        // On insert l'etudiant dans le site----------------------------------------------------------------------------------
                        $insertEtudiant = $connect->prepare('INSERT INTO etudiant (IdEtudiant,NomEtudiant,TelEtudiant,mdp,emailEtudiant,Classe) VALUES (?,?,?,?,?,?)');
                        $insertEtudiant->execute(array($id, $nom, $tel, $mdp, $Email, $classe));
                        echo "<script type='text/javascript'>
                        alert('Inscription reussite !!');
                        window.location.href = 'index.php';
                        </script>";
                    } else {
                        $e = "Ce Matricule est déja inscrit dans le site.";
                    }
                } else {
                    $e = "Cette adrresse Email est déja inscrit dans le site.";
                }
            } else {
                $e = "Cette adrresse Email est déja inscrit dans le site.";
            }
        } else {
            $e = "Veuillez Remplire tous les champs .";
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ../../../index.php');
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }
}
