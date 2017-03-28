<?php
/*-----------------------------------------
        Projet Focus
        creation date : 20 Mars 2017
        nouv_oeuvre.php
-----------------------------------------*/

$title ='Nouvelle Oeuvre';

include('header.php');




// include('form_multiple.php');



	$oeuvre = new Oeuvre();
	$oeuvre->form_oeuvre('nouv_oeuvre.php','valider');

if (isset($_GET['action']) && $_GET['action'] == 'delete'){
	$oeuvre = new Oeuvre($_GET['id']);
	$delete_oeuvre = $oeuvre->delete_oeuvre();
}

function setPhoto($photo) {

		$listeExtension = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');

		$photo = $_FILES['imageNew'];

		if (!empty($_FILES['imageNew'])) { 
		 
		   if($_FILES['imageNew']['error'] <= 0) {

		       // L'image ne doit pas dépasser 2 097 152 octets
		       if($_FILES['imageNew']['size'] <= 2097152) {

		           $imageNew = $_FILES['imageNew']['name'];

		           // On cherche l'extension du fichier stocké dans la variable $imageNew(string) : explode renvoi un tableau de chaine
		           $extensionPresumee = explode('.', $imageNew);

		           // On converti l'extension en minuscule avec la fonction lower à l'index 1 de notre tableau
		           $extensionPresumee = strtolower($extensionPresumee[1]);

		           // On vérifie que l'extension correspond à l'un des formats accepté (jpg/jpeg/etc.)
		           if($extensionPresumee == 'jpg' || $extensionPresumee == 'jpeg' || $extensionPresumee == 'pjpg' || $extensionPresumee == 'pjpeg' || $extensionPresumee == 'gif' || $extensionPresumee == 'png') {

		               // On vérifie le type MIME
		               $imageNew = getimagesize($_FILES['imageNew']['tmp_name']);

		               if($imageNew['mime'] == $listeExtension[$extensionPresumee]) {

                            //On fait une copie de l'image redimensionné
                            $imageChoisie = imagecreatefromjpeg($_FILES['imageNew']['tmp_name']);

                            //On récupère les dimensions de l'image de départ
                            $tailleImageChoisie = getimagesize($_FILES['imageNew']['tmp_name']);
                            // var_dump($tailleImageChoisie); 

                            // On redimensionne l'image selon nos critères en "dur"
                            $nouvelleLargeur = 250;

                            // On calcule le pourcentage de réduction
                            $reduction = ( ($nouvelleLargeur * 100) / $tailleImageChoisie[0] );

                            // On détermine la hauteur de la nouvelle image en fonction du pourcentage de réduction de l'ancienne hauteur
                            $nouvelleHauteur = (($tailleImageChoisie[1] * $reduction) /100 );

                            // On crée la miniature
                            $nouvelleImage = imagecreatetruecolor($nouvelleLargeur, $nouvelleHauteur) or die ("Erreur");

                            imagecopyresampled($nouvelleImage,  $imageChoisie, 0, 0, 0, 0, $nouvelleLargeur, $nouvelleHauteur, $tailleImageChoisie[0], $tailleImageChoisie[1]);

                            imagedestroy($imageChoisie);

                            $nomImageChoisie = explode('.', $_FILES['imageNew']['name']);

                            // On modifie le nom pour sécuriser notre insertion
                            $nomImageExploitable = time();


                            // On stocke la nouvelle image dans $nouvelle image, on spécifie son dossier d'enregistrement, son nouveau nom ainsi que son extension(.png/.etc) et on on dit que la qualité de l'image sera de 100
                            $res = imagejpeg($nouvelleImage, '../img/'.$nomImageExploitable.'.'.$extensionPresumee, 100);

		                   if($res == TRUE) {
		                       $this->photo = '../img/'.$nomImageExploitable.'.'.$extensionPresumee;
			                   }

                           else {
                                    echo 'Le type MIME de l\'image n\'est pas bon';
                           }
		               }
                        else {
                                echo 'L\'extension choisie pour l\'image est incorrecte';
                        }
		           }
	               else {
	                       echo 'L\'image est trop lourde';
	               }
		       }
	           else {
	                   echo 'Erreur lors de l\'upload image';
	           }
		   }
	       else {
	               echo 'Au moins un des champs est vide';
	       }
		}
	}
?>
<section class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
    		<label for="nom">derniers œuvres enregistrées</label><br>
<?php
	
		$derniere_oeuvre = sql("SELECT nom, id FROM oeuvre");

		foreach ($derniere_oeuvre as $titre ) {
?>
		<form class="form-group" action="nouv_oeuvre.php" method="POST">
            
             <input class="form-control" type="text" name="titre" value="<?php echo $titre['nom']; ?>">

              
                <?php
                echo '<a class="btn_deco" href="edit_oeuvre.php?action=edit&id='.$titre['id'].'">Modifier</a>';
                echo '<a class="btn_deco" href="nouv_oeuvre.php?action=delete&id='.$titre['id'].'"> Supprimer</a><br>';

        }
                
?>