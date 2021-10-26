<?php


include_once('db_fuggvenyek.php');

$torolt = $_POST["torolt"];

if (isset($torolt)) {

    $sikeres = bajnoksagottorol($torolt);

    if ($sikeres) {
        header('Location: bajnoksag.php');
    } else {
        echo 'Hiba történt a tanár törlése során';
    }

} else {
    echo 'Hiba történt a tanár törlése során';

}

