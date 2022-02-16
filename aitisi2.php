<?php
    include_once 'server.php';
    session_start();

    $email = $_SESSION['email'];

    $sql = mysqli_query($conn,"SELECT adt FROM users WHERE email = '$email' ");
    $row  = mysqli_fetch_array($sql);
    $id = $row['adt'];

    $sql1 = mysqli_query($conn,"SELECT count(*) as total FROM aitiseis WHERE adt = '$id'"); 
    $row = mysqli_fetch_assoc($sql1);
    $sum = $row['total'];

    if($sum == 0){
        echo "Δεν έχετε υποβάλει αίτηση";
    }
    else {
        $sql2 = mysqli_query($conn,"SELECT result FROM aitiseis WHERE adt = '$id'"); 
        $row = mysqli_fetch_assoc($sql2);
        $result = $row['result'];  
        if($result == 0){
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Δεν έχουμε απάντηση');
                window.location.href='index.php';
                </script>");  
        }   
    }
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">  
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0df444f366.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">

    <style>
        .GFG {
            background-color: white;
            border: 2px solid black;
            color: green;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
            text-decoration:none;
        }
    </style>

</head>
<title>Πληροφορίες Αίτησης - Υποβολή νέας Αίτησης</title>
<body>
    <!-- Navigation Bar Section -->
    <div class="nav-container">
        <nav class="navbar">
            <h1 id="navbar-logo"><a href="index.php" class="nav-links"><img alt="Διεπιστημονικός Οργανισμός Αναγνώρισης Τίτλων Ακαδημαϊκών και Πληροφόρησης" src="img/logo.png" width=90% height=90%></a></h1>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>           
            </div>
            <ul class="nav-menu">
                <div class="dropdown">
                    <li><button class="dropbtn">
                        <a href="#" class="nav-links">Αναγνώριση <i class="fa fa-caret-down"></i></a>
                    </button></li>
                    <div class = "dropdown-content">
                        <a href ="diadikasia_aitisis.php">Διαδικασία Αίτησης</a>
                        <a href ="aitisi.php">Αίτηση</a>
                        <a href ="universities.php">Λίστα Πανεπιστημίων</a>
                    </div>
                </div>
                <div class="dropdown">
                    <li><button class="dropbtn">
                        <a href="organismos.php" class="nav-links">Οργανισμός</a>
                    </button></li>
                </div>
                <div class="dropdown">
                    <li><button class="dropbtn">
                        <a href="contact.php" class="nav-links">Επικοινωνία</a>
                    </button></li>
                </div>
                <div class="dropdown">
                    <li><button class="dropbtn">
                        <a href="#" class="nav-links">Γλώσσα</a>
                    </button></li>
                </div>
                <div class="dropdown">
                    <li><button class="dropbtn">
                        <a href="#" class="nav-links">Χρήστης <i class="fa fa-caret-down"></i></a>
                    </button></li>
                    <div class="dropdown-content">
                        <a href="login.php" >Σύνδεση</a>
                        <a href="signup.php">Εγγραφή</a>
                        <a href="logout.php">Αποσύνδεση</a>
                    </div>
                </div>
            </ul>
        </nav>
    </div>
    
    <?php
        if($result == 3){
    ?>
        <h6> Η αίτηση σας έχει γίνει αποδεκτή </h6>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%; background-color:green;">
            </div>
        </div>
        <br>
        <h6>Το πτυχίο σας αντιστοιχίζεται με τον εξής τίτλο:</h6>
        <?php
            $sql = mysqli_query($conn, "SELECT * FROM results WHERE adt = '$id' ");
            $data = mysqli_fetch_array($sql);
            $u = $data['university'];
            $d = $data['department'];
            echo "Πανεπιστήμιο: $u";
            echo "<br>Τμήμα: $d";
        ?>
    <?php    
        }
        else if($result == 4){
    ?>
        <h6> Η αίτηση σας έχει απορριφθεί </h6>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%; background-color:red;">
            </div>
        </div>
        <h6>Διότι:..</h6>
        <?php
            $sql = "SELECT notes FROM aitiseis WHERE adt = '$id'";
            $row = mysqli_query($conn, $sql);
            $note = mysqli_fetch_array($row);
            $n = $note['notes'];
        ?>
        <br>
    <?php    
        }   
        else if($result == 5){
    ?>
        <h6> Η αίτηση σας είναι εκκρεμής </h6>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:66%; background-color:blue;">
            </div>
        </div>
        <h6>Διότι ενδείκνυται να παρακολουθήσετε τα εξής μαθήματα:</h6>
        <?php
            $sql = "SELECT notes FROM aitiseis WHERE adt = '$id'";
            $row = mysqli_query($conn, $sql);
            $note = mysqli_fetch_array($row);
            $n = $note['notes'];
            echo "$n";
        ?>
        <br>
        <h6>Από το εξής τμήμα:</h6> 
        <?php
            $sql = mysqli_query($conn, "SELECT * FROM results WHERE adt = '$id' ");
            $data = mysqli_fetch_array($sql);
            $u = $data['university'];
            $d = $data['department'];
            echo "Πανεπιστήμιο: $u";
            echo "<br>Τμήμα: $d";   
        }
    ?>

    <div class="footer-container">
        <div class="footer-links">
            <div class="footer-link-wrapper">
                <div class="footer-link-items">
                    <a href="#" class="footer-logo"><img alt="Διεπιστημονικός Οργανισμός Αναγνώρισης Τίτλων Ακαδημαϊκών και Πληροφόρησης" src="img/logo.png" width=100% height=100%></a>
                    <h3>Διεπιστημονικός Οργανισμός Αναγνώρισης Τίτλων Ακαδημαϊκών και Πληροφόρησης </h3>
                </div>
                <div class="footer-link-items">
                    <h2>Γρήγορη Πρόσβαση</h2>
                    <a href="diadikasia_aitisis.php">Διαδικασία Αίτησης</a>
                    <a href="aitisi.php">Πορεία Αίτησης</a>
                    <a href="organismos.php">Ο Οργανισμός</a>
                    <a href="contact.php">Επικοινωνία</a>
                </div>
                <div class="footer-link-items">
                    <h2><a href="contact.php">Επικοινωνία</a></h2>
                    <div class="icons">
                        <i class="fa fa-phone"></i>
                    </div>
                    <a href="tel:+30 210-5181000">+30 210-5181000</a>
                    <div class="icons">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <a href="https://goo.gl/maps/QJ44JAhF3Bs4QttD7">Αγ. Κωνσταντίνου 54, Αθήνα</a><br>
                    <a href="https://goo.gl/maps/M66dRFCfHFSCps229">Υπουργείο Μακεδονίας Θράκης – Διοικητήριο, Θεσσαλονίκη</a>                   
                </div>
                <div class="footer-link-items">
                    <h2><a href="#">Mail Box</a></h2>
                    <div class="icons">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <a href = "mailto: information_dep@doatap.gr">Send Email</a>
                </div>
            </div>
        </div>
        <p class="website-rights">© 2022 ΔΟΑΤΑΠ</p> 
    </div>
    
    <script src="index.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>


