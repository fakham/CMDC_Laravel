<!DOCTYPE html>
<html lang="en">



<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transversal Developpement</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="YOUSSEF AIT EL KOB" />

	<link rel="shortcut icon" href="welcome/images/icons8-circled-c-filled-50.png">


	<!--Bootstrap Css-->
	<link rel="stylesheet" href="welcome/css/bootstrap.min.css" />

	<!-- Materialdesign icons Css -->
	<link rel="stylesheet" href="welcome/css/materialdesignicons.min.css">

	<!-- Mobirise icons Css -->
	<link rel="stylesheet" href="welcome/css/mobiriseicons.css">

	<!-- Magnific-popup -->
	<link rel="stylesheet" href="welcome/css/magnific-popup.css">

	<!-- Animate Css -->
	<link rel="stylesheet" href="welcome/css/animate.min.css">

	<!-- Owl Slider -->
	<link rel="stylesheet" href="welcome/css/owl.carousel.css" />
	<link rel="stylesheet" href="welcome/css/owl.theme.css" />
	<link rel="stylesheet" href="welcome/css/owl.transitions.css" />

	<!-- Custom style Css -->
	<link rel="stylesheet" href="welcome/css/style.css">
	<!-- CSS reset -->
	<link rel="stylesheet" href="welcome/css/reset.css">
	<!-- Resource style -->
	<link rel="stylesheet" href="welcome/css/stylelogin_signup.css">
	<!-- Demo style -->
	<link rel="stylesheet" href="welcome/css/demo.css">

</head>

<body>

	<!-- START LOADER -->
	<div id="preloader">
		<div id="status">
			<div class="spinner">Loading...</div>
		</div>
	</div>
	<!-- END LOADER -->

	<!-- START NAVBAR -->
	<nav class="navbar navbar-expand-lg fixed-top custom-nav sticky">
		<div class="container">
			<!-- LOGO -->
			<a class="navbar-brand logo" href="/">
				<div class="h5">Transversal Developpement</div>

			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="mdi mdi-menu"></i>
                    </button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a href="#home" class="nav-link">Acceuil</a>
					</li>
					<li class="nav-item">
						<a href="#about" class="nav-link">A propos
</a>
					</li>
				<!--	<li class="nav-item">
						<a href="#services" class="nav-link">Services</a>
					</li>-->
					<li class="nav-item">
						<a href="#education" class="nav-link">Tutoriel </a>
					</li>
					<!--<li class="nav-item">
						<a href="#work" class="nav-link">Testimonials
