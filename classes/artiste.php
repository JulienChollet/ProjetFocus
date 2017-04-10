<?php
/*-----------------------------------------
        Projet Focus
        creation date : 11 jan 2017
        classes/artiste.php
-----------------------------------------*/

class artiste {

  private $id;
  private $pseudo_nom;
  private $biographie;
  private $nationalite;
  private $epoque;
  

// on initilise à 0 pour dire que si on a un id(1.2.....) on a déjà un artiste donc on se connecte, 
// sinon on a des champs à remplir pour un nouvelle artiste

  function __construct($id = 0) {
          if($id!=0) {
              $res = sql("SELECT id,pseudo_nom,biographie,nationalite,epoque FROM artiste WHERE id='".$id."'");
              $artiste = $res[0];
              $this->id = $artiste['id'];
              $this->pseudo_nom = $artiste['pseudo_nom'];
              $this->nationalite = $artiste['nationalite'];
              $this->epoque = $artiste['epoque'];
              $this->biographie = $artiste['biographie'];
            }

  }

  function getId() {
    return $this->id;

  }

  function getPseudo_Nom() {
    return $this->pseudo_nom;

  }

  function setPseudo_nom($pseudo_nom) {
    return $this->pseudo_nom = $pseudo_nom;

  }
  

  function getNationalite(){
    return $this->nationalite;

  }

  function setNationalite($nationalite){
    return $this->nationalite = $nationalite;
    return TRUE;

  }

  function getEpoque(){
    return $this->epoque;

  }

  function setEpoque($epoque){
    return $this->epoque = $epoque;
    return TRUE;
  }

  function getBiographie() {
    return $this->biographie;

  }

  function setBiographie($biographie) {
    return $this->biographie = $biographie;

  }

  function syncDb_artiste() {
    if(empty($this->id)) {
      // si $this->id est vide, on fait un INSERT
      $res = sql("INSERT INTO artiste (pseudo_nom, nationalite, epoque, biographie)
        VALUES (
        '".addslashes($this->pseudo_nom)."',
        '".addslashes($this->nationalite)."',
        '".addslashes($this->epoque)."',
        '".addslashes($this->biographie)."'
        )");
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
      $res = sql("UPDATE artiste SET
        pseudo_nom = '".addslashes($this->pseudo_nom)."',
        biographie = '".addslashes($this->biographie)."',
        pseudo_nom ='".addslashes($this->pseudo_nom)."',
        nationalite = '".addslashes($this->nationalite)."',
        epoque = '".addslashes($this->epoque)."'
        WHERE id='".addslashes($this->id)."';");
      return $res;
    }
  }

 


  function form_artiste($target, $submit = ''){
    ?> 
    <section class="container">
      <div class="row">
        <div class="col-xs-offset-3 col-xs-6">
          <form class="form-group" action="<?php echo $target; ?>" method="post">
              <label for="pseudo_nom">Nom de l'artiste</label>
                <input class="form-control" type="text" name="pseudo_nom" value="<?php echo $this->pseudo_nom ?>">
              <label for="nationalite">nationalité</label>
                <input class="form-control"type="text" name="nationalite" value="<?php echo $this->nationalite ?>">
              <label for="epoque">Période</label>
                <input class="form-control" name="epoque" placeholder="2000-2010" value="<?php echo $this->epoque ?>"> 
              <label for="biographie">biographie</label>
                <textarea rows=" 15" class="form-control" name="biographie"><?php echo $this->biographie ?></textarea>
                <input type="hidden" name="id" value="<?php echo $this->id ?>">  
                <input class="btn btn_default btn_sauv" type="submit" value="<?php echo $submit==''?'Valider':$submit; ?>">
          </form>
        </div>
      </div>
    </section>
    <?php
  }

function delete_artiste() {
        $resDeleteArtiste = sql("
            DELETE FROM artiste
            WHERE id='".$this->id."'
            ");
        
        if($resDeleteArtiste) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

}
