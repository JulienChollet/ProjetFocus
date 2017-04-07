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
	$oeuvre->form_oeuvre('edit_oeuvre.php','valider');

if (isset($_GET['action']) && $_GET['action'] == 'delete'){
	$oeuvre = new Oeuvre($_GET['id']);
	$delete_oeuvre = $oeuvre->delete_oeuvre();
}


?>
<section class="container">
   <div class="row">
        <div class="col-xs-offset-3 col-xs-6">
    		<label for="nom"><h3>derniers œuvres enregistrées</h3></label><br>
<?php
	
		$derniere_oeuvre = sql("SELECT nom, id FROM oeuvre");

		foreach ($derniere_oeuvre as $titre ) {
?>
		<form class="form-group" action="nouv_oeuvre.php" method="POST">
            
             <input class="form-control" type="text" name="titre" value="<?php echo $titre['nom']; ?>">

              
                <?php
                echo '<a class="btn btn-default btn_sauv" href="edit_oeuvre.php?action=edit&id='.$titre['id'].'">Modifier</a>';
                echo '<a class="btn btn-default btn_annul" href="nouv_oeuvre.php?action=delete&id='.$titre['id'].'"> Supprimer</a><br>';
				echo'</form>';
        }       
?>
		</div>
	</div>
</section>