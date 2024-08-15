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
        function proveri()
        {
            id_igraca = document.getElementById('id_igraca').value;
            id_tima_iz_kog_odlazi = document.getElementById('id_tima_iz_kog_odlazi').value;
            id_tima_iz_kog_odlazi = document.getElementById('id_tima_iz_kog_odlazi').value;
            
            if(id_igraca == '' || id_tima_iz_kog_odlazi == '' || id_tima_iz_kog_odlazi == '')
                alert('Polja ne mogu biti prazna');
            /*else if(!Number.isInteger(id_igraca) && !Number.isInteger(id_tima_iz_kog_odlazi) && !Number.isInteger(id_tima_iz_kog_odlazi))
            {
                alert('vrednosti moraju biti int');
                return false;
            }*/
            else
                return false;
        }
    </script>
    
    <body>
        <h1 class="dodavanje_igraca">Dodavanje transfera:</h1>
        <form id="myForm" method="get">
            <a class="stranice" href="transferi.php">Nazad na stranicu Transferi</a>
            <br><br>    
            <p class="sve">Id igraca: </p> <input type="text" name="id_igraca" id="id_igraca">
            <br>
            <br>
            <p class="sve">Id tima iz kog odlazi: </p><input type="text" name="id_tima_iz_kog_odlazi" id="id_tima_iz_kog_odlazi">
            <br><br>
            <p class="sve">Id tima u koji dolazi: </p><input type="text" name="id_tima_u_koji_dolazi" id="id_tima_u_koji_dolazi">
            <br><br>
            <!-- <input type="submit" value="Dodaj" onclick="proveri()"> -->
           <button class="dugme_dodaj" onclick="proveri()">Dodaj </button>
        </form>
        
        <?php
            if(isset($_GET['id_igraca']))
            {
                $id_igraca = $_GET['id_igraca'];
                $id_tima_iz_kog_odlazi = $_GET['id_tima_iz_kog_odlazi'];
                $id_tima_u_koji_dolazi = $_GET['id_tima_u_koji_dolazi'];
                
                $db->addTransfer($id_igraca, $id_tima_iz_kog_odlazi, $id_tima_u_koji_dolazi);
                header("Location: transferi.php");
            }
        ?>
    </body>
</html>
