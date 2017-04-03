<?php
/*-----------------------------------------
        Projet Focus
        creation date : 11 mars 2017
        classes/exposition.php
-----------------------------------------*/

class exposition{

	private $id;
	private $artiste_id;
	private $oeuvre_id;
	private $nom_expo;
	private $date_debut;
	private $date_fin;
	private $id_description_expo;
	private $id_affluence;
	

	function __construct($id = 0){
          if($id!=0) {
              $res = sql("SELECT * FROM exposition WHERE id='".$id."'");
              $exposition = $res[0];
              $this->id = $exposition['id'];
              $this->artiste_id = $exposition['artiste_id'];
              $this->oeuvre_id = $exposition['oeuvre_id'];
              $this->nom_expo= $exposition['nom_expo'];
              $this->date_debut= $exposition['date_debut'];
              $this->date_fin = $exposition['date_fin'];
              $this->date_sortie = $exposition['id_description_expo'];
              $this->$periode = $exposition['id_affluence'];
              }
  }

	function getId(){
    	return $this->id;

  	}

  	function getArtiste_id(){
   		 return $this->artiste_id;

  	}

  	function getOeuvre_id(){
    	return $this->oeuvre_id;

  	}

  	function getNom_expo(){
    	return $this->nom_expo;

  	}

  	function setNom_expo($nom_expo){
  		return $this->nom_expo = $nom_expo;
    	return TRUE;

  	}

  	function getDate_debut(){
  		return $this->date_debut;
  	}

  	function setDate_debut($date_debut){
    	return $this->date_debut = $date_debut;
    	return TRUE;

  	}

  	function getDate_fin(){
  		return $this->date_fin;
  	}

  	function setDate_fin($date_fin) {
    	return $this->date_fin = $date_fin;
    	return TRUE;

  	}

  	function getId_description_expo() {
    	return $this->Id_description_expo;

  	}

  	function getId_affluence() {
    	return $this->id_affluence;

  	}

// function d'écriture et mise à jour en bdd

  function syncDb_expo() {
    if(empty($this->id)) {
      // si $this->id est vide, on fait un INSERT
      $res = sql("INSERT INTO exposition (nom_expo, date_debut, date_fin)
        VALUES (
        '".addslashes($this->nom_expo)."',
        '".addslashes($this->date_debut)."',
        '".addslashes($this->date_fin)."')");
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
      $res = sql("UPDATE exposition SET
        nom_expo ='".addslashes($this->nom_expo)."',
        date_debut = '".addslashes($this->email)."',
        autorisations = '".addslashes($this->autorisations)."'
        WHERE id='".addslashes($this->id)."';");
      return $res;
    }
  }
  function form_oeuvre($target, $submit = ''){
  ?> 
    <section class="container">
      <div class="row">
        <div class="col-xs-offset-3 col-xs-6">

          <form class="form-group" action="<?php echo $target; ?>" method="post">

                <label for="nom">Titre de l'exposition</label>
                <input class="form-control" type="text" name="nom_expo" value="<?php echo $this->nom ?>">

                <label for="date_entre">date de début</label>
                <input class="form-control" type="date" placeholder="jj/mm/aaaa" name="date_entre" value="<?php echo $this->date_entre ?>"> 

                <label for="date_sortie">date de sortie</label>
                <input class="form-control" type="date" placeholder="jj/mm/aaaa" name="date_sortie" value="<?php echo $this->date_sortie ?>">

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
                <input class="btn btn-default btn_sauv " type="file" name="photo" value="<?php echo $this->photo ?>"> 
                <input type="hidden" name="id" value="<?php echo $this->id ?>">    
                <input class="btn btn-default btn_sauv" type="submit" value="<?php echo $submit==''?'Valider':$submit; ?>">
          </form>
        </div>
      </div>
    </section>
    <?php
 }


}

