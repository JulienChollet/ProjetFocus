
<section class="container form_multiple">
	<!--****************** Menu ******************-->
	  <ul class="nav nav-tabs " role="tablist">
	    <li role="presentation" class="active">
	    	<a href="#francais" aria-expended="false" aria-controls="francais" role="tab" data-toggle="tab">Français
	    	</a>
	    </li>
	    <li role="presentation">
	    	<a href="#allemand" aria-expended="false" aria-controls="allemand" role="tab" data-toggle="tab">Allemand</a>
		</li>
	    <li role="presentation">
	    	<a href="#anglais" aria-expended="false" aria-controls="anglais" role="tab" data-toggle="tab">Anglais</a>
	    </li>
	    <li role="presentation">
	    	<a href="#chinois" aria-expended="false" aria-controls="chinois" role="tab" data-toggle="tab">Chinois</a>
	    </li>
	    <li role="presentation">
	    	<a href="#russe" aria-expended="false" aria-controls="russe" role="tab" data-toggle="tab">Russe</a>
	    </li>
	  </ul>
	<!--****************** Contenu ******************-->
		<div class="tab-content" id="">
			
			<!-- Français -->
	   		<div role="tabpanel" class="tab-pane fade in active" id="francais">
	    		<form action="nouv_expo.php" method="POST" class="form-group" id="formfr">
	    			<label>Description</label>
	    			<textarea placeholder="Votre texte" rows="5" class="form-control" name="txtfr"></textarea>
	    			<label>Mot de l'auteur</label>
	    			<textarea placeholder="Votre texte" rows="5" class="form-control" name="txtfr2"></textarea>
	    			<br/>
	    			<input type="submit" name="record" class="btn btn_sauv" value="Enregister" >
	    			<input type="submit" name="cancel" class="btn btn_annul" value="Annuler">
	    		</form>
	    	</div>

	    	<!-- Allemend -->
	    	<div role="tabpanel" class="tab-pane fade" id="allemand">
	    		<form action="#" method="POST" class="form-group" >
	    			<label>Beschreibung</label>
	    			<textarea placeholder="Ihren Text" rows="5" class="form-control" name="txtde"></textarea>
	    			<label>Wort des Autors</label>
	    			<textarea placeholder="Ihren Text" rows="5" class="form-control" name="txtde2"></textarea>
	    			<br/>
	    			<input type="submit" class="btn btn_sauv" value="Enregister" onclick="verification()">
	    			<input type="submit" class="btn btn_annul" value="Annuler">
	    		</form>
	    	</div>
	    	
	    	<!-- Anglais -->
	    	<div role="tabpanel" class="tab-pane fade" id="anglais">
	    		<form action="#" method="POST" class="form-group" >
	    			<label>Description</label>
	    			<textarea placeholder="Your text" rows="5" class="form-control" name="txten"></textarea>
	    			<label>Author's Message</label>
	    			<textarea placeholder="Your text" rows="5" class="form-control" name="txten2"></textarea>
	    			<br/>
	    			<input type="submit" class="btn btn_sauv" value="Enregister" onclick="verification()">
	    			<input type="submit" class="btn btn_annul" value="Annuler">
	    		</form>
	    	</div>
	    	
	    	<!-- Chinois -->
	    	<div role="tabpanel" class="tab-pane fade" id="chinois">
	    		<form action="#" method="POST" class="form-group" >
	    			<label>描述</label>
	    			<textarea placeholder="文本" rows="5" class="form-control" name="txtch"></textarea>
	    			<label>从笔者词</label>
	    			<textarea placeholder="文本" rows="5" class="form-control" name="txtch2"></textarea>
	    			<br/>
	    			<input type="submit" class="btn btn_sauv" value="Enregister" onclick="verification()">
	    			<input type="submit" class="btn btn_annul" value="Annuler">
	    		</form>
	    	</div>
	    	
	    	<!-- Russe -->
	    	<div role="tabpanel" class="tab-pane fade" id="russe">
	    		<form action="#" method="POST" class="form-group" >
	    			<label>Oписание</label>
	    			<textarea placeholder="ваш текст" rows="5" class="form-control" name="txtru"></textarea>
	    			<label>Слово от автора</label>
	    			<textarea placeholder="ваш текст" rows="5" class="form-control" name="txtru2"></textarea>
	    			<br/>
	    			<input type="submit" class="btn btn_sauv" value="Enregister" onclick="verification()">
	    			<input type="submit" class="btn btn_annul" value="Annuler">
	    		</form>
	    	</div>
		</div>
	</section>



