<?php
    include_once 'server.php';
    session_start();
    if(isset($_POST['submit'])){
        $id = $_POST['submit'];
        $note = $_POST['note'];
        $sql = "UPDATE aitiseis SET notes = '$note' WHERE adt = '$id'";
        mysqli_query($conn, $sql); 
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Η αιτιολογία καταχωρήθηκε επιτυχώς');
        window.location.href='diaxeiristis.php';
        </script>");  
    }
?>