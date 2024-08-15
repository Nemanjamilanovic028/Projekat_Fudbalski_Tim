<!DOCTYPE html>
<?php
    require_once './db.php';
    $db = new Db();
    $navijac = $db->getNavijacById($_GET['id_navijaca']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Izmena podataka o navijacu</h1>
        
        <form method='get' action='<?php $_SERVER['PHP_SELF']; ?>'>
            <input type="hidden" name="id_navijaca" value="<?php echo $_GET['id_navijaca'] ?>"><br>
            Ime: <input type='text' name='ime' value="<?php echo $navijac['ime'] ?>"><br>
            Prezime: <input type='text' name='prezime' value="<?php echo $navijac['prezime'] ?>"><br>
            Id  tima: <input type='text' name='id_tima' value="<?php echo $navijac['id_tima'] ?>"><br>
            <input type='submit' value='Izmeni' ><br>
        </form>
        
        <?php
            if(isset($_GET['ime']))
            {
                if($db->updateNavijaca($_GET['id_navijaca'], $_GET['ime'], $_GET['prezime'], $_GET['id_tima']))
                        echo "USPESNA IZMENA PODATAKA";
                else
                        echo "NEUSPESNA IZMENA PODATAKA";
            }
        ?>
        
        <a href='navijaci.php'>Pocetna strana</a>
    </body>
</html>
