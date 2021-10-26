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
			<title>Bajnokság</title>
</HEAD>
<BODY align="center" align="center" link="red" vlink="white"
alink="purple">	<font color="white">

<hr/>
<?php echo menu();?>
<hr/>

<h1>Bajnokság felvétele</h1>

<form method="POST" action="bajnoksagfelvitel.php" accept-charset="utf-8">
<table align="center">
<tr>
<td>Bajnokság neve: </td>
<td><input type="text" name="nev" /></td>
</tr>
<tr>
<td>Bajnsokág ID-je: </td>
<td><input type="text" name="bajnoksagID" /></td>
</tr>
<tr>
<td>Sportág: </td>
<td> <input type="text" name="sportag" /></td>
    <td><input type="submit" value="Elküld" /></td>
</tr>
<tr>
</table>
</form>


<hr/>
<h1>Bajnokságok listázva:</h1>

<table border="1" align="center">
<tr>
<th>Név</th>
<th>ID</th>
<th>sportág</th>
</tr>

<?php

	$bajnoksag = bajnoksagkiir(); // ez egy eredményhalmazt ad vissza

	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($bajnoksag) ) {
		echo '<tr>';
		echo '<td>'. $egySor["nev"] .'</td>';
		echo '<td>'. $egySor["bajnoksagID"] .'</td>';
		echo '<td>'. $egySor["sportag"] .'</td>';
		echo '<td><form method="POST" action="bajnoksagtorol.php">
				<input type="hidden" name="torolt" value="'.$egySor["bajnoksagID"].'" />
				<input type="submit" value="Törlése" />
		    	</form></td>';
		echo '</tr>';
	}
	mysqli_free_result($bajnoksag); // töröljük a listát a memóriából

?>
</table>
<br>
<hr/>
<br>
</font>
</BODY>
</HTML>