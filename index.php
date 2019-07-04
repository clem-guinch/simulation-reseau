<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="assets/css/index.css">
	<title>Document</title>
</head>
<body>
	<header>
		<div class="container">
			<img src="images/fb.png" alt="">
			<form class="connectForm" action="/actions/connectAction.php" method="post">
				<div class="connectFormDiv">				
					<label for="email">Adresse e-mail ou mobile</label>
					<input required name="email" type="text">
				</div>
				<div class="connectFormDiv">
					<label for="password">Mot de passe</label>
					<input required name="password" type="password">
					<a href="">Informations de compte oubliées ?</a>
				</div>
				<input class="connect" value="Connexion" type="submit">
			</form>
		</div>
	</header>
	<main>
		<div class="main-container">
		  <div class='left-side<'>
			<h2 class='titre'><span>Avec Facebook, partagez et restez en contact</span><br><span>avec votre entourage.</span></h2>
			<img class="entourage" src="images/entourage.png" alt="">
		  </div>
		</div>
		<div class="second-container">
			<form class="inscription" action="./actions/insertUserAction.php" method="post">
				<h1>Inscription</h1>
				<h3>C’est gratuit (et ça le restera toujours)</h3>
				<div>
				   <div>
					  <input required class="semi" name="prenom" type="text" placeholder="Prénom">
					  <input required class="semi" name="nom" type="text" placeholder="Nom de famille">
					</div>
					<div class="input-full-width">
					   <input required class="full" name="email" type="text" placeholder="e-mail">
					   <input class="full" name="mobile" type="tel" placeholder="Numero de mobile" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}">
					   <input required class="full" name="password" type="password" placeholder="Nouveau mot de passe">
					 </div>
						<h3>Date de naissance</h3>
					   <input class="inputBirthday" placeholder="JJ/MM/AAAA" type="date" name="birthday">
					   <br>
					   <br>
					   <input required name="gender" type="radio" value="femme">
					   <label for="gender">Femme</label>
					   <input required name="gender" type="radio" value="homme">
					   <label for="gender">Homme</label>
					   <p>En cliquant sur Inscription, vous acceptez nos Conditions générales. Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies. Vous recevrez peut-être des notifications par texto de notre part et vous pouvez à tout moment vous désabonner.</p>
					   <input class="submit" type="submit" value="Inscription">
			</form>
		  </div>
		</div>
	 </main>
	 <footer>
	   <img class="footer" src="images/footer.png" alt="">
	 </footer>
</body>
<script type="text/javascript" src="./js/script.js"></script>
</html>
