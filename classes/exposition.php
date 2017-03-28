<?php
/*-----------------------------------------
        Projet Focus
        creation date : 11 mars 2017
        classes/exposition.php
-----------------------------------------*/



	// private $id;
	// private $artiste_id;
	// private $oeuvre_id;
	// private $nom_expo;
	// private $date_debut;
	// private $date_fin;
	// private $id_description_expo;
	// private $id_affluence;
	

	// function __construct($id = 0) {
 //          if($id!=0) {
 //              $res = sql("SELECT * FROM exposition WHERE id='".$id."'");
 //              $exposition = $res[0];
 //              $this->id = $exposition['id'];
 //              $this->artiste_id = $exposition['artiste_id'];
 //              $this->oeuvre_id = $exposition['oeuvre_id'];
 //              $this->nom_expo= $exposition['nom_expo'];
 //              $this->date_debut= $exposition['date_debut'];
 //              $this->date_fin = $exposition['date_fin'];
 //              $this->date_sortie = $exposition['id_description_expo'];
 //              $this->$periode = $exposition['id_affluence'];
 //              }

	// function getId() {
 //    	return $this->id;

 //  	}

 //  	function getArtiste_id() {
 //   		 return $this->artiste_id;

 //  	}

 //  	function getOeuvre_id() {
 //    	return $this->oeuvre_id;

 //  	}

 //  	function getNom_expo() {
 //    	return $this->nom_expo;

 //  	}

 //  	function setNom_expo($nom_expo)
 //  		return $this->nom_expo = $nom_expo;
 //    	return TRUE;

 //  	}

 //  	function getDate_debut(){
 //  		return $this->date_debut;
 //  	}

 //  	function setDate_debut($date_debut) {
 //    	return $this->date_debut = $date_debut;
 //    	return TRUE;

 //  	}

 //  	function getDate_fin(){
 //  		return $this->date_fin;
 //  	}

 //  	function setDate_fin($date_fin) {
 //    	return $this->date_fin = $date_fin;
 //    	return TRUE;

 //  	}

 //  	function getId_description_expo() {
 //    	return $this->Id_description_expo;

 //  	}

 //  	function getId_affluence() {
 //    	return $this->id_affluence;

 //  	}

//function d'écriture et mise à jour en bdd

  // function syncDb_expo() {
  //   if(empty($this->id)) {
  //     // si $this->id est vide, on fait un INSERT
  //     $res = sql("INSERT INTO exposition (nom_expo, date_debut, date_fin)
  //       VALUES (
  //       '".addslashes($this->nom)."',
  //       '".addslashes($this->email)."',
  //       '".addslashes($this->autorisations)."')");
  //    if($res !== FALSE) {
  //       $this->id = $res;
  //       return TRUE;
  //     }
  //     else {
  //       return FALSE;
  //     }

  //   }
  //   else{
  //     // Sinon on fait un update
  //     $res = sql("UPDATE utilisateur SET
  //       nom ='".addslashes($this->nom)."',
  //       email = '".addslashes($this->email)."',
  //       autorisations = '".addslashes($this->autorisations)."'
  //       WHERE id='".addslashes($this->id)."';");
  //     return $res;
  //   }
  // }