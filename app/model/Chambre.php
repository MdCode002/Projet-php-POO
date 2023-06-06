<?php

class Chambre implements iGestion
{
    protected $id;
    protected $numRoom;
    protected $nbBed;

    // constructeur
    public function __construct($row = null)
    {
        if ($row != null) {
            $this->hydrate($row);
        }
    }

    // redefinition
    public function hydrate($row)
    {
        $this->id = $row["id"];
        $this->numRoom = $row["numRoom"];
        $this->nbBed = $row["bed"];
    }

    public function Affichage()
    {
    }
    // Selectionne 5 chambre maximum dans la base de donnee
    public function Find5Room($connect)
    {
        $chambres_5max = $connect->query("SELECT nomChambre FROM chambre where idChambre != 1 limit 5")->fetchAll();
        return  $chambres_5max;
    }
    // on filtre la selection des etudiant
    // on recuperer le nom d'une chambre grace a sont ID
    public  function chambreName($x, $connect)
    {
        $y = $connect->query("SELECT nomChambre FROM chambre WHERE idChambre = $x")->fetchAll();
        echo ($y[0][0]);
    }
    public function RejectDemandeChambre($connect)
    {

        $rejetudiant = $_POST['rejeter'];
        $connect->query("UPDATE etudiant SET DemandeChambre = 'rejeter'  WHERE IdEtudiant  = $rejetudiant");

        header("Refresh:0");
    }
    public function DeleteRoom($connect)
    {
        $supetudiant = $_POST['supprimerchambre'];
        $connect->query("DELETE FROM chambre WHERE idChambre  = $supetudiant");
        header("Refresh:0");
    }
    public function AddRoom($connect)
    {
        // on verifie si l'utlisateur a remplit tous les champs-----------------------------------------------------------------------
        if (!empty($_POST['nChambre']) && isset($_POST['superficie']) && isset($_POST['etage']) && isset($_POST['colocataire'])) {
            // on echape les caractere speciaux et hash le mot de passe-----------------------------------------------------------------------
            $nChambre = htmlspecialchars($_POST['nChambre']);
            $superficie = htmlspecialchars($_POST['superficie']);
            $etage = htmlspecialchars($_POST['etage']);
            $colocataire = htmlspecialchars($_POST['colocataire']);
            // On verife si la chambre est deja present dans la base de données----------------------------------------------------------------
            $chambreExist = $connect->prepare('SELECT nomChambre FROM chambre where nomChambre = ?');
            $chambreExist->execute(array($nChambre));
            if ($chambreExist->rowCount() == 0) {
                // On insert la chambre dans le site----------------------------------------------------------------------------------
                $insertchambre = $connect->prepare('INSERT INTO chambre (nomChambre,Superficie,etageChambre,effectifMax) VALUES (?,?,?,?)');
                $insertchambre->execute(array($nChambre, $superficie, $etage, $colocataire));
                header("Location: ./ListeChambre.php");
            } else {
                $e = "Le nom de cette chambre existe déja.";
            }
        } else {
            $e = "Veuillez Remplire tous les champs .";
        }
    }
    public function AllRoom($connect)
    {
        $Leschambres = $connect->query("SELECT * FROM chambre where effectifMax > effectif and idChambre != 1 ")->fetchAll();
        return $Leschambres;
    }
}
