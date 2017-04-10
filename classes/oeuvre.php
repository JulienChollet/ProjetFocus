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
	private $dimension;
	private $photo;






function __construct($id = 0) {
          if($id!=0) {
              $res = sql("SELECT FROM oeuvre WHERE id='".$id."'");
              $oeuvre = $res[0];
              $this->id = $oeuvre['id'];
              $this->nom = $oeuvre['nom'];
              $this->type = $oeuvre['type'];
              $this->date_entre = $oeuvre['date_entre'];
              $this->date_sortie = $oeuvre['date_sortie'];
              $this->periode = $oeuvre['periode'];
              $this->dimension = $oeuvre['dimension'];
              $this->photo = $oeuvre['photo'];
              
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
  
 


function syncDb_oeuvre() {
      if(empty($this->id)) {
      // si $this->id est vide, on fait un INSERT
      $res = sql("INSERT INTO oeuvre
        VALUES ( 
        NULL,             
        '".addslashes($this->nom)."',
        '".addslashes($this->type)."',
        '".addslashes($this->date_entre)."',
        '".addslashes($this->date_sortie)."',
        '".addslashes($this->periode)."',
        '".addslashes($this->dimension)."',
        '".addslashes($this->photo)."'
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
      $res = sql("UPDATE oeuvre SET
        nom ='".addslashes($this->nom)."',
        type = '".addslashes($this->type)."',
        date_entre = '".addslashes($this->date_entre)."',
        date_sortie = '".addslashes($this->date_sortie)."',
        periode = '".addslashes($this->periode)."',
        dimension = '".addslashes($this->dimension)."',
        photo = '".addcslashes($this->photo)."'
        WHERE id='".addslashes($this->id)."'
        ");
      return $res;
    }
}

function form_oeuvre($target, $submit = ''){
  ?> 
    <section class="container">
      <div class="row">
        <div class="col-xs-offset-3 col-xs-6">

          <form class="form-group" action="<?php echo $target; ?>" method="post" enctype="multipart/form-data">

                <label for="nom">Titre de l'oeuvre</label>
                <input class="form-control" type="text" name="nom" value="<?php echo $this->nom ?>">

                <label for="type">Type</label>
                <input class="form-control" type="text" name="type" value="<?php echo $this->type ?>">

                <label for="date_entre">date d'arrrivée</label>
                <input class="form-control" type="date" placeholder="jj/mm/aaaa" name="date_entre" value="<?php echo $this->date_entre ?>"> 

                <label for="date_sortie">date de sortie</label>
                <input class="form-control" type="date" placeholder="jj/mm/aaaa" name="date_sortie" value="<?php echo $this->date_sortie ?>">

                <label for="periode">période</label>
                <input class="form-control" type="text" placeholder="2000-2010" name="periode" value="<?php echo $this->periode ?>"> 

                <label for="dimension">dimensions en centimètre</label>
                <input class="form-control" type="text" name="dimension" placeholder="2000x2000x2000" value="<?php echo $this->dimension ?>">
                <label for="auteur">Auteur</label>
                <select class="form-control" type="text" name="id_artiste">
                  <option selected="selected"></option>
                  <?php
                    $nb_artiste = sql("SELECT pseudo_nom,id FROM artiste");
        
                      foreach ($nb_artiste as $nom){
                  ?>
                  <option><?php echo $nom['pseudo_nom']; ?></option>  
                  <?php }
                  ?>                
                </select>
                <label for="photo">photo</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" >
                <input class="btn btn-default btn_sauv " type="file" name="imageNew" id="image" value="<?php echo $this->photo ?>"> 
                <input type="hidden" name="id" value="<?php echo $this->id ?>">    
                <input class="btn btn-default btn_sauv" type="submit" value="<?php echo $submit==''?'Valider':$submit; ?>">
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
