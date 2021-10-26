<?php


include_once("db_fuggvenyek.php");
$v_resztvevoID = $_POST['resztvevoID'];
$v_szurkolo_nev = $_POST['szurkolo_nev'];
$v_eletkor = $_POST['eletkor'];
$v_merkozesID = $_POST['merkozesID'];

if (isset($v_resztvevoID) && isset($v_szurkolo_nev) && isset($v_eletkor) && isset($v_merkozesID)){


    resztvevo_beszur($v_resztvevoID, $v_szurkolo_nev, $v_eletkor, $v_merkozesID);

    header("Location: resztvevo.php");

} else {
    error_log("Nincs beállítva valamely érték");

}

