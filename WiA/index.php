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
							<td><input type="text" name="name"/></td>
						</tr>
						<tr>
							<td>Nazwisko:</td>
							<td><input type="text" name="surname"/></td>
						</tr>
						<tr>
							<td>Wiek:</td>
							<td><input type="text" name="age"/></td>
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
							<td><input type="text" name="pcode"/></td>
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
			$dane = $_POST['name'].", ".$_POST['surname'].", ".$_POST['age'].", ".$_POST['city'].", ".$_POST['pcode'].", ".$_POST['street'];
			if($_POST['name']!=""&& $_POST['surname']!=""&& $_POST['age']!=""&& $_POST['city']!=""&& $_POST['pcode']!=""&& $_POST['street']){
				$plik ='zamowienia\\zamowienie'.date('H-i-s').'.txt';
				$uchwyt = fopen($plik,'a');
				fwrite($uchwyt,$dane);
				fclose($uchwyt);
			}else{
				echo "<center>Podaj Wartość</center>";
			}
			
			
			?>
		</section>
		<section id="mr">
		<fieldset>
				<legend>Zawartosc Foldera zamowienia</legend>
			<?php
			$dir='zamowienia';
			$files=scandir($dir,1);
			for($i=0;$i<5;$i++){
			echo $files[$i].'<br />';
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