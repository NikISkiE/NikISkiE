<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Zadanie</title>
		<link rel="stylesheet" href="styl.css" />
	</head>
	<body>
		<section id="nl"><h3>Imie I nazwisko</h3></section>
		<section id="nr">LOGO</section>
		<section id="ml">
			<form action="" method="POST">
				<fieldset id="f1">
					<legend>dane</legend>
					<table>
						<tr>
							<td>Imie:</td>
							<td><input type="text" name="imie"/></td>
						</tr>
						<tr>
							<td>Nazwisko:</td>
							<td><input type="text" name="surname"/></td>
						</tr>
						<tr>
							<td>Wiek:</td>
							<td><input type="number" name="age"/></td>
						</tr>
					</table>
				</fieldset>
				<fieldset id="f2">
					<legend>adres</legend>
					<table>
						<tr>
							<td>Miasto:</td>
							<td><input type="text" name="city"/></td>
						</tr>
						<tr>
							<td>Kod. Poczt:</td>
							<td><input type="number" name="pcode" pattern="[0-9]{2}[-][0-9]{3}" /></td>
						</tr>
						<tr>
							<td>Ulica:</td>
							<td><input type="text" name="street"/></td>
						</tr>
					</table>
				</fieldset>
				<center><button type="submit">Wyślij</button></center>
			</form>
			<?php
			if(isset($_POST['imie'],$_POST['surname'],$_POST['age'],$_POST['city'],$_POST['pcode'],$_POST['street'])){
			if($_POST['imie']!=""&& $_POST['surname']!=""&& $_POST['age']!=""&& $_POST['city']!=""&& $_POST['pcode']!=""&& $_POST['street']){
				$dane = ucfirst(strtolower($_POST['imie'])).", ".ucfirst(strtolower($_POST['surname'])).", ".$_POST['age'].", ".ucfirst(strtolower($_POST['city'])).", ".$_POST['pcode'].", ".ucfirst(strtolower($_POST['street']));
				$plik ='zamowienia\\zamowienie'.date('H-i-s').'.txt';
				$uchwyt = fopen($plik,'a');
				fwrite($uchwyt,$dane);
				fclose($uchwyt);
				header('Location: index.php');
			}else{
				echo "<center>Podaj Wartość</center>";
			}
			}
			?>
		</section>
		<section id="mr">
		<fieldset>
				<legend>Zawartosc Foldera zamowienia</legend>
			<?php
			$dir='zamowienia';
			if(!file_exists($dir)){
				mkdir($dir);
			}else if($dir!=""){
			$allFiles=scandir($dir,1);
			$files = array_diff($allFiles, array('.', '..'));
			foreach($files as $file){
			echo $file.'<br />';
			}
			}else{
				echo "Zatwierdz formularz";
			}
			?>
			</fieldset>
		</section>
		<section id="f">
			<?php
			echo 'Obecnie otwarty plik '.basename(__FILE__, '.php').'.php'; 
			echo '<text id="hour">'.date("jS \of F Y H:i:s A").'</text>'
			?>
		</section>
	</body>
</html>