</a>
					</li>-->
					<li class="nav-item">
						<a href="#contact" class="nav-link">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END NAVBAR -->

	<!--START HOME-->
	<section class="home-bg section h-100vh creative" id="home">
		<div class="bg-overlay"></div>
		<div class="home-table">
			<div class="home-table-center">
				<div class="container position-relative z-index">
					<div class="row justify-content-center">
						<div class="col-lg-12">
							<div class="text-white text-center">
								<h4>Transversal Developpement</h4>
								<h1 class="header_title mb-0 mt-4">La Gestion Simplifiée</h1>
								<p class="text-white mx-auto header_subtitle mt-4"><span class="element font-weight-bold" data-elements="Artisan,Auto-entrepreneur,TPE,"></span></p>
								<nav class=" header_btn">
									<ul class="cd-main-nav__list">

										<li><a class="btn btn-outline-custom btn-rounded mt-4 MRG" href="/login" data-signin="login">Se Connecter</a></li>
										<li><a class="btn btn-custom btn-rounded mt-4 MRG" href="/register" data-signin="signup">S'inscrire</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="scroll_down">
			<a href="#about" class="scroll">
                    <i class="mbri-arrow-down text-white"></i>
                </a>
		</div>
	</section>
	<!--END HOME-->

	<!-- start login/sigup from-->
	<div class="cd-signin-modal js-signin-modal">
		<!-- this is the entire modal form, including the background -->
		<div class="cd-signin-modal__container">
			<!-- this is the container wrapper -->
			<ul class="cd-signin-modal__switcher js-signin-modal-switcher js-signin-modal-trigger">
				<li><a href="#0" data-signin="login" data-type="login">Se connecter</a></li>
				<li><a href="#0" data-signin="signup" data-type="signup">Nouveau compte</a></li>
			</ul>

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="login">
				<!-- log in form -->
				<form class="cd-signin-modal__form">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signin-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">Message d'erreur!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signin-password">Mot de passe</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signin-password" type="text" placeholder="Password">
						<a href="#0" class="cd-signin-modal__hide-password js-hide-password">Cacher</a>
						<span class="cd-signin-modal__error">Message d'erreur!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input type="checkbox" id="remember-me" checked class="cd-signin-modal__input ">
						<label for="remember-me">Se rappeler de moi</label>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width" type="submit" value="Login">
					</p>
				</form>

				<p class="cd-signin-modal__bottom-message js-signin-modal-trigger"><a href="#0" data-signin="reset">Mot de passe oublié?</a></p>
			</div>
			<!-- cd-signin-modal__block -->

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="signup">
				<!-- sign up form -->
				<form class="cd-signin-modal__form">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--username cd-signin-modal__label--image-replace" for="signup-username">Prenom</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signup-username" type="text" placeholder="Prenom">
						<span class="cd-signin-modal__error">Message d'erreur!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--username cd-signin-modal__label--image-replace" for="signup-username">Nom</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signup-username" type="text" placeholder="Nom">
						<span class="cd-signin-modal__error">Message d'erreur!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--username cd-signin-modal__label--image-replace" for="signup-username">Nom d'utilateur</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signup-username" type="text" placeholder="Username">
						<span class="cd-signin-modal__error">Message d'erreur!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="signup-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signup-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">Message d'erreur!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signup-password">Mot de passe</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signup-password" type="text" placeholder="Password">
						<a href="#0" class="cd-signin-modal__hide-password js-hide-password">Cacher</a>
						<span class="cd-signin-modal__error">Message d'erreur!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--password cd-signin-modal__label--image-replace" for="signup-password"> Répéter mot de passe</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="signup-password" type="text" placeholder="Password">
						<a href="#0" class="cd-signin-modal__hide-password js-hide-password">Cacher</a>
						<span class="cd-signin-modal__error">Message d'erreur!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input type="checkbox" id="accept-terms" class="cd-signin-modal__input ">
						<label for="accept-terms">Je suis d'accord avec les <a href="#0">Termes</a></label>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" value="Create account">
					</p>
				</form>
			</div>
			<!-- cd-signin-modal__block -->

			<div class="cd-signin-modal__block js-signin-modal-block" data-type="reset">
				<!-- reset password form -->
				<p class="cd-signin-modal__message">Mot de passe oublié? Merci d'entrer votre adresse Email. Vous recevrez un lien pour créer un nouveau Mot de passe.</p>

				<form class="cd-signin-modal__form">
					<p class="cd-signin-modal__fieldset">
						<label class="cd-signin-modal__label cd-signin-modal__label--email cd-signin-modal__label--image-replace" for="reset-email">E-mail</label>
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding cd-signin-modal__input--has-border" id="reset-email" type="email" placeholder="E-mail">
						<span class="cd-signin-modal__error">Message d'erreur!</span>
					</p>

					<p class="cd-signin-modal__fieldset">
						<input class="cd-signin-modal__input cd-signin-modal__input--full-width cd-signin-modal__input--has-padding" type="submit" value="Reset password">
					</p>
				</form>

				<p class="cd-signin-modal__bottom-message js-signin-modal-trigger"><a href="#0" data-signin="login">Revenir à la connexion</a></p>
			</div>
			<!-- cd-signin-modal__block -->
			<a href="#0" class="cd-signin-modal__close js-close">fermer</a>
		</div>
		<!-- cd-signin-modal__container -->
	</div>
	<!-- cd-signin-modal -->

	<!-- END login/sigup from-->

	<!-- START ABOUT -->
	<section class="section" id="about">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="text-center mx-auto section-main-title">
						<h2><span class="font-weight-bold">A Propos </h2>
						<div class="main-title-border">
							<i class="mdi mdi-asterisk"></i>
						</div>
						</h2>
					</div>
				</div>
			</div>
			<div class="row mt-4 pt-4 ">
				<div class="col-lg-12 seflf">
					<div>
					</div>
					<div class="text-center about-detail mx-auto mt-5">
						<h3 class="mb-3">Transversal Developpement <span class="font-weight-bold text-custom"> App Solution</span></h3>
							<ul class="mb-0 list-inline text-center about-work">
								<li class="list-inline-item mr-0 text-muted">La gestion simplifiée pour artisan et entrepreneurs!</li>

							</ul>
							<p class="text-muted mt-3">L’analyse des comptes de ses fournisseurs peut être une mine d’informations et procure des avantages indéniables. </br></br> C’est une aide incontestable si l’on veut sécuriser ses approvisionnements, mieux négocier ses contrats et réaliser des économies. Vous avez toujours pensé que ce serait bien d'optimiser la gestion de votre entreprise, mais que cela risquait d’être côuteux et demander du temps. Il convient de relativiser. </br></br> Voici une solution dont le but est de faciliter la gestion de votre entreprise au jour le jour. Si vous désirez mieux suivre l’évolution de votre entreprise afin d’agir et réagir sur certains chiffres, d’éclairer votre vision sur sa situation financière, d’envisager des investissements pour la développer. </br> </br><strong>N'attendez plus inscrivez vous vite !</strong></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END ABOUT -->

	<!-- START SERVICES -->
