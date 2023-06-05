<div class="blury">

    <div id="menuparametre">
        <a href="./profilAdmin.php"> <span id="profilb"> <img class="icone" src="../../../public/img/profil.png" alt="">
                <p><?php echo $Admin->getNom() ?></p>
            </span></a>
        <a href="./homeAdmin.php"><span id="homeb"><img class="icone" src="../../../public/img/home.png" alt="">
                <p>Home</p>
            </span></a>
        <a href="./AddAdmin.php"><span id="AddA"><img class="icone" src="../../../public/img/addAdmin.png" alt="">
                <p>Ajouter Admin</p>
            </span></a>
        <form action="" method="post">
            <button name="deconnexion" id="deconnexion" onclick="return confirm('Êtes-vous sûr de vouloir vous  deconnecter ?')"> <img src="../../../public/img/logout.png" width="30px" alt="">
        </form>
        Déconnexion</button>
    </div>
</div>