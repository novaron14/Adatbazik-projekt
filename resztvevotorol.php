<?php


include_once('db_fuggvenyek.php');

$torolt = $_POST["torolt"];

if (isset($torolt)) {

    $sikeres = resztvevotorol($torolt);

    if ($sikeres) {
        header('Location: resztvevo.php');
    } else {
        echo 'Hiba történt a résztvevő törlése során';
    }

} else {
    echo 'Hiba történt a résztvevő törlése során';

}

