<?php
// On initialise la session pour pouvoir utiliser les variables de session
session_start();

// On vide le tableau de session
$_SESSION = array(); 

// On détruit les cookies en les écrasant par des cookies vides
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// On détruit notre session
session_destroy();

// On redirige le visiteur vers la page d'accueil
	header ('location: index.php');

?>