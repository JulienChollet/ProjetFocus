<?php

$title ='Nouvelle Exposition';
require_once('header.php');

require_once('footer.php');

$title ='Nouvelle Oeuvre';

$exposition = new Exposition();
$exposition->form_expo('nouv_expo.php','valider');

include('form_multiple.php');

?>