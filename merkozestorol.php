
<?php


include_once('db_fuggvenyek.php');

$torolt = $_POST["torolt"];

if (isset($torolt)) {

    $sikeres = merkozestorol($torolt);

    if ($sikeres) {
        header('Location: merkozes.php');
    } else {
        echo 'Hiba történt a versenyző törlése során';
    }

} else {
    echo 'Hiba történt a versenyző törlése során';

}

