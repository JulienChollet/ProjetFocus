//-----------------------------------------------------------------------------
//------------------------------ Début de code --------------------------------
//-----------------------------------------------------------------------------

//----------------------- script pour formulaire multiple ---------------------
$(document).ready(function() { //quand ma page a fini de charger
	// console.log('ok');
	$('#formfr').submit(function(e){
		e.preventDefault();
		var values = [];
		$(this).find('textarea').each(function(){
			values.push($(this).val());
		});
		console.log(values);
		console.log(verification());
		// if(verification()){
		// 	$(this).submit();
		// }
	});
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		// e.target // onglet activée
		// e.relatedTarget// onglet précédement activer
		//quand je change d'onglet demande d'enregistremnt
		verification();
	});
	$(document).ready(function(){
		$('#someTab').tab('show');
	});
});

//-----------------------------------------------------
//je vérifie s'il y a du contenue dans le textarea de la description
function verifDescription(){
	if(document.getElementsByTagName("TEXTAREA")[0].value == "" ){
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
	if (document.getElementsByTagName("TEXTAREA")[1].value == ""){
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
	}
}
//-----------------------------------------------------
//je demande confiramation avant d'enregister dans different cas

function verification(){
	switch( selectChamp() == true){
		//------------
		case (verifDescription() == false && verifMotAuteur() == false):
			var conf = confirm("Auccun champ n'a etait remplit voulez vous vraiment sauvegarder ?");
			var conf;
			if (conf == true) {
				//l'utilisateur Valide l'enregistrement
				var contenu = $('#formfr input[name=txtfr]'.val());
				console.log('enregistrement'+ contenu);
				var verifEnregi = true;
			}
			else{
				//l'utilisateur Annule l'enregistrement
				console.log('enregistrement ANNULER');
				var verifEnregi = false;
			}
			break;
		//------------
		case (verifDescription() == true && verifMotAuteur() == false) :
			var conf = confirm("Le mot de l'Auteur n'a pas etait remplit voulez vous vraiment sauvegarder ?");
			var conf;
			if (conf == true) {
				//l'utilisateur Valide l'enregistrement
				var contenu = $('textarea[name=txtfr]').val();
				console.log('enregistrement'+ contenu);
				var verifEnregi = true;
			}
			else{
				//l'utilisateur Annule l'enregistrement
				console.log('enregistrement ANNULER');
				var verifEnregi = false;
			}
			break;
		//------------
		case (verifDescription() == false && verifMotAuteur() == true) :
			var conf = confirm("La Description n'a pas etait remplit voulez vous vraiment sauvegarder ?");
			var conf;
			if (conf == true) {
				//l'utilisateur Valide l'enregistrement
				var contenu = $('textarea[name=txtfr2]').val();
				console.log('enregistrement'+ contenu);
				var verifEnregi = true;
			}
			else{
				//l'utilisateur Annule l'enregistrement
				console.log('enregistrement ANNULER');
				var verifEnregi = false;
			}
			break;
		//------------
		default:
			var contenu = $('#formfr textarea[name=txtfr]').val();
				console.log('enregistrement'+ contenu);
				var verifEnregi = true;
			break;
	}

	return 
}
//-----------------------------------------------------------------------------
	// je recupe les info des textes 
	function enregistrement(){
		var contenu = $('#formfr textarea[name=txtfr]').val();
		
	}
	


//-----------------------------------------------------------------------------
	//prochaine fonction envoyer une alete l'osque je fait une modification
	//prochaine fonction quand j'enregistre je reste sur mon onglé selectionner actuel
	//demande d'enregistrement a chaque changement d'onglet
//-----------------------------------------------------------------------------