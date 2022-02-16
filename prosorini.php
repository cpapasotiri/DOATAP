<?php     
    session_start(); 
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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">

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
<title>Προσωρινά Αποθηκευμένη Αίτηση
    
</title>
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

    include_once 'server.php';

    $records = mysqli_query($conn,"select * from aitiseis"); // fetch data from database
    $t = mysqli_query($conn,"select * from aitiseis_titlos");
    $titlos = mysqli_fetch_array($t);
    $data = mysqli_fetch_array($records);
    ?>

    <h6> Η αίτηση σας έχει αποθηκευτεί προσωρινά </h6>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:33%; background-color:blue;">
            </div>
        </div>

    <h2>Πορεία Αίτησης</h2>
        <div class="signup-form">
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <h6><b>Πρώτο Βήμα - Προσωπικά Στοιχεία (1/3)</b></h6>
            <label for='first_name' style="margin-left:5px;"><b>Όνομα</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="Όνομα" required="required" style="width:500px; margin-left:5px;" value="<?php echo $data['first_name'] ?>">
            </div>
            <label for='last_name' style="margin-left:5px;"><b>Επώνυμο</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Επώνυμο" required="required" style="width:500px; margin-left:5px;" value="<?php echo $data['last_name'] ?>" >
            </div>
            <label for='father_name' style="margin-left:5px;"><b>Πατρόνυμο</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="father_name" placeholder="Πατρόνυμα" required="required" style="width:500px; margin-left:5px; "value="<?php echo $data['father_name'] ?> ">
            </div>
            <label for='email' style="margin-left:5px;"><b>Email</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="email1" placeholder="E-mail" required="required" style="width:500px; margin-left:5px;" value="<?php echo $data['email']?> ">
            </div>
            <label for='telephone' style="margin-left:5px;"><b>Τηλέφωνο</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="telephone" placeholder="Τηλέφωνο" required="required" style="width:500px; margin-left:5px;" value="<?php echo $data['telephone']?> ">
            </div>
            <label for='adt' style="margin-left:5px;"><b>Αριθμός Δελτίου Ταυτότητας</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="adt" placeholder="Αριθμός Δελτίου Ταυτότητας" style="width:500px; margin-left:5px;" required="required" value="<?php echo $data['adt']?> ">
            </div>
            <div class="form-group">
            <h6><b>Δεύτερο Βήμα - Στοιχεία Τίτλου Σπουδών (2/3)</b></h6>
            <label for='type_of_studies' style="margin-left:5px;"><b>Τύπος Φοίτησης</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="type_of_studies" placeholder="Τύπος Φοίτησης" style="width:500px; margin-left:5px;" required="required" value="<?php echo $titlos['type_of_studies']?> ">
            </div>
            <br><label for='title_of_studies' style="margin-left:5px;"><b>Τίτλος Σπουδών</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="titlos" placeholder="Τίτλος Σπουδών" style="width:500px; margin-left:5px;" required="required" value="<?php echo $titlos['titlos']?> ">
            </div>


            <label for='country_of_studies' style="margin-left:5px;"><b>Χώρα Σπουδών</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="country_of_studies" placeholder="Χώρα Σπουδών" style="width:500px; margin-left:5px;" required="required" value="<?php echo $titlos['country_of_studies']?> ">
            </div>

            
            <label for='university' style="margin-left:5px;"><b>Πανεπιστήμιο</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="university" placeholder="Πανεπιστήμιο" style="width:500px; margin-left:5px;" required="required" value="<?php echo $titlos['university']?> ">
            </div>
            <label for='department' style="margin-left:5px;"><b>Τμήμα</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="department" placeholder="Τμήμα" style="width:500px; margin-left:5px;" required="required" value="<?php echo $titlos['department']?> ">
            </div>
            <label for='date_start' style="margin-left:5px;"><b>Ημερομηνία Εγγραφής</b></label>
            <div class="form-group">
                <input type="date" class="form-control" name="date_start" placeholder="Ημερομηνία Εγγραφής" style="width:500px; margin-left:5px;" required="required" value="<?php echo $titlos['date_start']?> ">
            </div>
            <label for='date_end' style="margin-left:5px;"><b>Ημερομηνία Αποφοίτησης</b></label>
            <div class="form-group">
                <input type="date" class="form-control" name="date_end" placeholder="Ημερομηνία Απο" style="width:500px; margin-left:5px;" required="required" value="<?php echo $titlos['date_end']?> ">
            </div>
            <label for='time_of_studies' style="margin-left:5px;"><b>Διάρκεια Σπουδών(σε έτη)</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="time_of_studies" placeholder="Διάρκεια Σπουδών" style="width:500px; margin-left:5px;" required="required" value="<?php echo $titlos['time_of_studies']?> ">
            </div>
            <label for='ects' style="margin-left:5px;"><b>Πιστωτικές Μονάδες</b></label>
            <div class="form-group">
                <input type="text" class="form-control" name="ects" placeholder="Πιστωτικές Μονάδες" style="width:500px; margin-left:5px;" required="required" value="<?php echo $titlos['ects']?> ">
            </div>
            <h6 style="margin-left:5px;"><b>Τρίτο Βήμα - Επισυναπτόμενα (3/3)</b></h6>
            <label for='file1' style="margin-left:5px;"><b>Φωτοαντίγραφο Ταυτότητας</b></label>
            <div class="form-group">
                <input type="file" class="form-control" name="file1" placeholder="Φωτοαντίγραφο Ταυτότητας" style="width:500px; margin-left:5px;" required="required" style="width:500px; margin-left:5px;">
            </div>
            <label for='file1' style="margin-left:5px;"><b>Αντίγραφο Πτυχίου</b></label>
            <div class="form-group">
                <input type="file" class="form-control" name="file2" placeholder="Αντίγραφο Πτυχίου" style="width:500px; margin-left:5px;" required="required" style="width:500px; margin-left:5px;">
            </div>
            <input type="submit" class="btn btn-primary" name="submita" value="Οριστική Υποβολή">          
            <input type="submit"  name="submitb" value="Προσωρινή Αποθήκευση"> 
        </div>
        </form>
    </div>

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
