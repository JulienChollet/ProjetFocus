<?php
/*-----------------------------------------
        Projet Focus
        creation date : 11 jan 2017
        classes/oeuvre.php
-----------------------------------------*/

class oeuvre {

	private $id;
	private $nom;
	private $type;
	private $date_entree;
	private $date_sortie;
	private $periode;
	private $id_artiste;
	private $id_expo;
	private $id_desription;
	private $dimension;
	private $photo;
	private $qr_code;





function __construct($id = 0) {
          if($id!=0) {
              $res = sql("SELECT * FROM oeuvre WHERE id='".$id."'");
              $oeuvre = $res[0];
              $this->id = $oeuvre['id'];
              $this->nom = $oeuvre['nom'];
              $this->type = $oeuvre['type'];
              $this->date_entree = $oeuvre['date_entre'];
              $this->date_sortie = $oeuvre['date_sortie'];
              $this->$periode = $oeuvre['periode'];
              $this->$id_artiste = $oeuvre['id_artiste'];
              $this->$id_expo = $oeuvre['id_expo'];
              $this->$id_desription = $oeuvre['id_desription'];
              $this->$dimension = $oeuvre['dimension'];
              $this->$photo = $oeuvre['photo'];
              $this->$qr_code = $oeuvre['qr_code'];

            }

}

  function getId() {
    return $this->id;

  }

  function getNom() {
    return $this->nom;

  }

  function setNom($nom) {
    return $this->nom = $nom;

  }

  function getType(){
    return $this->type;

  }

  function setType($type){
    return $this->type = $type;
    return TRUE;

  }

  function getDate_entre(){
    return $this->date_entre;

  }

  function setDate_entre($date_entre){
    return $this->date_entre = $date_entre;
    return TRUE;
  }

  function getDate_sortie(){
    return $this->date_sortie;

  }

  function setDate_sortie($date_sortie){
    return $this->date_sortie = $date_sortie;
    return TRUE;
  }

  function gePeriode(){
    return $this->periode;

  }

  function setPeriode($periode){
    return $this->periode = $periode;
    return TRUE;
  }

  function getId_artiste(){
    return $this->id_artiste;

  }

  function getId_expo(){
    return $this->id_expo;
  }

  function getId_description(){
    return $this->id_description;
  }

  function geDimension(){
    return $this->dimension;

  }

  function setDimension($dimension){
    return $this->dimension = $dimension;
    return TRUE;
  }

  function gePhoto(){
    return $this->photo;

  }

  function setPhoto($photo){
    return $this->photo = $photo;
    return TRUE;
  }

  function getQr_code(){
    return $this->qr_code;

  }

  function setQr_code($qr_code){
    return $this->qr_code = $qr_code;
    return TRUE;
  }

}

function syncDb() {
    if(empty($this->id)) {
      // si $this->id est vide, on fait un INSERT
      $res = sql("INSERT INTO oeuvre (nom, type, date_entre, date_sortie, periode, dimension, photo)
        VALUES (
        '".addslashes($this->nom)."',
        '".addslashes($this->email)."',
        '".addslashes($this->autorisations)."')");
     if($res !== FALSE) {
        $this->id = $res;
        return TRUE;
      }
      else {
        return FALSE;
      }

    }
    else{
      // Sinon on fait un update
      $res = sql("UPDATE nom SET
        nom ='".addslashes($this->nom)."',
        email = '".addslashes($this->email)."',
        autorisations = '".addslashes($this->autorisations)."'
        WHERE id='".addslashes($this->id)."';");
      return $res;
    }
  }


//mise à jour du mot de passe utilisateur

  function updateMdp($mdp) {
    if(empty($this->id)){
      return FALSE;
    }
    $res = sql("UPDATE utilisateur set mdp = '".crypt($mdp, CRYPT_SALT)."'
     WHERE id='".$this->id."'");
  return $res;
    }
