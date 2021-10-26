<?php


include_once("db_fuggvenyek.php");

$v_versenyzoID = $_POST['versenyzoID'];
$v_nemzetiseg = $_POST['nev'];
$v_nev = $_POST['nemzetiseg'];
$v_eletkor = $_POST['eletkor'];
$v_pontszam = $_POST['pontszam'];
$v_merkozesID = $_POST['merkozesID'];

if (isset($v_versenyzoID) && isset($v_nemzetiseg) && isset($v_nev) && isset($v_eletkor) && isset($v_pontszam) && isset($v_merkozesID)) {

    // beszúrjuk az új rekordot az adatbázisba
    versenyzo_beszur($v_versenyzoID, $v_nev, $v_nemzetiseg, $v_eletkor, $v_pontszam, $v_merkozesID);

    // visszatérünk az index.php-re
    header("Location: versenyzo.php");

} else {
    error_log("Nincs beállítva valamely érték");

}


