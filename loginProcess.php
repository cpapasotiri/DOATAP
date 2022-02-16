<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Ο χρήστης είναι ήδη συνδεδεμένος');
    window.location.href='index.php';
    </script>"); 
    exit;
}

if(isset($_POST['save']))
{
    extract($_POST);
    include 'server.php';
    $sql=mysqli_query($conn,"SELECT * FROM users where email='$email' and password1='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["loggedin"] = true;
        $_SESSION["first_name"]=$row['first_name'];
        $_SESSION["last_name"]=$row['last_name']; 
        $_SESSION["adt"]=$row['adt']; 
        $_SESSION["telephone"]=$row['telephone']; 
        $_SESSION["email"]=$row['email']; 
        $_SESSION["password1"]=$row['password1']; 
     
        if($row["typos"] == 2){
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Επιτυχής Σύνδεση Διαχειριστή');
                window.location.href='diaxeiristis.php';
                </script>");          
        }
        
        else{
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Επιτυχής Σύνδεση');
                window.location.href='index.php';
                </script>"); 
        }
    }
    else
    {
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Invalid Email or Password');
        window.location.href='index.php';
        </script>"); 
    }
}
?>