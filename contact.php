<?php 
    include 'server.php'; 
    session_start(); 
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">  
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0df444f366.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/temp.css"><!-- index.css styles-->
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<title>Επικοινωνία</title>
<body>
    <!-- Navigation Bar Section -->
    <div class="nav-container">
        <nav class="navbar">
            <h1 id="navbar-logo"><a href="index.php" class="nav-links"><img alt="Διεπιστημονικός Οργανισμός Αναγνώρισης Τίτλων Ακαδημαϊκών και Πληροφόρησης" src="img/logo.png" width=85%></a></h1>
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
                        <a href ="diadikasia_aitisis.php">Διαδικασία Αναγνώρισης</a>
                        <?php     
                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                $email = $_SESSION['email'];
                                $sql=mysqli_query($conn,"SELECT typos FROM users where email='$email'");
                                $row  = mysqli_fetch_array($sql);
                                $typos = $row['typos'];
                                if($typos == 2){
                                    echo "<li><a href='diaxeiristis.php'>Απάντηση Αιτήσεων</a></li>";
                                }
                                else{
                                    echo "<li><a href='aitisi.php'>Αίτηση</a></li>";
                                }
                            }
                            else
                                echo "<li><a href='aitisi.php'>Αίτηση</a></li>";
                        ?>    
                    </div>
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
                    <?php     
                        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                        ?>
                            <div class="dropdown">
                                <li><button class="dropbtn">
                                    <a href="logout.php" class="nav-links">Αποσύνδεση</a>
                                </button></li>
                            </div>
                        <?php }
                        else{
                        ?>
                        <div class="dropdown">
                        <li><button class="dropbtn">
                            <a href="#" class="nav-links">Χρήστης <i class="fa fa-caret-down"></i></a>
                        </button></li>
                        <div class="dropdown-content">
                        <?php
                            echo "<li><a href='login.php'>Σύνδεση</a></li>";
                            echo "<li><a href='signup.php'>Εγγραφή</a></li>";
                        }
                        ?>
                    </div>
                </div>
            </ul>
        </nav>
    </div>
    
    <!-- Main Section: Contact Us  -->
    <section class="fwh-slide fwh-slide--hgt">
        <main class="main-section">
            <h1>Επικοινωνία και Πρόσβαση</h1>
            <h2>Επικοινωνία</h2>  
            <div class="row">
                <div class="col-1">
                    <a href = "mailto: information_dep@doatap.gr"><i class="fa fa-envelope" alt="Email επικοινωνίας"></i> information_dep@doatap.gr</a>
                </div>
                <div class="col-2">
                    <a href="tel:+30 210-5281000"><i class="fa fa-phone" alt="Τηλέφωνο επικοινωνίας"></i> +30 210-5281000</a>
                </div>
            </div>      
            &ensp;
            <h2>Ωράριο Λειτουργίας</h2>  
            <div class="row">
                <div class="col-1">
                    <p>Δευτέρα έως Παρασκευή, 12:30μ.μ - 14:00μ.μ</p>
                    <i>Προσοχή: Απαιτείτε τηλεφωνικό ραντεβού</i>
                </div>
                <div class="col-2">
                    <p></p>    
                </div>
            </div>
            &ensp;
            <h2>Τοποθεσία</h2>  
            <div class="row">
                <div class="col-1">
                    <p>Αγίου Δημητρίου, Θεσσαλλονίκη 546 33</p>  
                    <div style="width: 70%"><iframe width="70%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=%CE%A5%CF%80%CE%BF%CF%85%CF%81%CE%B3%CE%B5%CE%AF%CE%BF%20%CE%9C%CE%B1%CE%BA%CE%B5%CE%B4%CE%BF%CE%BD%CE%AF%CE%B1%CF%82%20-%20%CE%98%CF%81%CE%AC%CE%BA%CE%B7%CF%82,%20%CE%91%CE%B3%CE%AF%CE%BF%CF%85%20%CE%94%CE%B7%CE%BC%CE%B7%CF%84%CF%81%CE%AF%CE%BF%CF%85,%20%CE%98%CE%B5%CF%83%CF%83%CE%B1%CE%BB%CE%BB%CE%BF%CE%BD%CE%AF%CE%BA%CE%B7%20546%2033+(%CE%94%CE%9F%CE%91%CE%A4%CE%91%CE%A0)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/" alt="Thessalonikis map"></a></iframe></div>
                </div>
                &ensp;
                <div class="col-2">
                    <p>Αγίου Κωνσταντίνου 54, Αθήνα 104 37</p>
                    <div style="width: 70%"><iframe width="70%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=%CE%91%CE%B3%CE%AF%CE%BF%CF%85%20%CE%9A%CF%89%CE%BD%CF%83%CF%84%CE%B1%CE%BD%CF%84%CE%AF%CE%BD%CE%BF%CF%85%2054,%20%CE%91%CE%B8%CE%AE%CE%BD%CE%B1%20104%2037+(%CE%94%CE%9F%CE%91%CE%A4%CE%91%CE%A0)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/" alt="Athens Map"></a></iframe></div>
                </div>
            </div>
        </main>
    </section>

    <!-- Footer Section -->
    <section class="fwh-slide fwh-slide--bg-darkgrey">
        <div class="footer-container">
            <div class="footer-content">
                <h2><a href="index.php"><img alt="Διεπιστημονικός Οργανισμός Αναγνώρισης Τίτλων Ακαδημαϊκών και Πληροφόρησης" src="img/logo.png" class="logo"  width=40% height=35%></a></h2>
                <p>Διεπιστημονικός Οργανισμός Αναγνώρισης Τίτλων Ακαδημαϊκών και Πληροφόρησης</p>
                <ul class="links">
                    <li><a href="index.php">Αρχική</a></li>&nbsp;
                    <li><a href="diadikasia_aitisis.php">Διαδικασία Αναγνώρισης</a></li>&nbsp;
                    <li><a href="aitisi.php">Πορεία Αίτησης</a></li>&nbsp;
                    <li><a href="contact.php">Επικοινωνία</a></li>&nbsp;
                </ul>
            </div>
            <div class="footer-bottom">
                <p>copyright &copy; EAM Team 29</p>
                <div class="footer-menu">
                    <ul class="f-menu">
                        <li><a href="https://goo.gl/maps/QJ44JAhF3Bs4QttD7"><i class="fa fa-map-marker" alt="Τοποθεσία παραρτήματος Αθηνών"></i> Αθήνα</a></li>
                        <li><a href="https://goo.gl/maps/M66dRFCfHFSCps229"><i class="fa fa-map-marker" alt="Τοποθεσία παραρτήματος Θεσσαλονίκης"></i> Θεσσαλονίκη</a></li>
                        <li><a href="tel:+30 210-5281000"><i class="fa fa-phone" alt="Τηλέφωνο επικοινωνίας"></i> +30 210-5281000</a></li>
                        <li><a href = "mailto: information_dep@doatap.gr"><i class="fa fa-envelope" alt="Email επικοινωνίας"></i> information_dep@doatap.gr</a></li>      
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <script src="js/index.js"></script>
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
