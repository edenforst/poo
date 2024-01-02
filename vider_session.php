<?php

/**
 * Script gérant la suppression de toutes les données de session.
 */

/**
 * Vérifie si la demande de suppression des données de session est reçue via la méthode POST.
 */
if (isset($_POST['viderSession'])) {
    // Détruire toutes les données de session
    session_destroy();

    // Vider immédiatement les données de session
    session_unset();

    // Expirer le cookie de session
    setcookie(session_name(), '', time() - 3600, '/');

    // Rediriger l'utilisateur vers la page d'origine ou une autre page
    header('Location: index.php'); // Redirige vers la page principale
    exit;
}
?>
