<?php


include_once("db_fuggvenyek.php");

$v_nev = $_POST['nev'];
$v_bajnoksagID = $_POST['bajnoksagID'];
$v_sportag = $_POST['sportag'];

if (isset($v_nev) && isset($v_bajnoksagID) && isset($v_sportag)) {

    bajnoksagot_beszur($v_nev, $v_bajnoksagID, $v_sportag);

    header("Location: bajnoksag.php");

} else {
    error_log("Nincs beállítva valamely érték");

}


