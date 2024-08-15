<!DOCTYPE html>

<?php
    require_once './db.php';
    $db = new Db();
?>

<html>
    <head>
    <link rel="stylesheet" href="izgled.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    
    <script>
        function obrisiNavijaca(id)
        {
            window.location = "deleteNavijaca.php?id_navijaca=" + id;
        }
        
        function izmeniNavijaca(id)
        {
            window.location = "editNavijaca.php?id_navijaca=" + id;
        }
        
        function dodajTransfer()
        {
            window.location = "dodajTransfer.php";
        }
    </script>
    
    <body>
        <h1> <a class="vrh" href="index.php">Igraci</a>
        <a class="vrh" href="teams.php">Timovi</a>
        <a class="vrh" href="utakmice.php">Utakmice</a>
        <a class="vrh" href="navijaci.php">Navijaci</a>
        <a class="vrh" href="transferi.php">Transferi</a></h1>

        <br>
        <?php
            if(!isset($_GET['search']) || $_GET['search'] == '')
                $transferi = $db->getAllTransferi();
            else
                $transferi = $db->getAllTransferi($_GET['search']);
            
            $table = "<table border='1'>";
            
            $table .= "<tr> <th>Ime igraca</th> <th>Prezime igraca</th> <th>Tim za koji je igrao</th> <th>Tim za koji trenutno igra</th> </tr>";

            foreach ($transferi as $transfer) 
            {
                $table .= "<tr> <td>" . $db->getPlayerById($transfer['id_igraca'])['ime'] . "</td> <td>" . $db->getPlayerById($transfer['id_igraca'])['prezime'] . "</td> <td>" . $db->getTeamById($transfer['id_prethodnog_tima'])['naziv'] . "</td> <td>" . $db->getTeamById($transfer['id_trenutnog_tima'])['naziv'] . "</td> </tr>";
            }
            
            $table .= "</table>";
            
            echo $table;
        ?>
        
        <br>
        <input type='button' name="dodaj" value="Dodaj" onclick="dodajTransfer()">
    </body>
</html>
