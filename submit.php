<?php session_start(); ?>
<?php
include_once 'server.php';
if(isset($_POST['submita']))
{    
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name']; 
    $father_name=$_POST['father_name']; 
    $email=$_POST['email1']; 
    $telephone=$_POST['telephone']; 
    $adt=$_POST['adt']; 
    
    $type_of_studies=$_POST['type_of_studies'];
    $titlos=$_POST['titlos'];
    $country_of_studies=$_POST['country_of_studies'];
    $university=$_POST['university'];
    $department=$_POST['department'];
    $date_start=$_POST['date_start'];
    $date_end=$_POST['date_end'];
    $time_of_studies=$_POST['time_of_studies'];
    $ects=$_POST['ects'];

    $sql1=mysqli_query($conn,"SELECT count(*) as total from aitiseis where adt = '$adt'");
    $row  = mysqli_fetch_array($sql1);
    $data = $row['total'];
    if($data == 1){
        $sql2="DELETE FROM aitiseis WHERE adt = '$adt'";
        mysqli_query($conn, $sql2);
        $sql3="DELETE FROM aitiseis_titlos WHERE adt = '$adt'";
        mysqli_query($conn, $sql3);
    }
    $sql = "INSERT INTO aitiseis (first_name, last_name, father_name, email, telephone, adt, result)
    VALUES ('$first_name', '$last_name', '$father_name', '$email', '$telephone', '$adt', '2')";
    if (mysqli_query($conn, $sql)) {
        $sql = "INSERT INTO aitiseis_titlos (adt, type_of_studies, titlos, country_of_studies, university, department, date_start, date_end, time_of_studies, ects)
        VALUES ('$adt', '$type_of_studies', '$titlos', '$country_of_studies', '$university', '$department', '$date_start', '$date_end', '$time_of_studies', '$ects')";
            if (mysqli_query($conn, $sql)) {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Επιτυχής Καταχώρηση Αίτησης');
                window.location.href='index.php';
                </script>");
            }         
        }
    else {
        echo "error";
     }
     mysqli_close($conn);
}

else if(isset($_POST['submitb']))
{    
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name']; 
    $father_name=$_POST['father_name']; 
    $email=$_POST['email1']; 
    $telephone=$_POST['telephone']; 
    $adt=$_POST['adt']; 
    
    $type_of_studies=$_POST['type_of_studies'];
    $titlos=$_POST['titlos'];
    $country_of_studies=$_POST['country_of_studies'];
    $university=$_POST['university'];
    $department=$_POST['department'];
    $date_start=$_POST['date_start'];
    $date_end=$_POST['date_end'];
    $time_of_studies=$_POST['time_of_studies'];
    $ects=$_POST['ects'];

    $sql = "INSERT INTO aitiseis (first_name, last_name, father_name, email, telephone, adt, result)
    VALUES ('$first_name', '$last_name', '$father_name', '$email', '$telephone', '$adt', '1')";
    if (mysqli_query($conn, $sql)) {
        $sql = "INSERT INTO aitiseis_titlos (adt, type_of_studies, titlos, country_of_studies, university, department, date_start, date_end, time_of_studies, ects)
        VALUES ('$adt', '$type_of_studies', '$titlos', '$country_of_studies', '$university', '$department', '$date_start', '$date_end', '$time_of_studies', '$ects')";
            if (mysqli_query($conn, $sql)) {
                // $file_name = $_FILES['file1']['name'];
                // $file_tmp = $_FILES['file1']['tmp_name'];
                // $sql = "INSERT INTO files(adt, adt_name, adt_type, adt_data) VALUES('$adt', 'file1', 'pdf', '$adtData')";
                // if(mysqli_query($conn, $sql)){
                echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Προσωρινά Αποθηκευμένη Αίτηση');
                    window.location.href='index.php';
                    </script>");
                // }
            }         
        }
    else {
        echo "error";
     }
     mysqli_close($conn);
}
else{
    echo "big error";
}

?>