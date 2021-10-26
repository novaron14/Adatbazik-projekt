<?php

include_once('db_fuggvenyek.php');
include_once('menu.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <link rel="stylesheet" type="text/css" href="versenyzo.css" />
    <title>Mérkőzés</title>
</HEAD>
<BODY align="center" align="center" link="red" vlink="white"
      alink="purple" >
<font color="white">
    <hr/>
    <?php echo menu();?>
    <hr/>

    <h1><u>Mérkőzés felvétele</u></h1>

    <form method="POST" action="merkozesfelvitel.php" accept-charset="utf-8">
        <table align="center" >
            <tr>
                <td>Mérkőzés id: </td>
                <td><input type="text" name="merkozesID" /></td>
            </tr>
            <tr>
                <td>Bíró neve: </td>
                <td><input type="text" name="biro_neve" /></td>
            </tr>
            <tr>
                <td>helye: </td>
                <td><input type="text" name="helye" /></td>
            </tr>
            <tr>
                <td>Bajnokság ID: </td>
                <td><input type="text" name="bajnoksagID" /></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Elküld" /></td>
            </tr>
        </table>
    </form>


    <hr/>
    <h1><u>Mérkőzések listázva:</u></h1>

    <table border="1" align="center" >
        <tr>
            <th>Mérkőzés ID</th>
            <th>Bíró neve</th>
            <th>Helye</th>
            <th>Bajnokság ID</th>
            <th>Sor Törlése</th>
        </tr>

        <?php

        $merkozes = merkozeskiir();
        while( $egySor = mysqli_fetch_assoc($merkozes) ) {
            echo '<tr>';
            echo '<td>'. $egySor["merkozesID"] .'</td>';
            echo '<td>'. $egySor["biro_neve"] .'</td>';
            echo '<td>'. $egySor["helye"] .'</td>';
            echo '<td>'. $egySor["bajnoksagID"] .'</td>';
            echo '<td><form method="POST" action="merkozestorol.php">
				<input type="hidden" name="torolt" value="'.$egySor["merkozesID"].'" />
				<input type="submit" value="Törlése" />
		    	</form></td>';
            echo '</tr>';
        }
        mysqli_free_result($merkozes);

        ?>
    </table>
    <br>
    <hr/>

    <h1><u>Mérkőzés módosítása ID alapján</u></h1>

    <table border="1" align="center">
        <tr>
            <th>merkozesID</th>
            <th>biro_neve</th>
            <th>helye</th>
            <th>bajnoksagID</th>
            <th>Módosítás</th>
        </tr>

        <?php

        $merkozes = merkozeskiir();
        while( $egySor = mysqli_fetch_assoc($merkozes) ) {
            echo '<tr>';
            echo '<td>'. $egySor["merkozesID"] .'</td>';
            echo '<td><form method="POST" action="merkozesmod.php">
				<input type="hidden" name="merkozesID" value="'.$egySor["merkozesID"].'" />
				<input type="text" name="biro_neve" value="'.$egySor["biro_neve"].'" />
				<td><input type="text" name="helye" value="'.$egySor["helye"].'" />
				<td><input type="text" name="bajnoksagID" value="'.$egySor["bajnoksagID"].'" />
				<td><input type="submit" value="Módosít" />
		    	</form></td>';
            echo '</tr>';
        }
        mysqli_free_result($merkozes);

        ?>


    </table>
</font>
</BODY>
</HTML>
