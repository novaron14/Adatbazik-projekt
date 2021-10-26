<?php


include_once('db_fuggvenyek.php');

$versenyzoID = $_POST["versenyzoID"];
$nemzetiseg = $_POST["nemzetiseg"];
$nev = $_POST["nev"];
$eletkor = $_POST["eletkor"];
$pontszam = $_POST["pontszam"];
$merkozesID = $_POST["merkozesID"];


if (isset($versenyzoID) && isset($nemzetiseg) && isset($nev) && isset($eletkor) && isset($pontszam) && isset($merkozesID)) {

    $sikeres = versenyzomod($versenyzoID, $nemzetiseg, $nev, $eletkor, $pontszam, $merkozesID);

    if ($sikeres) {
        header('Location: versenyzo.php');
    } else {
        echo 'Hiba történt a szemely módosítása során';
    }

} else {
    echo 'Hiba történt a szemely módosítása során';

}

