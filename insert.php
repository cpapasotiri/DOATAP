<?php session_start(); ?>
<?php
include_once 'server.php';
if(isset($_POST['submit']))
{    
     $name = $_POST['name'];
     $lname = $_POST['lname'];
     $adt = $_POST['adt'];
     $email = $_POST['email'];
     $mobile = $_POST['telephone'];
     $passw = $_POST['pass'];
     $sql = "INSERT INTO users (first_name, last_name, adt, telephone,email,password1,typos)
     VALUES ('$name','$lname', '$adt','$mobile','$email','$passw', '0')";
     if (mysqli_query($conn, $sql)) {
        echo ("<script LANGUAGE='JavaScript'>
            window.alert('Επιτυχής Εγγραφή Νέου Χρήστη');
            window.location.href='index.php';
            </script>");
        } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>