<!--	<section class="section bg-light" id="services">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="text-center mx-auto section-main-title">
						<h2><span class="font-weight-bold">Services</span></h2>
						<div class="main-title-border">
							<i class="mdi mdi-asterisk"></i>
						</div>
						<p class="text-muted mx-auto mt-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					</div>
				</div>
			</div>
			<div class="row mt-4 pt-4">
				<div class="col-lg-4">
					<div class="lan_box_ser text-center rounded p-4 mt-3">
						<div class="ser_icon">
							<i class="mbri-database text-danger"></i>
						</div>
						<div class="service-content mt-4">
							<h5 class="font-weight-bold">Graphic Design</h5>
							<p class="mt-3 text-muted mb-0">The standard chunk of Lorem Ipsum used since the is reproduced below for those interested.</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="lan_box_ser text-center rounded p-4 mt-3">
						<div class="ser_icon">
							<i class="mbri-growing-chart text-blue"></i>
						</div>
						<div class="service-content mt-4">
							<h5 class="font-weight-bold">Media Marketing</h5>
							<p class="mt-3 text-muted mb-0">The standard chunk of Lorem Ipsum used since the is reproduced below for those interested.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="lan_box_ser text-center rounded p-4 mt-3">
						<div class="ser_icon">
							<i class="mbri-responsive text-purple"></i>
						</div>
						<div class="service-content mt-4">
							<h5 class="font-weight-bold">Responsive Design</h5>
							<p class="mt-3 text-muted mb-0">The standard chunk of Lorem Ipsum used since the is reproduced below for those interested.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">



			</div>
		</div>
	</section> -->
	<!-- END SERVICES -->

	<!-- END FUNFACTS 
	<section class="section bg-funfact">
		<div class="bg-overlay"></div>
		<div class="container">
			<div class="row" id="counter">
				<div class="col-lg-3">

				</div>
			</div>
		</div>
	</section>
	<!-- START FUNFACTS -->

	<!-- START Tutoriel  -->
	<section class="section bg-funfact" id="education">
		<div class="bg-overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="text-center mx-auto section-main-title">
						<h2> <span class="text-center text-white">Tutoriel </span></h2>
						<div class="main-title-border text-white">
							<i class="mdi mdi-asterisk"></i>
						</div>
						<p class="text-muted mx-auto mt-2"></p>
					</div>
				</div>
			</div>
			<div class="row mt-4 pt-4">
				<div class="col-lg-3 mt-4">
					<div class="text-center rounded bg-white p-2">	<div class="blog_video position-relative">
							<div class="img_blog">
								<img src="welcome/images/blog/img2.png" alt="" class="img-fluid rounded mx-auto d-block">
							</div>
							<a href="https://vimeo.com/292600852" class="blog_play"><i class="mdi mdi-play"></i></a>
						</div>
						<div class="content_blog pt-3 pb-3">
							<div>
								<h5 class="font-weight-bold mb-0"><a href="#" class="text-dark">Inscription et Connexion</a></h5>
							</div>
							<div class="mt-3">
								<p class="font-weight-bold h6 mb-3"><a href="#" class="text-custom">Etape 1</a></p>
								
								<p class="mt-3 desc_blog pl-2 pr-2 text-muted">L'utilisateur s'inscrit et attend la validation de son compte par la commité de direction, une fois validé il peux désormé se connecter.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="text-center rounded bg-white p-2">
						<div class="blog_video position-relative">
							<div class="img_blog">
								<img src="welcome/images/blog/img2.png" alt="" class="img-fluid rounded mx-auto d-block">
							</div>
							<a href="https://vimeo.com/292600887" class="blog_play"><i class="mdi mdi-play"></i></a>
						</div>
						<div class="content_blog pt-3 pb-3">
							<div>
								<h5 class="font-weight-bold mb-0"><a href="#" class="text-dark">Programmation</a></h5>
							</div>
							<div class="mt-3">
								<p class="font-weight-bold h6 mb-3"><a href="#" class="text-custom">Etape 2</a></p>
								<!--<p class="h6 text-muted date_blog mb-0">......... <a href="#" class="text-dark font-weight-bold">........</a></p>-->
								<p class="mt-3 desc_blog pl-2 pr-2 text-muted">L'utilisateur programme son application avec ses propres données , tel que sa base de donnée fournisseurs, sa base de donnée clients , les différents produits / services achetés régulièrement et les produits / services qu’il vend.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="text-center rounded bg-white p-2">
						<div class="blog_video position-relative">
							<div class="img_blog">
								<img src="welcome/images/blog/img2.png" alt="" class="img-fluid rounded mx-auto d-block">
							</div>
							<a href="https://vimeo.com/292600867" class="blog_play"><i class="mdi mdi-play"></i></a>
						</div>
						<div class="content_blog pt-3 pb-3">
							<div>
								<h5 class="font-weight-bold mb-0"><a href="#" class="text-dark">Constatation</a></h5>
							</div>
							<div class="mt-3">
								<p class="font-weight-bold h6 mb-3"><a href="#" class="text-custom">Etape 3</a></p>
								<!--<p class="h6 text-muted date_blog mb-0">.......<a href="#" class="text-dark font-weight-bold">......</a></p>-->
								<p class="mt-3 desc_blog pl-2 pr-2 text-muted">Lors de son activité , l’utilisateur enregistre ses différentes opération d’achats et de ventes à travers des formulaires spécifiques.
