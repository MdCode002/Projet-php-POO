<?php
require('./../../config/bdd.php');
spl_autoload_register(function ($class) {
    $path = "./../model/" . $class . ".php";
    require_once($path);
});

// Connection de l'utilisateur
if (isset($_POST['validerLogin'])) {
    $User = new User();
    $e = $User->login($connect);
}
// ------------------------------------

// Inscription de l'utilisateur
if (isset($_POST['validersignup'])) {
    $User = new User();
    $User->signup($connect);
}
// ------------------------------------


// Redirection de l'utilisateur
if (isset($_SESSION['admin'])) {
    header('Location: ./Admin/homeAdmin.php');
};
if (isset($_SESSION['etudiant'])) {
    header('Location: ./Etudiants/homeEtudiant.php');
};
// -------------------------------