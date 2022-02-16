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
    <link rel="stylesheet" href="css/diaxeiristis.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<title>ΔΟΑΤΑΠ</title>
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
                        <a href ="diadikasia_aitisis.php">Διαδικασία Αίτησης</a>
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
    
    <!-- Main Section: Diaxeiristis  -->
    <section class="fwh-slide">
        <main class="main-section">
            <h2>Αιτήσεις προς απάντηση</h2>
            <table border="2">
                <tr>
                    <td>Όνομα</td>
                    <td>Επώνυμο</td>
                    <td>Τύπος Σπουδών</td>
                    <td>Τίτλος</td>
                    <td>Χώρα Σπουδών</td>
                    <td>Πανεπιστήμιο</td>
                    <td>Τμήμα</td>
                    <td>Πιστωτικές Μονάδες</td>
                    <td>Αναγνωρισμένος Τίτλος</td>
                    <td>Απάντηση Αίτησης</td>
                </tr>
                <?php
                include_once 'server.php';

                $records = mysqli_query($conn,"select * from aitiseis"); // fetch data from database

                while($data = mysqli_fetch_array($records) and $data['result'] == 2){
                    ?>
                    <form method="post" action="apotelesma.php" >
                        <tr>
                            <td><?php echo $data['first_name']; ?></td>
                            <td><?php echo $data['last_name']; ?></td>
                            <?php
                            $id = $data['adt'];
                            $res = $data['result'];
                            $records = mysqli_query($conn,"select * from aitiseis_titlos where adt ='$id'"); // fetch data from database
                            while($data = mysqli_fetch_array($records)){
                                ?>
                                <td><?php echo $data['type_of_studies']; ?></td>
                                <td><?php echo $data['titlos']; ?></td>
                                <td><?php echo $data['country_of_studies']; ?></td>
                                <td><?php echo $data['university']; ?></td>
                                <td><?php echo $data['department']; ?></td>
                                <td><?php echo $data['ects']; ?></td>
                                <?php 
                                $c = $data['country_of_studies'];
                                $u = $data['university'];
                                $d = $data['department'];
                                $sql = mysqli_query($conn, "SELECT antistoixizetai_me FROM universities_exoteriko WHERE country = '$c' and university = '$u' and department = '$d'");
                                $data = mysqli_fetch_array($sql); 
                                $sql1 = mysqli_query($conn, "SELECT xreiazetai_epipleon_mathimata FROM universities_exoteriko WHERE country = '$c' and university = '$u' and department = '$d'");
                                $data1 = mysqli_fetch_array($sql1); 
                                if($data == 0){
                                    $res = "Οχι";
                                }
                                else if($data == 1 and $data1 == 1){
                                    $res = "Ναι υπό προυποθέσεις";
                                } 
                                else if($data == 1 and $data1 == 0){
                                    $res = "Ναι";
                                } 
                                ?>
                                <td><?php echo $res; ?></td>
                                <?php  
                            }
                            ?>
            
                            <td><button type="submit" style="width:100px;" name="apodoxi" value="<?=$id?>">Αποδοχή Αίτησης</button></td>
                            <td><button type="submit" style="width:100px;" name="apodoxi_me" value="<?=$id?>">Εκκρεμής Αίτηση</button></td>
                            <td><button type="submit" style="width:100px;" name="aporipsi" value="<?=$id?>">Απόρριψη Αίτησης</button></td>
                        </tr>	
                    </form>
                <?php
                }
                ?>
            </table>

            <?php mysqli_close($conn); // Close connection ?>
       
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
