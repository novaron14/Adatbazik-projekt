<?php


include_once("db_fuggvenyek.php");

$v_merkozesID = $_POST['merkozesID'];
$v_biro_neve = $_POST['biro_neve'];
$v_helye = $_POST['helye'];
$v_bajnoksagID = $_POST['bajnoksagID'];


if (isset($v_merkozesID) && isset($v_biro_neve) && isset($v_helye) && isset($v_bajnoksagID)) {

// beszúrjuk az új rekordot az adatbázisba
merkozes_beszur($v_merkozesID, $v_biro_neve, $v_helye, $v_bajnoksagID);

// visszatérünk az index.php-re
header("Location: merkozes.php");

} else {
error_log("Nincs beállítva valamely érték");

}