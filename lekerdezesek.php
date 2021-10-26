<?php

include_once('menu.php');
include_once ('db_fuggvenyek.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <link rel="stylesheet" type="text/css" href="versenyzo.css">
    <title>Lekerdezesek</title>
</HEAD>
<BODY align="center" align="center" link="red" vlink="white"
alink="purple" >
	<font color="white">
<hr>
<?php
echo menu();
?>
<hr>
<h1>1. Lekérdezés</h1>

<h3>A svéd nemzetiségű versenyzők neveit pontszámaik szerint kilistázni, akik meccsét Kovács Ákos vezette:</h3>
<table border="1" align="center" >
<tr>
<th>Versenyző neve</th>
<th>Nemzetisége</th>
<th>Pontszám</th>
<th>Mérkőzés ID</th>
    <th>Bíró neve</th>
</tr>
<?php

$lek1 = lek1();
while($egySor = mysqli_fetch_assoc($lek1)){
    echo '<tr>';
    echo '<td>'. $egySor["nev"].'</td>' ;
	echo '<td>'. $egySor["nemzetiseg"].'</td>' ;
    echo '<td>'. $egySor["pontszam"].'</td>' ;
    echo '<td>'. $egySor["merkozesID"].'</td>' ;
    echo '<td>'. $egySor["biro_neve"].'</td>' ;
    echo '</tr>';
}
?>
</table>
<br>
<hr/>
<h1>2. Lekérdezés</h1>

<h3>Hány nézője volt a Box Kupa mérkőzéseinek külön-külön?</h3>
<table border="1" align="center" >
<tr>
<th>Bajnokság neve</th>
 <th>Mérkőzés ID</th>
  <th>Nézők száma</th>
</tr>
<?php

$lek2 = lek2();
while($egySor = mysqli_fetch_assoc($lek2)){
    echo '<tr>';
    echo '<td>'. $egySor["nev"].'</td>' ;
   	echo '<td>'. $egySor["merkozesID"].'</td>' ;
   	echo '<td>'. $egySor["resztvevokszama"].'</td>' ;
    echo '</tr>';
}
?>
</table>
<br>
<hr/>

<h1>3. Lekérdezés</h1>

<h3>Mi volt a nézők átlag életkora a Box Kupa bajnokságon meccsenkénti felosztásban?</h3>
<table border="1" align="center" >
<tr>
<th>Bajnokság neve</th>
<th>Meccs ID</th>
<th>Átlag Életkor</th>
</tr>
<?php

$lek3 = lek3();
while($egySor = mysqli_fetch_assoc($lek3)){
    echo '<tr>';
    echo '<td>'. $egySor["nev"].'</td>' ;
    echo '<td>'. $egySor["merkozesID"].'</td>' ;
    echo '<td>'. $egySor["atlag"].'</td>' ;
    echo '</tr>';
}
?>
</table>
<br>
<hr/>
</font>
</BODY>
</HTML>
