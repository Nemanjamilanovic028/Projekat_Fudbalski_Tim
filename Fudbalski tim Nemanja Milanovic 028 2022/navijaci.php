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
        
        function dodajNavijaca()
        {
            window.location = "addNavijaca.php";
        }
    </script>
    
    <body>
        <h1> <a class="vrh" href="index.php">Igraci</a>
        <a class="vrh" href="teams.php">Timovi</a>
        <a class="vrh" href="utakmice.php">Utakmice</a>
        <a class="vrh" href="navijaci.php">Navijaci</a>
        <a class="vrh" href="transferi.php">Transferi</a></h1>
        
        <form class="tabela" method="get" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type='text' placeholder="pretraga" name='search' value='<?php if(isset($_GET['search'])) echo $_GET['search']?>'>
            <input type='submit' value='Pretrazi'>
        </form>
        <br>
        <?php
            if(!isset($_GET['search']) || $_GET['search'] == '')
                $navijaci = $db->getAllNavijaci();
            else
                $navijaci = $db->getAllNavijaci($_GET['search']);
            
            $table = "<table border='1'>";
            
            $table .= "<tr> <th>Ime</th> <th>Prezime</th> <th>Tim za koji navija</th> <th></th> </tr>";

            foreach ($navijaci as $navijac) 
            {
                $table .= "<tr> <td>" . $navijac['ime'] . "</td> <td>" . $navijac['prezime'] . "</td> <td>" . $db->getTeamById($navijac['id_tima'])['naziv'] . "</td> <td><input type='button' value='obrisi' onclick='obrisiNavijaca(".$navijac['id'].")'> <input type='button' value='izmeni' onclick='izmeniNavijaca(".$navijac['id'].")'></td> </tr>";
            }
            
            $table .= "</table>";
            
            echo $table;
        ?>
        
        <br>
        <input type='button' name="dodaj" value="Dodaj" onclick="dodajNavijaca()">
    </body>
</html>
