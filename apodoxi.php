<?php
    session_start();
    include 'server.php';

    $id = $_POST['submit'];
    $uni = $_POST['university'];
    $dep = $_POST['department'];
    $sql = "INSERT INTO results(adt, university, department) VALUES('$id', '$uni', '$dep')";
    mysqli_query($conn, $sql);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Η αίτηση καραχωρήθηκε επιτυχώς ως αποδεκτή');
    window.location.href='diaxeiristis.php';
    </script>");  
?>