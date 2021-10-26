<?php

function menu() {

    $menustr  = '<table align="center"  border="1"  cellpadding="7" bgcolor="BC8511" width="100%">';
    $menustr .= '<tr>';
    $menustr .= '<td>';
    $menustr .= '<a href="versenyzo.php" target=”_blank”><b>Versenyzők</b></a>';
    $menustr .= '</td>';
    $menustr .= '<td>';
    $menustr .= '<a href="resztvevo.php" target=”_blank”><b>Résztvevők</b></a>';
    $menustr .= '</td>';
    $menustr .= '<td>';
    $menustr .= '<a href="bajnoksag.php" target=”_blank”><b>Bajnokságok</b></a>';
    $menustr .= '</td>';
    $menustr .= '<td>';
    $menustr .= '<a href="merkozes.php" target=”_blank”><b>Mérkőzések</b></a>';
    $menustr .= '</td>';
    $menustr .= '<td>';
    $menustr .= '<a href="lekerdezesek.php" target=”_blank”><b>Lekérdezések</b></a>';
    $menustr .= '</td>';
    $menustr .= '<td>';
    $menustr .= '</table>';

    return $menustr;

}

?>

