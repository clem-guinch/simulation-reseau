<?php
session_start();
require_once('./db.php');
$comments = getAllComments();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css" />
    <title></title>
  </head>
  <body>
    <input type="hidden" value="<?php echo $_SESSION['user']['id'] ?>" id="user-id">
	<!-- Header -->
	<?php include("layouts/header.php") ?>
      
	<!-- Nav -->
	<?php include("layouts/nav.php") ?>

	<!-- Banner -->
		<section class="banner full">
			<article>
				<img src="images/slide01.jpg" alt="" />
				<div class="inner">
					<header>
						<p>A free responsive web site template by <a href="https://templated.co">TEMPLATED</a></p>
						<h2>Hielo</h2>
					</header>
				</div>
			</article>
			<article>
				<img src="images/slide02.jpg" alt="" />
				<div class="inner">
					<header>
						<p>Lorem ipsum dolor sit amet nullam feugiat</p>
						<h2>Magna etiam</h2>
					</header>
				</div>
			</article>
			<article>
				<img src="images/slide03.jpg"  alt="" />
				<div class="inner">
					<header>
						<p>Sed cursus aliuam veroeros lorem ipsum nullam</p>
						<h2>Tempus dolor</h2>
					</header>
				</div>
			</article>
			<article>
				<img src="images/slide04.jpg"  alt="" />
				<div class="inner">
					<header>
						<p>Adipiscing lorem ipsum feugiat sed phasellus consequat</p>
						<h2>Etiam feugiat</h2>
					</header>
				</div>
			</article>
			<article>
				<img src="images/slide05.jpg"  alt="" />
				<div class="inner">
					<header>
						<p>Ipsum dolor sed magna veroeros lorem ipsum</p>
						<h2>Lorem adipiscing</h2>
					</header>
				</div>
			</article>
	</section>
      
	<!-- One -->
	<div class="separator"></div>
	<div class="middle">
		<header class="align-center">
			<p class="special">Ici laisse libre court a ton esprit critique, partage tes connaissances.</p>
			<h2>Espace Forum</h2>
			</header>
		<div class="separator"></div>
		<form class="formPublication" id='insertComment' action="./actions/insertCommentAction.php" method="post">
			<div id="button-container" class="button-container">
				<button type="submit" name="button">Publier</button>
				<button type="button" name="button"><img class="icons">Identifier des Personnes</button>
				<button type="button" id="buttonAddImage" name="button"><img class="icons">Ajouter une photo</button>
			</div>
			<input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>">
			<textarea id='inpuTextarea' placeholder="Commentaire..." name="commentaire" rows="8" cols="80"></textarea>
		</form>
	</div>
	<div class="separator"></div>
	<section id="one" class="wrapper style2">
		<div class="inner">
			<div class="grid-style">
			<?php foreach($comments as $key => $comment){
				?>
				<div>
					<div class="box size">
						<div class="image fit size">
							<img src="<?php echo $comment['image']; ?>" alt="" />
						</div>
						<div class="content">
							<header class="align-center">
								<p>publication de :</p>
								<h2><?php echo $comment['prenom']; ?> <?php echo $comment['nom'];?></h2>
							</header>
							<?php $newtext = wordwrap($comment['text'], 50, "\r", true); ?>
							<p><?php echo $newtext; ?></p>
							<footer class="align-center">
							<div class='actions'>
							<?php if($_SESSION['user']['role_id'] == 1 || $_SESSION['user']['id']== $comment['user_id']) {?>
								<form action='./actions/deletePostAction.php' method='POST'>
									<input type='hidden' name='id' value='<?php echo $comment['id']; ?>'>
									<button type='submit' value='Supprimer'>Supprimer</button>
								</form>
								<?php
								}
								?>
								<?php if($_SESSION['user']['role_id'] == 1 || $_SESSION['user']['id'] == $comment['user_id']) {?>
								<button id="buttonUpdate" data-postid="<?php echo $comment['id'] ?>" data-url="<?php echo $comment['image'] ?>" data-value="<?php echo $comment['text'] ?>">
									Modifier
								</button>
								<?php } ?>
							</div>
							</footer>
						</div>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</section>
	<!-- Two -->
		<section id="two" class="wrapper style3">
			<div class="inner">
				<header class="align-center">
					<p>Nam vel ante sit amet libero scelerisque facilisis eleifend vitae urna</p>
					<h2>Morbi maximus justo</h2>
				</header>
			</div>
		</section>

		<!-- Three -->
		<section id="three" class="wrapper style2">
			<div class="inner">
				<header class="align-center">
					<p class="special">Nam vel ante sit amet libero scelerisque facilisis eleifend vitae urna</p>
					<h2>Morbi maximus justo</h2>
				</header>
				<div class="gallery">
					<div>
						<div class="image fit">
							<a href="#"><img src="images/pic01.jpg" alt="" /></a>
						</div>
					</div>
					<div>
						<div class="image fit">
							<a href="#"><img src="images/pic02.jpg" alt="" /></a>
						</div>
					</div>
					<div>
						<div class="image fit">
							<a href="#"><img src="images/pic03.jpg" alt="" /></a>
						</div>
					</div>
					<div>
						<div class="image fit">
							<a href="#"><img src="images/pic04.jpg" alt="" /></a>
						</div>
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
