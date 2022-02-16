<?php 
    session_start(); 

    if((isset($_SESSION["loggedin"])==false) || $_SESSION["loggedin"] === false){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Απαιτείται Σύνδεση');
        window.location.href='login.php';
        </script>"); 
        exit;
    }
    include_once 'server.php';
    
    $email = $_SESSION['email'];

    $sql = mysqli_query($conn,"SELECT adt FROM users WHERE email = '$email' ");
    $row  = mysqli_fetch_array($sql);
    $id = $row['adt'];

    $sql1 = mysqli_query($conn,"SELECT count(*) as total FROM aitiseis WHERE adt = '$id'"); 
    $row = mysqli_fetch_assoc($sql1);
    $sum = $row['total'];

    $sql2 = mysqli_query($conn,"SELECT result FROM aitiseis WHERE adt = '$id'"); 
    $row2 = mysqli_fetch_assoc($sql2);
    $pososto = $row2['result'];   
    if($sum == 0){
        header("Location: aitisi1.php");
        exit();}
    if($pososto == 1){
        header("Location: prosorini.php");
        exit();}
    else if($pososto == 2){
        header("Location: oristiki.php");
        exit();}
    else{
        header("Location: aitisi2.php");
        exit();}
?>