.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 mt-4">
					<div class="text-center rounded bg-white p-2">
						<div class="blog_video position-relative">
							<div class="img_blog">
								<img src="welcome/images/blog/img2.png" alt="" class="img-fluid rounded mx-auto d-block">
							</div>
							<a href="https://vimeo.com/292600922" class="blog_play"><i class="mdi mdi-play"></i></a>
						</div>
						<div class="content_blog pt-3 pb-3">
							<div>
								<h5 class="font-weight-bold mb-0"><a href="#" class="text-dark">Suivi</a></h5>
							</div>
							<div class="mt-3">
								<p class="font-weight-bold h6 mb-3"><a href="#" class="text-custom">Etape 4</a></p>
								<!--<p class="h6 text-muted date_blog mb-0">.......<a href="#" class="text-dark font-weight-bold">......</a></p>-->
								<p class="mt-3 desc_blog pl-2 pr-2 text-muted">L'utilisateur suit son activité de manière détaillé via un tableau de bord de  gestion filtré par période, par acteur et par produit. Et un CPC périodique lui permettant de suivre ses opérations de manière global.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END Tutoriel -->


	<!--START WORK 
	<section class="section text-center" id="work">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="text-center mx-auto section-main-title">
						<h2><span class="font-weight-bold">Testimonials</span></h2>
						<div class="main-title-border">
							<i class="mdi mdi-asterisk"></i>
						</div>
						<p class="text-muted mx-auto mt-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row mt-5 work-filter">
				<div class="col-lg-4 work_item webdesign wordpress">
					<a href="welcome/images/works/1.jpg" class="img-zoom">
						<div class="work_box">
							<div class="work_img">
								<img src="welcome/images/works/1.png" class="img-fluid mx-auto d-block rounded" alt="work-img">
							</div>
							<div class="work_detail">
								<p class="mb-2">Category</p>
								<h4 class="mb-0">Project Title</h4>
							</div>
						</div>
					</a>
				</div>

				<div class="col-lg-4 work_item WORK Produit Charge">
					<a href="welcome/images/works/2.jpg" class="img-zoom">
						<div class="work_box">
							<div class="work_img">
								<img src="welcome/images/works/2.png" class="img-fluid mx-auto d-block rounded" alt="work-img">
							</div>
							<div class="work_detail">
								<p class="mb-2">Category</p>
								<h4 class="mb-0">Project Title</h4>
							</div>
						</div>
					</a>
				</div>

				<div class="col-lg-4 work_item seo Dashboard">
					<a href="welcome/images/works/3.jpg" class="img-zoom">
						<div class="work_box">
							<div class="work_img">
								<img src="welcome/images/works/3.png" class="img-fluid mx-auto d-block rounded" alt="work-img">
							</div>
							<div class="work_detail">
								<p class="mb-2">Category</p>
								<h4 class="mb-0">Project Title</h4>
							</div>
						</div>
					</a>
				</div>

				<div class="col-lg-4 work_item wordpress Dashboard Programme">
					<a href="welcome/images/works/4.jpg" class="img-zoom">
						<div class="work_box">
							<div class="work_img">
								<img src="welcome/images/works/4.png" class="img-fluid mx-auto d-block rounded" alt="work-img">
							</div>
							<div class="work_detail">
								<p class="mb-2">Category</p>
								<h4 class="mb-0">Project Title</h4>
							</div>
						</div>
					</a>
				</div>

				<div class="col-lg-4 work_item  Charge Dashboard">
					<a href="welcome/images/works/5.jpg" class="img-zoom">
						<div class="work_box">
							<div class="work_img">
								<img src="welcome/images/works/5.png" class="img-fluid mx-auto d-block rounded" alt="work-img">
							</div>
							<div class="work_detail">
								<p class="mb-2">Category</p>
								<h4 class="mb-0">Project Title</h4>
							</div>
						</div>
					</a>
				</div>

				<div class="col-lg-4 work_item  Charge Produit ">
					<a href="welcome/images/works/6.jpg" class="img-zoom">
						<div class="work_box">
							<div class="work_img">
								<img src="welcome/images/works/6.png" class="img-fluid mx-auto d-block rounded" alt="work-img">
							</div>
							<div class="work_detail">
								<p class="mb-2">Category</p>
								<h4 class="mb-0">Project Title</h4>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	  END WORK -->



	<!-- CONTACT FORM START-->
	<section class="section " id="contact">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="text-center mx-auto section-main-title">
						<h2> <span class="font-weight-bold">Contact</span></h2>
						<div class="main-title-border">
							<i class="mdi mdi-asterisk"></i>
						</div>
						<p class="text-muted mx-auto mt-2">Pour vos observations, questions et recommandation veuillez-nous en faire part !</p>
					</div>
				</div>
			</div>
			<div class="row mt-4 pt-4">
				<div class="col-lg-4">
					<div class="text-center mt-4">
						<div>
							<i class="mbri-mobile2 text-custom h2"></i>
						</div>
						<div class="mt-2">
							<p class="mb-0 font-weight-bold">Appelez nous au:</p>
							<p class="text-muted">+212522XXXXXX</p>
						</div>
					</div>
					<div class="text-center mt-4">
						<div>
							<i class="mbri-letter text-custom h2"></i>
						</div>
						<div class="mt-2">
							<p class="mb-0 font-weight-bold">Adresse Email</p>
							<p class="text-muted">contact@transversaldeveloppement.com</p>
						</div>
					</div>
					<div class="text-center mt-4">
						<div>
							<i class="mbri-pin text-custom h2"></i>
						</div>
						<div class="mt-2">
							<p class="mb-0 font-weight-bold">Adresse Postal</p>
							<p class="text-muted">berrechid , casablanca, M</p>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="contact_form">
						<form method="POST" action="/send">
							@csrf
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group mt-2">
										<label for="name" class="font-weight-bold">Nom</label>
										<input name="name" id="name" type="text" class="form-control" placeholder="Your name..." required="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group mt-2">
										<label for="email" class="font-weight-bold">Adresse Email</label>
										<input name="email" id="email" type="email" class="form-control" placeholder="Your email..." required="">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group mt-2">
										<label for="subject" class="font-weight-bold">Sujet</label>
										<input type="text" name="subject" class="form-control" id="subject" placeholder="Your Subject.." required="" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group mt-2">
										<label for="comments" class="font-weight-bold">Message</label>
										<textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Your message..." required=""></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 text-right">
									<input type="submit" class="btn btn-custom" value="Send Message">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- CONTACT FORM END-->

	<!-- START FOOTER -->
	<section class="bg-light">
		<div class="container">
			<div class="row pt-4 pb-4">
				<div class="col-lg-12">
					<div class="float-left float_none mt-2 mb-2">
						<p class="copy-rights text-muted mb-0">2018 &copy; Design by <a href="http://www.startoupti.com">Startoupti</a></p>
					</div>
					<div class="float-right float_none mt-2 mb-2">
						<ul class="list-inline fot_social mb-0">
							<li class="list-inline-item"><a href="#" class="social-icon text-muted"><i class="mdi mdi-facebook"></i></a></li>
							<li class="list-inline-item"><a href="#" class="social-icon text-muted"><i class="mdi mdi-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#" class="social-icon text-muted"><i class="mdi mdi-linkedin"></i></a></li>
							<li class="list-inline-item"><a href="#" class="social-icon text-muted"><i class="mdi mdi-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END FOOTER -->

	<!-- BACK TO TOP -->
	<a href="#" class="back_top"> <i class="mbri-arrow-up"> </i> </a>


	<!-- JAVASCRIPTS -->
