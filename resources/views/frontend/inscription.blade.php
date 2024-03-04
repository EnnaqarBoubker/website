<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="La 1ère plateforme des coaches professionnels au Maroc">
	<meta name="author" content="Centre Mikdad, Inscription ">
	<title>Centre Mikdad | Inscription</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="{{ asset("assets/frontend") }}/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="{{ asset("assets/frontend") }}/img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset("assets/frontend") }}/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset("assets/frontend") }}/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset("assets/frontend") }}/img/apple-touch-icon-144x144-precomposed.png">

	<!-- BASE CSS -->
	<link href="{{ asset("assets/frontend") }}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset("assets/frontend") }}/css/style.css" rel="stylesheet">
	<link href="{{ asset("assets/frontend") }}/css/vendors.css" rel="stylesheet">
	<link href="{{ asset("assets/frontend") }}/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

	<!-- SPECIFIC CSS -->
	<link href="{{ asset("assets/frontend") }}/css/skins/square/grey.css" rel="stylesheet">
	<link href="{{ asset("assets/frontend") }}/css/wizard.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="{{ asset("assets/frontend") }}/css/custom.css" rel="stylesheet">


</head>

<body id="admission_bg">

<div id="preloader">
	<div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<div id="form_container" class="clearfix">
	<figure>
		<a href="{{ url("/") }}"><img src="{{ asset('assets/frontend') }}/img/logoo.png" width="149" data-retina="true" alt="logo"></a>
	</figure>
	<div id="wizard_container">
		<div id="top-wizard">
			<div id="progressbar"></div>
		</div>
		<!-- /top-wizard -->
		<form name="example-1" id="wrapped" method="POST" >
		{{ csrf_field() }}
{{--			<input id="website" name="website" type="text" value="">--}}
			<!-- Leave for security protection, read docs for details -->
			<div id="middle-wizard">
				<div class="step">
					<div id="intro">

						<figure><img src="{{ asset('assets/frontend') }}/img/add-user.png" alt="Centre Mikdad creer votre compte" height="90px"></figure>
						<h3>Créer votre compte</h3>
						<p><strong>Cliquez sur Suivant et remplissez correctement vos informations.</strong></p>
						<div class="form-group radio_input">
							<label><input type="radio" value="1" checked name="role" class="icheck"><strong>Je suis Bénificaire</strong></label>
{{--							<label><input type="radio" value="2" name="role" class="icheck"><strong>Je suis Coach</strong></label>--}}
						</div>
					</div>
				</div>

				<div class="step">
					<h3 class="main_question"><strong>1/3</strong>Veuillez remplir vos coordonnées</h3>
					<div class="form-group">
						<input type="text" name="nom" class="form-control" required
							   oninvalid="this.setCustomValidity('Tappez votre nom ici...')"
							   oninput="this.setCustomValidity('')" placeholder="Tappez votre nom ici...">
					</div>
					<div class="form-group">
						<input type="text" name="prenom" class="form-control" required
							   oninvalid="this.setCustomValidity('Tappez votre prénom ici...')"
							   oninput="this.setCustomValidity('')" placeholder="Tappez votre prénom ici...">
					</div>
					<div class="form-group">
						<input type="text" name="tel" class="form-control" required
							   oninvalid="this.setCustomValidity('Tappez votre téléphone ici...')"
							   oninput="this.setCustomValidity('')"  placeholder="Tappez votre téléphone ici...">
					</div>
					<div class="form-group">
						<input type="text" name="ville" class="form-control" required
							   oninvalid="this.setCustomValidity('Tappez votre ville ici...')"
							   oninput="this.setCustomValidity('')" placeholder="Tappez votre ville ici...">
					</div>

				</div>
				<!-- /step-->
				<div class="step">
					<h3 class="main_question"><strong>2/3</strong>Choisissez un email & mot de passe</h3>


					<div class="form-group">
						<input type="email" name="email" class="form-control required" placeholder="Tappez votre email ici...">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control required" placeholder="Tappez votre mot de passe ici...">
					</div>
					<div class="form-group">
						<input type="password" class="form-control required" placeholder="Re Tappez votre mot de passe ici...">
					</div>

				</div>
				<!-- /step-->

				<div class="submit step">
					<h3 class="main_question"><strong>3/3</strong>Confirmation</h3>
					<p>
						Je reconnais l'exactitude des informations que j'ai renseignées afin de bénéficier de la plateforme Centre Mikdad, et cela ne me dérange pas de les utiliser dans la limite des objectifs par lesquels ce site a été mis en place.
					</p>
					<div class="form-group terms">
						<input name="terms" type="checkbox" class="icheck required" value="yes">
						<label>S'il-vous-plaît acceptez <a href="#" data-toggle="modal" data-target="#terms-txt">termes et conditions</a> ?</label>
					</div>
				</div>
				<!-- /step-->
			</div>
			<!-- /middle-wizard -->
			<div id="bottom-wizard">
				<button type="button" name="backward" class="backward">Retour </button>
				<button type="button" name="forward" class="forward">Suivant</button>
				<button type="submit" name="process" class="submit">Inscrit</button>
			</div>

			<!-- /bottom-wizard -->
		</form>
	</div>
	<!-- /Wizard container -->
</div>
<!-- /Form_container -->

<!-- Modal terms -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn_1" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- COMMON SCRIPTS -->
<script src="{{ asset("assets/frontend") }}/js/jquery-2.2.4.min.js"></script>
<script src="{{ asset("assets/frontend") }}/js/common_scripts.js"></script>
<script src="{{ asset("assets/frontend") }}/js/main_admission.js"></script>
<script src="{{ asset("assets/frontend") }}/assets/validate.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="{{ asset("assets/frontend") }}/js/jquery-ui-1.8.22.min.js"></script>
<script src="{{ asset("assets/frontend") }}/js/jquery.wizard.js"></script>
<script src="{{ asset("assets/frontend") }}/js/jquery.validate.js"></script>
<script src="{{ asset("assets/frontend") }}/js/admission_func.js"></script>

</body>
</html>