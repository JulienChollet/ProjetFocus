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
	private $date_entre;
	private $date_sortie;
	private $periode;
	private $id_artiste;
	private $id_expo;
	private $id_description;
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
              $this->$id_desription = $oeuvre['id_description'];
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

  function getDimension(){
    return $this->dimension;

  }

  function setDimension($dimension){
    return $this->dimension = $dimension;
    return TRUE;
  }

  function getPhoto(){
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


function syncDb_oeuvre() {
    if(empty($this->id)) {
      // si $this->id est vide, on fait un INSERT
      $res = sql("INSERT INTO oeuvre (nom, type, date_entre, date_sortie, periode, id_artiste, dimension, photo, qr_code)
        VALUES (
        '".addslashes($this->nom)."',
        '".addslashes($this->type)."',
        '".addslashes($this->date_entre)."',
        '".addslashes($this->date_sortie)."',
        '".addslashes($this->periode)."',
        '".addslashes($this->dimension)."',
        '".addslashes($this->photo)."',
        '".addslashes($this->qr_code)."')
        ");
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
      $res = sql("UPDATE oeuvre SET
        nom ='".addslashes($this->nom)."',
        type = '".addslashes($this->type)."',
        date_entre = '".addslashes($this->date_entre)."',
        date_sortie = '".addslashes($this->date_sortie)."',
        periode = '".addslashes($this->periode)."',
        dimension = '".addslashes($this->dimension)."',
        photo = '".addslashes($this->photo)."',
        qr_code = '".addslashes($this->qr_code)."'
        WHERE id='".addslashes($this->id)."';");
      return $res;
    }
}

function form_oeuvre($target, $submit = ''){
  ?> 
    <section class="container">
      <div class="row">
        <div class="col-md-offset-3 col-md-6">

          <form class="form-group" action="<?php echo $target; ?>" method="post">

                <label for="nom">Titre de l'oeuvre</label>
                <input class="form-control" type="text" name="nom" value="<?php echo $this->nom ?>">

                <label for="type">Type</label>
                <input class="form-control" type="text" name="type" value="<?php echo $this->type ?>">

                <label for="date_entre">date d'arrrivée</label>
                <input class="form-control" type="date" name="date_entre" value="<?php echo $this->date_entre ?>"> 

                <label for="date_sortie">date de sortie</label>
                <input class="form-control" type="date" name="date_sortie" value="<?php echo $this->date_sortie ?>">

                <label for="periode">période</label>
                <input class="form-control" type="text" placeholder="2000-2010" name="periode" value="<?php echo $this->periode ?>"> 

                <label for="dimension">dimensions en centimètre</label>
                <input class="form-control" type="text" name="dimension" placeholder="2000x2000x2000" value="<?php echo $this->dimension ?>">
                <label for="auteur">Auteur(s)</label>
                <select class="form-control" type="text" name="artiste">
                  <option selected="selected"></option>
                  <?php
                    $nb_artiste = sql("SELECT pseudo_nom,id FROM artiste");
        
                      foreach ($nb_artiste as $nom){
                  ?>
                  <option><?php echo $nom['pseudo_nom']; ?></option>  
                  <?php }
                  ?>                
                </select>
                <select class="form-control" type="text" name="artiste">
                  <option selected="selected"></option>
                  <?php
                    $nb_artiste = sql("SELECT pseudo_nom,id FROM artiste");
        
                      foreach ($nb_artiste as $nom){
                  ?>
                  <option value="<?php echo $this->id_artiste ?>"><?php echo $nom['pseudo_nom']; ?></option>  
                  <?php }
                  ?>                
                </select>
                <label for="photo">photo</label>
                <input class="form-control" type="file" name="photo" value="<?php echo $this->photo ?>"> 
                <input type="hidden" name="id" value="<?php echo $this->id ?>">    
                <input class="deco" type="submit" value="<?php echo $submit==''?'Valider':$submit; ?>">
          </form>
        </div>
      </div>
    </section>
    <?php
 }

    function delete_oeuvre() {
            $resDeleteOeuvre = sql("
                DELETE FROM oeuvre
                WHERE id='".$this->id."'
                ");
            
            if($resDeleteOeuvre) {
                return TRUE;
            }
            else {
                return FALSE;
            }
    }
}
