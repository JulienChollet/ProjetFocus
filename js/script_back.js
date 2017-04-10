//-----------------------------------------------------------------------------
//------------------------------ Début de code --------------------------------
//-----------------------------------------------------------------------------

//----------------------- script pour formulaire multiple ---------------------
$(document).ready(function() { //quand ma page a fini de charger

	var enregistrement = $("[name='form']").submit(function(e){
		e.preventDefault();
		var values = [];
		//dans ce form recup les infos de chaque textarea
		$(this).find('textarea').each(function(){
			//pousse les dans un tableau
			values.push($(this).val());
		});
		//j'affiche le tableau avec les données
		console.log(values);
		//if(verification()){
		//	$(this).enregistrement;
		//}
	});
	
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		// e.target // onglet activée
		// e.relatedTarget// onglet précédement activer
		//--------------------
		//quand je change d'onglet demande d'enregistremnt
		verification();
	});
	$(document).ready(function(){
		$('#someTab').tab('show');
	});
});
//-----------------------------------------------------
function entrebdd(){
	//enregistrement.e.relatedTarget;
	$.ajax({
		//le chemin d'accé
		url:'/ISFAC/Focus/ProjetFocus/ga/nouv_expo.php',
		//la metode employer par mes form
		method: 'POST',
		//les information a envoyer a mon objet dans la class description_expo
		data:{
			id : $("#formfr input[name='id']").val(),
			desfr : $("#formfr textarea[name='txtfr']")[0].value,
			mdafr : $("#formfr textarea[name='txtfr']")[1].value,
			desan : $("#formen textarea[name='txten']")[0].value,
			mdaan : $("#formen textarea[name='txten']")[1].value,
			desal : $("#formde textarea[name='txtde']")[0].value,
			mdaal : $("#formde textarea[name='txtde']")[1].value,
			desch : $("#formch textarea[name='txtch']")[0].value,
			mdach : $("#formch textarea[name='txtch']")[1].value,
			desru : $("#formru textarea[name='txtru']")[0].value,
			mdaru : $("#formru textarea[name='txtru']")[1].value
		},
		success : function(data){
			if (data == true) {
				alert("votre enregistrement a etait pris en compte");
			}
		}
	});
}

//-----------------------------------------------------
	// je recupe les info des textes 
	function verif(){
		$("#formfr textarea[name='txtfr']")[0].value;
	}
//-----------------------------------------------------------------------------	
//je vérifie s'il y a du contenue dans le textarea de la description
function verifDescription(){
	if($("#formfr textarea[name='txtfr']")[0].value == "" ){
		console.log("La Descriptionn n'as pas etait rédiger");
		return false;
	}
	else{
		return true;
	}
}
//-----------------------------------------------------
//je vérifie s'il y a du contenue dans le textarea du mot de l'auteur
function verifMotAuteur(){
	if ($("#formfr textarea[name='txtfr']")[1].value == ""){
		console.log("Le mot de l'auteur n'as pas etait compléter");
		return false;
	}	
	else{
		return true;
	}
}		
//-----------------------------------------------------
//je selectionne le formulair actif
function selectChamp(){	
	if (document.getElementsByClassName("active")) {
		return true;
	}
	else{
		console.log("selectChamp ne fonctionne pas");
		return false;
	}
}
//-----------------------------------------------------
//je demande confiramation avant d'enregister dans different cas
//demande d'enregistrement a chaque changement d'onglet
//le chemain d'accer au textarea en cour n'est pas correcte!
function verification(){
	if( selectChamp()){
		//------------
		if (verifDescription() == false && verifMotAuteur() == false){
			var conf = confirm("Auccun champ n'a etait remplit voulez vous vraiment sauvegarder ?");
			
			if (conf == true) {
				//l'utilisateur Valide l'enregistrement
				$("#formfr textarea[name='txtfr']")[0].value;
				console.log('enregistrement');
				entrebdd();
			}
			else{
				//l'utilisateur Annule l'enregistrement
				console.log('enregistrement ANNULER');
			}
		}
		//------------
		if (verifDescription() == true && verifMotAuteur() == false){
			var conf = confirm("Le mot de l'Auteur n'a pas etait remplit voulez vous vraiment sauvegarder ?");
			
			if (conf == true) {
				//l'utilisateur Valide l'enregistrement
				$("#formfr textarea[name='txtfr']")[0].value;
				console.log('enregistrement');
				entrebdd();
			}
			else{
				//l'utilisateur Annule l'enregistrement
				console.log('enregistrement ANNULER');
			}
		}
		//------------
		if (verifDescription() == false && verifMotAuteur() == true){
			var conf = confirm("La Description n'a pas etait remplit voulez vous vraiment sauvegarder ?");
			
			if (conf == true) {
				//l'utilisateur Valide l'enregistrement
				$("#formfr textarea[name='txtfr']")[1].value;
				console.log('enregistrement');
				entrebdd();
			}
			else{
				//l'utilisateur Annule l'enregistrement
				console.log('enregistrement ANNULER');
			}
		}
		//------------
		else{
			$("#formfr textarea[name='txtfr']").val();
				console.log('enregistrement');
				entrebdd();
		}
	}

	return 
}
//-----------------------------------------------------------------------------


//-----------------------------------------------------------------------------
	//prochaine fonction envoyer une alerte lorsque je fais une modification
	//prochaine fonction quand j'enregistre je reste sur mon onglé selectionner actuel
//-----------------------------------------------------------------------------
