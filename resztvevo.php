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
			<title>Résztvevők</title>
</HEAD>
<BODY align="center" align="center" link="red" vlink="white"
alink="purple">	<font color="white">

<hr/>
<?php echo menu();?>
<hr/>

<h1>Résztvevő felvétele</h1>

<form method="POST" action="resztvevofelvitel.php" accept-charset="utf-8">
<table align="center">
<tr>
<td>Résztvevő ID-je: </td>
<td><input type="text" name="resztvevoID" /></td>
</tr>
<tr>
<td>Neve: </td>
<td><input type="text" name="szurkolo_nev" /></td>
</tr>
<tr>
<td>Életkora: </td>
    <td><input type="text" name="eletkor" /></td>
</tr>
    </tr>
    <tr>
        <td>Mérkőzés ID: </td>
        <td><input type="text" name="merkozesID" /></td>
    </tr>
    <tr>
    <td><input type="submit" value="Elküld" /></td>
    </tr>
</table>
</form>


<hr/>
<h1>Résztvevők listázva:</h1>

<table border="1" align="center">
<tr>
<th>Résztvevő ID</th>
<th>Neve</th>
<th>Életkora</th>
    <th>Mérkőzés ID</th>
</tr>

<?php

	$resztvevo = resztvevokiir(); // ez egy eredményhalmazt ad vissza

	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($resztvevo) ) {
		echo '<tr>';
		echo '<td>'. $egySor["resztvevoID"] .'</td>';
		echo '<td>'. $egySor["szurkolo_nev"] .'</td>';
		echo '<td>'. $egySor["eletkor"] .'</td>';
        echo '<td>'. $egySor["merkozesID"] .'</td>';
		echo '<td><form method="POST" action="resztvevotorol.php">
				<input type="hidden" name="torolt" value="'.$egySor["resztvevoID"].'" />
				<input type="submit" value="Törlése" />
		    	</form></td>';
		echo '</tr>';
	}
	mysqli_free_result($resztvevo); // töröljük a listát a memóriából

?>
</table>
<br>
<hr/>
<br>
</font>
</BODY>
</HTML>