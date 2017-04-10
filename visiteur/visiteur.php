
<!-- ********************* Information Expo actuel ******************** -->
	<section class="container-fluid">
<!-- _______________________ Mobile et Tablette ________________________ -->
	<!-- Ligne 1 -->
		<div class="row ligne_un_visiteur hidden-sm hidden-md hidden-lg">
			<div>
				<p class="gras marge"><?=$theme ?> :</p>
				<p class="gras marge"><?=$debut ?> :</p>
				<p class="gras marge"><?=$fin ?> :</p>
			</div>
			<div>
				<p class=" marge"><?=$nomDuTheme ?></p>
				<p class=" marge">01/01/2017</p>
				<p class=" marge">01/05/2017</p>
			</div>
		</div>

	</section>
<!-- ************************** Descriptions Oevres *************************** -->
	<section class="container-fluid">

	<!-- Ligne 2 -->
		<div class="row ligne_deux_visiteur">
<!-- **************************** Artiste *************************** -->
			<!-- _______________________ Mobile ________________________ -->
			<div class="row hidden-sm hidden-md hidden-lg note">
				<h2 class="auteurnote"><?=$motAuteur ?> :</h2>
				<p><?=$contenueMotAuteur ?></p>
			</div>
<!-- **************************** Grand Angle *************************** -->
			<div class="row hidden-sm hidden-md hidden-lg note">
				<h2 class="ganote"><?=$description ?> :</h2>
				<p><?=$contenueDescription ?></p>
			</div>
		<!-- _______________________ Tablette ________________________ -->

			<div class="col-md-4 col-md-offset-1 hidden-xs note">
				<h2 class="auteurnote"><?=$motAuteur ?> :</h2>
				<p><?=$contenueMotAuteur ?></p>
			</div>
<!-- **************************** Grand Angle *************************** -->
			<div class="col-md-4 col-md-offset-2 hidden-xs note">
				<h2 class="ganote"><?=$description ?> :</h2>
				<p><?=$contenueDescription ?></p>
			</div>


		</div>
	</section>
