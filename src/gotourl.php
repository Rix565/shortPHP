<?php
include "libs/base_style.php";
include "libs/connect.php";
include "libs/id_gen.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>shortPHP - le redirecteur d'url open source !</h1>
	<h3>Allez vers l'url</h3>
	<div id="container">
		<form method='post'>
			<input type="text" name="id" placeholder="ID de l'url" id='id' required>
			<button>Aller vers l'url</button>
		</form>
		<?php
		if(isset($_POST['id'])){
			if(!empty($_POST['id'])){
				$request = $db->prepare("SELECT * FROM `url` WHERE `id` = :id");
				$request->execute([
					'id' => $_POST['id'],
				]);
				$result = $request->fetchAll();
				if($result = $_POST['id']){
					if($_POST['id'])
					$request2 = $db->prepare("SELECT * FROM `url` WHERE `id` = :id");
					$request2->execute([
						'id' => $_POST['id'],
					]);
					$result2 = $request2->fetch();
					header("Location: http://" .$result2['url']);
				}
			}
		}
		?>
	</div>
</body>
</html>