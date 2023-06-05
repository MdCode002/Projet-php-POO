<div class="blury">

    <div id="menuparametre">
        <a href="./ProfilEtudiant.php"> <span id="profilb"> <img class="icone" src="../../../public/" alt="">
                <p><?php echo  $Etudiant->getNom() ?></p>
            </span></a>
        <a href="./homeEtudiant.php"><span id="homeb"><img class="icone" src="../../../public/img/lit-double 1.png" alt="">
                <p>Chambre</p>
            </span></a>
        <form action="" method="post">
            <button name="deconnexion" id="deconnexion" onclick="return confirm('Êtes-vous sûr de vouloir vous  deconnecter ?')"> <img src="../../../public/img/logout.png" width="30px" alt="">
        </form>
        Déconnexion</button>
    </div>
</div>