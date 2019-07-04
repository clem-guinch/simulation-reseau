	<!-- Nav -->
	<nav id="menu">
	<ul class="links">
		<li><a href="home.php">Home</a></li>
		<li>
		<a href="./user.php"><?php echo $_SESSION['user']['prenom'] . " " . $_SESSION['user']['nom'] ?></a>
		</li>
		<li>
		<a href="./generic.php">Retrouver des amis</a>
		</li>
		<li>
		<a href="./logout.php">Deconnexion</a>
		</li>
		<li>
		<form action='./actions/deleteAcountAction.php' method='POST'>
			<input type='hidden' name='id' value="<?php echo $_SESSION['user']['id']?>">
			<input class="delete" type='submit' value='Supprimer mon compte'>
		</form>
		</li>
	</ul>
	</nav>