<?php
/*-----------------------------------------
        Projet Focus
        creation date : 11 mars 2017
        classes/exposition.php
-----------------------------------------*/

class exposition{

	private $id;
	private $nom_expo;
	private $date_debut;
	private $date_fin;
	
	
	

	function __construct($id = 0){
          if($id!=0) {
              $res = sql("SELECT * FROM exposition WHERE id='".$id."'");
              $exposition = $res[0];
              $this->id = $exposition['id'];
              $this->nom_expo= $exposition['nom_expo'];
              $this->date_debut= $exposition['date_debut'];
              $this->date_fin = $exposition['date_fin'];
              }
  }

	function getId(){
    	return $this->id;

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

  	

  	
// function d'écriture et mise à jour en bdd

  function syncDb_expo() {
    if(empty($this->id)) {
      // si $this->id est vide, on fait un INSERT
      $res = sql("INSERT INTO exposition (nom_expo, date_debut, date_fin)
        VALUES (
        NULL,
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
        date_debut = '".addslashes($this->date_debut)."',
        date_fin = '".addslashes($this->date_fin)."'
        WHERE id='".addslashes($this->id)."';");
      return $res;
    }
  }
  function form_expo($target, $submit = ''){
  ?> 
    <section class="container">
      <div class="row">
        <div class="col-xs-offset-3 col-xs-6">

          <form class="form-group" action="<?php echo $target; ?>" method="post">

                <label for="nom">Titre de l'exposition</label>
                <input class="form-control" type="text" name="nom_expo" value="<?php echo $this->nom_expo ?>">

                <label for="date_debut">date de début</label>
                <input class="form-control" type="date" placeholder="jj/mm/aaaa" name="date_debut" value="<?php echo $this->date_debut ?>"> 

                <label for="date_fin">date de fin</label>
                <input class="form-control" type="date" placeholder="jj/mm/aaaa" name="date_fin" value="<?php echo $this->date_fin ?>">
                <label for="auteur">Auteur</label>
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

                <input type="hidden" name="id" value="<?php echo $this->id ?>">    
                <input class="btn btn-default btn_sauv" type="submit" value="<?php echo $submit==''?'Valider':$submit; ?>">
                <a href="description_expo" class="btn btn_sauv">Description de la nouvelle exposition</a>
          </form>
        </div>
      </div>
    </section>
    <?php
 }
function delete_expo() {
            $resDeleteExpo = sql("
                DELETE FROM exposition
                WHERE id='".$this->id."'
                ");
            
            if($resDeleteExpo) {
                return TRUE;
            }
            else {
                return FALSE;
            }
    }


}

