<?php
session_start();
require_once('./db.php');
$comments = getAllComments();


if(isset($_POST['nom'])) {
	$search = findOneUser($_POST['nom']);
}

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Recherche</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
		<?php include("layouts/header.php") ?>

		<!-- Nav -->
		<?php include("layouts/nav.php") ?>

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
					<form class="formSearch" action="/generic.php" method="post">
          				<input type="text" name="nom" placeholder="Rechercher">
          				<button class="buttonSearch" type="submit" name="button"></button>
        			</form>
					</header>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<h2>Resultat de la recherche</h2>
							</header>					
       				 <?php if(isset($search)) {
							foreach($search as $value){
						echo	"<div class='post'>
									<div class='dropdown'>
										<div class='dropdown-content'>
											<a href='./add.php'>Ajouter en amis</a>
											<a href='./block.php'>Bloquer</a>
											<a href='./hide.php'>Masquer cet utilisateur</a>
										</div>
									</div>
								<div class='users'><h2>" . $value['prenom'] . " " . $value['nom'] . "</h2> " . $value['birthday'] . "</div>
							</div>";
						}
					}
						?>
						</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>