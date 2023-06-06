<?php
class  Etudiant extends User
{
    // Atrributs
    protected $class;
    protected $DemandeChambre;
    protected $IDchambre;

    // contructeur
    public function __construct($row = null)
    {
        $this->profil = "Etudiant";
        if ($row != null) {
            $this->hydrate($row);
            $this->class = $row["class"];
            $this->DemandeChambre = $row["DemandeChambre"];
            $this->IDchambre = $row["Chambre "];
        }
    }

    // redifinition
    public function setProfil($nom)
    {
    }
    public function PasDeChambre($connect)
    {
        $currentFile = basename($_SERVER['PHP_SELF']);
        $Demande = $connect->prepare('SELECT DemandeChambre from etudiant where IdEtudiant = ?');
        $Demande->execute(array($this->ID));
        $statutDemant = $Demande->fetch();
        $this->DemandeChambre = $statutDemant[0];
        $_SESSION['Etudiant'] = $this;

        if ($this->DemandeChambre != "valider") {
            if ($currentFile === 'homeEtudiant.php') {
                header('Location: ../../views/Etudiants/DemandeChambre.php');
            }
        }
    }
    public function ConnaitreStatutDemandeChambre($connect)
    {
        $currentFile = basename($_SERVER['PHP_SELF']);
        if ($this->DemandeChambre == "none") {

            $message = "Vous n'avez pas encore fait de demande de chambre";
            return $message;
        }
        if ($this->DemandeChambre == "rejeter") {

            return $message = "Votre demande de chambre a etait rejeter refaite en une ou veuillez conctacter l'administrateur";
            return $message;
        }
        if ($this->DemandeChambre == "enCours") {
            return $message = "Votre demande de chambre est en cours de traitement, elle sera traitée dans les meilleurs délais et une chambre vous seras attribué.";
            return $message;
        }
        if ($this->DemandeChambre == "valider") {
            if ($currentFile === 'DemandeChambre.php') {
                header("Location: ../../views/Etudiants/homeEtudiant.php");
                $Chambredeuser = $connect->query("SELECT * FROM etudiant WHERE IdEtudiant  = " . $this->ID)->fetch();
                $this->IDchambre = $Chambredeuser['Chambre'];
                $_SESSION['Etudiant'] = $this;
            }
        }
    }
    public function UpdateDemande($connect)
    {
        if ($this->DemandeChambre == "none" || $this->DemandeChambre == "rejeter") {
            if (isset($_POST["Fdemande"])) {
                $connect->query("UPDATE etudiant SET DemandeChambre = 'enCours' WHERE IdEtudiant  = " . $this->ID);
                header("Refresh:0");
            }
        }
    }
    public function UpdateIdChambre($connect)
    {
        $Chambredeuser = $connect->query("SELECT * FROM etudiant WHERE IdEtudiant  = " . $this->ID)->fetch();
        $this->IDchambre = $Chambredeuser['Chambre'];
        $_SESSION['Etudiant'] = $this;
    }
    public function Colocataire($connect)
    {
        $this->UpdateIdChambre($connect);
        $coloc = $connect->query("SELECT * FROM etudiant WHERE chambre = " . $this->IDchambre . " And IdEtudiant  != $this->ID")->fetchall();

        return $coloc;
    }
    public function Chambre($connect)
    {
        $this->UpdateIdChambre($connect);
        $chambre = $connect->query("SELECT * FROM chambre WHERE idChambre =   '$this->IDchambre'")->fetch();
        return $chambre;
    }
    public function ChambreEtudiant($connect)
    {
        $this->UpdateIdChambre($connect);
        $Chambredeuser = $connect->query("SELECT * FROM etudiant WHERE IdEtudiant  = " . $this->ID)->fetch();
        return $Chambredeuser;
    }

    /**
     * Get the value of DemandeChambre
     */
    public function getDemandeChambre()
    {
        return $this->DemandeChambre;
    }
}
