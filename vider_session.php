<?php
// Démarrer la session
session_start();

if (isset($_POST['viderSession'])) {
    // Détruire toutes les données de session
    session_destroy();

    // Vider immédiatement les données de session
    session_unset();

    // Expirer le cookie de session
    setcookie(session_name(), '', time() - 3600, '/');

    // Rediriger l'utilisateur vers la page d'origine ou une autre page
    header('Location: index.php'); // Remplacez "page_origine.php" par le chemin de votre choix
    exit;
}
?>
