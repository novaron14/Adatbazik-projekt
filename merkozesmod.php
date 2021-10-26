<?php


include_once('db_fuggvenyek.php');

$merkozesID = $_POST["merkozesID"];
$biro_neve = $_POST["biro_neve"];
$helye = $_POST["helye"];
$bajnoksagID = $_POST["bajnoksagID"];



if (isset($merkozesID) && isset($biro_neve) && isset($helye) && isset($bajnoksagID)) {

    $sikeres = merkozesmod($merkozesID, $biro_neve, $helye, $bajnoksagID);

    if ($sikeres) {
        header('Location: merkozes.php');
    } else {
        echo 'Hiba történt a szemely módosítása során';
    }

} else {
    echo 'Hiba történt a szemely módosítása során';

}

