<div class="navbar">

    <a href="./homeEtudiant.php"><img src="../../../public/img/logo.png" alt="" height="48px" style="margin-left:15px;margin-top:2px;"></a>
    <div class="menu">
        <span id="menu"><img class="icone" src="../../../public/img/menu.png" alt="">
            <p>Menu</p>
        </span>
        <a href="./ProfilEtudiant.php"> <span id="profil"> <img class="icone" src="../../../public/img/profil.png" alt="">
                <p><?php echo $Etudiant->getNom()  ?></p>
            </span></a>
        <div class="sep"></div>
        <a href="./homeEtudiant.php"><span id="home"><img class="icone" src="../../../public/img/lit-double 1.png" alt="">
                <p>Chambre</p>
            </span></a>
        <div class="sep"></div>
        <span id="parametre"><img class="icone" src="../../../public/img/parametre.png" alt="">
            <p>Parametre</p>
        </span>

    </div>

</div>