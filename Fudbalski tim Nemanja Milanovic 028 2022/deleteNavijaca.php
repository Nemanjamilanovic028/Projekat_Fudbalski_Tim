<?php
    require_once './db.php';
    $db = new Db();
    
    $id_navijaca = $_GET['id_navijaca'];
    
    if($db->deleteNavijaca($id_navijaca))
        header ("Location: navijaci.php");
    else
        echo "<script> alert('Ne mogu da nadjem navijaca sa ovim ID-jem.'); window.location.href = 'navijaci.php'; </script>";
?>