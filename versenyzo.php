<?php

include_once('db_fuggvenyek.php');
include_once('menu.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=UTF8" >
	<link rel="stylesheet" type="text/css" href="versenyzo.css" />
	<title>Versenyző</title>
</HEAD>
<BODY align="center" align="center" link="red" vlink="white"
alink="purple" >
	<font color="white">
<hr/>
<?php echo menu();?>
<hr/>

<h1><u>Versenyző felvétele</u></h1>

<form method="POST" action="versenyzofelvitel.php" accept-charset="utf-8">
<table align="center" >
<tr>
<td>Versenyző id: </td>
<td><input type="text" name="versenyzoID" /></td>
</tr>
<tr>
<td>Versenyző nemzetisége: </td>
<td><input type="text" name="nemzetiseg" /></td>
</tr>
<tr>
<td>Versenyző teljes neve: </td>
<td><input type="text" name="nev" /></td>
</tr>
<tr>
<td>Versenyző életkora: </td>
<td><input type="text" name="eletkor" /></td>
</tr>
<tr>
<td>Pontszám: </td>
<td><input type="text" name="pontszam" /></td>
</tr>
<tr>
    <tr>
        <td>Mérkőzései: </td>
        <td><input type="text" name="merkozesID" /></td>
    </tr>
    <tr>
<td></td>
<td><input type="submit" value="Elküld" /></td>
</tr>
</table>
</form>


<hr/>
<h1><u>Versenyzők listázva:</u></h1>

<table border="1" align="center" >
<tr>
<th>Versenyző ID</th>
<th>Nemzetiség</th>
<th>Név</th>
<th>Életkor</th>
<th>Pontszám</th>
    <th>Mérkőzése</th>
<th>Sor Törlése</th>
</tr>

<?php

	$versenyzo = versenyzokiir();
    while( $egySor = mysqli_fetch_assoc($versenyzo) ) {
		echo '<tr>';
		echo '<td>'. $egySor["versenyzoID"] .'</td>';
		echo '<td>'. $egySor["nemzetiseg"] .'</td>';
		echo '<td>'. $egySor["nev"] .'</td>';
		echo '<td>'. $egySor["eletkor"] .'</td>';
		echo '<td>'. $egySor["pontszam"] .'</td>';
        echo '<td>'. $egySor["merkozesID"] .'</td>';
				echo '<td><form method="POST" action="versenyzotorol.php">
				<input type="hidden" name="torolt" value="'.$egySor["versenyzoID"].'" />
				<input type="submit" value="Törlése" />
		    	</form></td>';
		echo '</tr>';
	}
	mysqli_free_result($versenyzo);

?>
</table>
<br>
<hr/>

<h1><u>Versenyző Módosítása ID alapján</u></h1>

<table border="1" align="center">
<tr>
<th>versenyzoID</th>
<th>nemzetiseg</th>
<th>nev</th>
<th>eletkor</th>
<th>pontszam</th>
    <th>merkozesID</th>
<th>Módosítás</th>
</tr>

<?php

	$versenyzo = versenyzokiir();
    while( $egySor = mysqli_fetch_assoc($versenyzo) ) {
		echo '<tr>';
		echo '<td>'. $egySor["versenyzoID"] .'</td>';
		echo '<td><form method="POST" action="versenyzomod.php">
				<input type="hidden" name="versenyzoID" value="'.$egySor["versenyzoID"].'" />
				<input type="text" name="nemzetiseg" value="'.$egySor["nemzetiseg"].'" />
				<td><input type="text" name="nev" value="'.$egySor["nev"].'" />
				<td><input type="text" name="eletkor" value="'.$egySor["eletkor"].'" />
				<td><input type="text" name="pontszam" value="'.$egySor["pontszam"].'" />
				<td><input type="text" name="merkozesID" value="'.$egySor["merkozesID"].'" />
				<td><input type="submit" value="Módosít" />
		    	</form></td>';
		echo '</tr>';
	}
	mysqli_free_result($versenyzo);

?>


</table>
</font>
</BODY>
</HTML>
