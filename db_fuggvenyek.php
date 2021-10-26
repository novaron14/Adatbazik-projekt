<?php

function championship_csatlakozas() {

    $conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
    if ( false == mysqli_select_db($conn, "championship" )  ) {

        return null;
    }


    mysqli_query($conn, 'SET NAMES UTF-8');
    mysqli_query($conn, 'SET character_set_results=utf8');
    mysqli_set_charset($conn, 'utf8');

    return $conn;

}


//================================================================================================================================
//****************************************************VERSENYZOK*******************************************************************
//================================================================================================================================


function versenyzo_beszur($versenyzoID, $nemzetiseg, $nev, $eletkor, $pontszam, $merkozesID) {


    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"INSERT INTO `versenyző`(`versenyzoID`, `nemzetiseg`, `nev`, `eletkor`, `pontszam`, `merkozesID`) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "issiii", $versenyzoID, $nemzetiseg, $nev, $eletkor, $pontszam, $merkozesID);

    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;

}

function versenyzokiir() {

    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $result = mysqli_query( $conn,"SELECT `versenyzoID`, `nemzetiseg`, `nev`, `eletkor`, `pontszam`, `merkozesID` FROM `versenyző` ");
    mysqli_close($conn);
    return $result;
}

function versenyzotorol($versenyzoID) {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"DELETE FROM `versenyző` WHERE `versenyző`.`versenyzoID` = ?");

    mysqli_stmt_bind_param($stmt, "i", $versenyzoID);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    return $sikeres;
}

function versenyzomod($versenyzoID, $nemzetiseg, $nev, $eletkor, $pontszam, $merkozesID) {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"UPDATE `versenyző` SET `nemzetiseg`=?,`nev`=?,`eletkor`=?,`pontszam`=?, `merkozesID`=? WHERE `versenyzoID` = ? ");

    mysqli_stmt_bind_param($stmt, "ssiiii", $nemzetiseg, $nev, $eletkor, $pontszam, $merkozesID, $versenyzoID);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    return $sikeres;
}

//================================================================================================================================
//****************************************************BAJNOKSÁG******************************************************************
//================================================================================================================================
function bajnoksagotLeker() {

    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $result = mysqli_query( $conn,"SELECT `nev`, `bajnoksagID`, `sportag` FROM `bajnoksag`");
    mysqli_close($conn);
    return $result;
}

function bajnoksagot_beszur($nev, $bajnoksagID, $sportag) {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"INSERT INTO `bajnoksag`(`nev`, `bajnoksagID`, `sportag`) VALUES (?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "sis", $nev, $bajnoksagID, $sportag);
    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function bajnoksagottorol($bajnoksagID) {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"DELETE FROM `bajnoksag` WHERE `bajnoksag`.`bajnoksagID` = ?");

    mysqli_stmt_bind_param($stmt, "i", $bajnoksagID);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    return $sikeres;
}
function bajnoksagkiir() {

    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $result = mysqli_query( $conn,"SELECT `nev`, `bajnoksagID`, `sportag` FROM `bajnoksag` ");
    mysqli_close($conn);
    return $result;
}

//================================================================================================================================
//****************************************************RÉSZTVEVŐK******************************************************************
//================================================================================================================================

function resztvevo_beszur($resztvevoID, $szurkolo_nev, $eletkor, $merkozesID) {


    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"INSERT INTO `résztvevő`(`resztvevoID`, `szurkolo_nev`, `eletkor`, `merkozesID`) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "isii", $resztvevoID, $szurkolo_nev, $eletkor, $merkozesID);

    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;

}

function resztvevokiir() {

    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $result = mysqli_query( $conn,"SELECT `resztvevoID`, `szurkolo_nev`, `eletkor`, `merkozesID` FROM `résztvevő` ");
    mysqli_close($conn);
    return $result;
}

function resztvevotorol($resztvevoID) {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"DELETE FROM `résztvevő` WHERE `résztvevő`.`resztvevoID` = ?");

    mysqli_stmt_bind_param($stmt, "i", $resztvevoID);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    return $sikeres;
}
//================================================================================================================================
//****************************************************MÉRKŐZÉSEK******************************************************************
//================================================================================================================================

function merkozes_beszur($merkozesID, $biro_neve, $helye, $bajnoksagID) {


    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"INSERT INTO `mérkőzés`(`merkozesID`, `biro_neve`, `helye`, `bajnoksagID`) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "issi", $merkozesID, $biro_neve, $helye, $bajnoksagID);

    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;

}

function merkozeskiir() {

    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $result = mysqli_query( $conn,"SELECT `merkozesID`, `biro_neve`, `helye`, `bajnoksagID` FROM `mérkőzés` ");
    mysqli_close($conn);
    return $result;
}

function merkozestorol($merkozesID) {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"DELETE FROM `mérkőzés` WHERE `mérkőzés`.`merkozesID` = ?");

    mysqli_stmt_bind_param($stmt, "i", $merkozesID);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    return $sikeres;
}

function merkozesmod($merkozesID, $biro_neve, $helye, $bajnoksagID) {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $stmt = mysqli_prepare( $conn,"UPDATE `mérkőzés` SET `biro_neve`=?,`helye`=?,`bajnoksagID`=? WHERE `merkozesID` = ? ");

    mysqli_stmt_bind_param($stmt, "ssii", $biro_neve, $helye, $bajnoksagID, $merkozesID);

    $sikeres = mysqli_stmt_execute($stmt);

    mysqli_close($conn);
    return $sikeres;
}


//================================================================================================================================
//****************************************************LEKÉRDEZÉSEK******************************************************************
//================================================================================================================================

function lek1() {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $result = mysqli_query( $conn,"SELECT `versenyző`.`nev`, `versenyző`.`nemzetiseg`, `versenyző`.`pontszam`, `mérkőzés`.`merkozesID`, `mérkőzés`.`biro_neve` FROM `versenyző` , `mérkőzés` 
    WHERE versenyző.merkozesID = mérkőzés.merkozesID and `nemzetiseg` LIKE 'svéd%' and mérkőzés.biro_neve LIKE 'Kovács Ákos%' ORDER BY `pontszam`");

    mysqli_close($conn);
    return $result;
}

function lek2() {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $result = mysqli_query( $conn,"SELECT `bajnoksag`.`nev`, `bajnoksag`.`bajnoksagID`, `mérkőzés`.`merkozesID`, COUNT(`résztvevő`.`resztvevoID`) AS `resztvevokszama` FROM `bajnoksag` , `mérkőzés` , `résztvevő` 
    WHERE bajnoksag.bajnoksagID = mérkőzés.bajnoksagID and mérkőzés.merkozesID = résztvevő.merkozesID and `nev` LIKE 'Box Kupa%' GROUP BY `mérkőzés`.`merkozesID`");

    mysqli_close($conn);
    return $result;
}

function lek3() {
    if ( !($conn = championship_csatlakozas()) ) {
        return false;
    }
    $result = mysqli_query( $conn,"SELECT `bajnoksag`.`nev`, `bajnoksag`.`bajnoksagID`, `mérkőzés`.`merkozesID`, AVG(`résztvevő`.`eletkor`) as `atlag`, `résztvevő`.`resztvevoID` FROM `bajnoksag` , `mérkőzés` , `résztvevő`
    WHERE bajnoksag.bajnoksagID = mérkőzés.bajnoksagID and mérkőzés.merkozesID = résztvevő.merkozesID and `bajnoksag`.`nev` LIKE 'Box Kupa%' GROUP BY `mérkőzés`.`merkozesID`");

    mysqli_close($conn);
    return $result;
}