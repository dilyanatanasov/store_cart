<?php
session_start();
require_once "addTocart.php";

$error = "";

if(isset($_POST) && !empty($_POST)){
	if(isset($_POST['add'])){
		if($_POST['item'] != "" && $_POST['quantity'] != ""){
			$item = $_POST['item'];
			$quantity = $_POST['quantity'];
			$add = $_POST['add'];
			cart($item, $quantity, 1, 0);
		}else{
			$error = "Попълнете всички полета";
		}
	}else if(isset($_POST['remove'])){
		cart(0, 0, 0, 1);
	}else{
		$error = "Попълнете всички полета";
	}
}

 $now = gmdate('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Пазарна количка</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" type="img/png" href="logo.png">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="container">
		<div id="elements">
			<div id="heading">
				<h1>Моята количка</h1>
				<img src="logo.png">
			</div>
			<div id="table">
				<form action="index.php" method="POST">
					<select name="item">
						<option value="">-</option>
						<option value="1">iPhone Xs MAX</option>
						<option value="2">One Plus 6T</option>
						<option value="3">Xiaomi Mi Mix 3</option>
					</select>
					<input type="number" name="quantity" min="-10000" placeholder="Количество"><br>
					<button type="submit" name="add">Добави в количката</button>
					<button type="submit" name="remove">Премахни от количката</button>
				</form>
				<table>
					<tr>
						<th>Продукт</th>
						<th>Количество</th>
					</tr>
					<?php
				
					if(!empty($_SESSION)){
						$sess = $_SESSION;
						$empty = 0;
						foreach ($sess as $key => $orders) {
							if($orders[1] == 0){
								$empty += $orders[1];
							}else{
								echo "<tr>
										<td>".$orders[0]."</td>
										<td>".$orders[1]."</td>
									</tr>";	
								$empty += 1;
							}
						}

						if($empty < 1){
							echo "<tr>
								<td colspan='2'>Нямате нищо добавено към вашата количка</td>
							</tr>";
						}
					}else{
						echo "<tr>
								<td colspan='2'>Нямате нищо добавено към вашата количка</td>
							</tr>";
					}

					if($error != ""){
						echo "<p class='default'>".$error."</p>";
					}
				?>
				</table>
			</div>
		</div>
	<div>
</body>
</html>

<?php

