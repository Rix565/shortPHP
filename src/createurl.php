<?php
include "libs/base_style.php";
include "libs/connect.php";
include "libs/id_gen.php";

?>
<!DOCTYPE html>
<html>
<body>
	<h1>shortPHP - le redirecteur d'url open source !</h1>
	<h3>Créer un redirecteur d'url</h3>
	<p>Url :</p>
	<div id="container">
		<form method='post'>
			<input type="text" name="url" placeholder="URL" id="url" required/>
			<button>Partager l'url</button>
		</form>
		<?php
		if(isset($_POST['url'])){
			if(!empty($_POST['url'])){
				$id = password_generator(13,1,1);
				$request = $db->prepare("INSERT INTO `url`(`id`, `url`) VALUES (:id, :url)");
				$request->execute([
					"id" => $id,
					"url" => $_POST['url'],
				]);
				echo '<p class="success">Partage de votre url terminé ! ID :' .$id;
			}
		}
		?>
	</div>
</body>
</html>