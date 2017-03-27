<?php
//***************************************************************
//																*
//			créer le 03/03/2017 Projet Focus					*
//																*
//***************************************************************

class descriptionOeuvre {
	
 	private $id;
 	private $francais;
 	private $anglais;
 	private $allemand;
 	private $chinois;
 	private $russe;
 	private $id_expo;

//***************************************************************
	function __construct($id = 0)	{
	 	if ($id != 0) {
	 		$requete = sql("SELECT * FROM description_expo WHERE id='".$id."' ");

	 			$this->id = $requete[0]['id'];
	 			$this->francais = $requete[0]['francais'];
	 			$this->anglais = $requete[0]['anglais'];
	 			$this->allemand = $requete[0]['allemand'];
	 			$this->chinois = $requete[0]['chinois'];
	 			$this->russe = $requete[0]['russe'];
	 			$this->id_expo = $requete[0]['id_expo'];
	 	}
	}
//***************************************************************

	//------------- Id ----------------------
		function getId(){
			return $this->id;
		}

	//------------- Francais ----------------------
		function getFrancais(){
			return $this->francais;
		}


		function setFrancais(){
			return $this->francais = $francais;
		}

	//------------- Anglais ----------------------
		function getAnglais(){
			return $this->anglais;
		}


		function setAnglais(){
			return $this->anglais = $anglais;			
		}

	//------------- Allemand ----------------------
		function getAllemand(){
			return $this->allemand;
		}


		function setAllemand(){
			return $this->allemand = $allemand;			
		}

	//------------- Chinois ----------------------
		function getChinois(){
			return $this->chinois;
		}


		function setChinois(){
			return $this->chinois = $chinois;			
		}

	//------------- Russe ----------------------
		function getRusse(){
			return $this->russe;
		}


		function setRusse(){
			return $this->russe = $russe;			
		}
		
	//------------- Id_expo ----------------------
	 function getIdExpo(){
	 	return $this->id_expo;
	 }
//***************************************************************
		function miseajour(){
		//si j'ai un ID 
		if (isset($this->id)) {
			//alors je fais une requete SQL pour fair la MJA
			$requete = sql("
				UPDATE  description_expo
				SET (NULL ,
					'".$this->francais."',
					'".$this->anglais."',
					'".$this->allemand."',
					'".$this->chinois."',
					'".$this->russe."',
					NULL) 
				WHERE id ='".$this->id."'
			");
		}
		//Si non
		 else {
			//Alors je créer un nouvelle description_expo
				$requete = sql("
					INSERT INTO description_expo
					VALUES (NULL ,
					'".$this->francais."',
					'".$this->anglais."',
					'".$this->allemand."',
					'".$this->chinois."',
					'".$this->russe."',
					NULL
					)");
			}
	}
//***************************************************************
 	function supprimer(){
 		if (isset($this->id)) {
 			$requete = sql("DELETE FROM description_expo WHERE '".$this->id."'");
 		}
 	}
 }