<!--	<script>
	function sendMail() {
    var link = "aitkob@gmail.com"
             + "?cc=aitkobr@outlook.com"
             + "&subject=" + escape("This is my subject")
             + "&body=" + escape(document.getElementById('comments').value)
    ;

    window.location.href = link;
    }
    </script>-->
	<script src="welcome/js/placeholders.min.js"></script>
	<!-- polyfill for the HTML5 placeholder attribute -->
	<script src="welcome/js/main.js"></script>
	<script src="welcome/js/jquery.min.js"></script>
	<script src="welcome/js/popper.min.js"></script>
	<script src="welcome/js/bootstrap.min.js"></script>
	<!--EASING JS-->
	<script src="welcome/js/jquery.easing.min.js"></script>
	<script src="welcome/js/scrollspy.min.js"></script>
	<!-- TYPED -->
	<script src="welcome/js/typed.js"></script>
	<!-- MFP JS -->
	<script src="welcome/js/jquery.magnific-popup.min.js"></script>
	<!--PORTFOLIO FILTER JS-->
	<script src="welcome/js/isotope.js"></script>
	<!--PARTICLES ANIMATE JS-->
	<script src="welcome/js/particles.js"></script>
	<script src="welcome/js/particles.app.js"></script>
	<!-- OWL CAROUSEL -->
	<script src="welcome/js/owl.carousel.min.js"></script>
	<!--CUSTOM JS-->
	<script src="welcome/js/custom.js"></script>
	<script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
	<script>

		$(document).ready(function() {

			@if (app('request')->input('send'))
				$.notify({
					icon: 'ti-pencil',
					message: "<b>Message sent successfully.</b>"

				}, {
					type: 'info',
					timer: 4000
				});
			@endif

		});

		$(".element").each(function() {
			var $this = $(this);
			$this.typed({
				strings: $this.attr('data-elements').split(','),
				typeSpeed: 100,
				backDelay: 3000
			});
		});
	</script>
</body>


</html>
