<?php

// session_start();

//fin de session utilisateur

require_once('../classes/utilisateur.php');
$logout = new Utilisateur($_SESSION['id']);
$logout->disconnect();
?>