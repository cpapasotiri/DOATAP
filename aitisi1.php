<?php 
    include_once 'server.php';
    session_start(); 
    $email = $_SESSION['email'];
    $row = mysqli_query($conn, "select * from users where email = '$email'"); 
    $data = mysqli_fetch_array($row);
?>

<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">  
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0df444f366.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/temp.css"><!-- index.css styles-->
    <link rel="stylesheet" href="css/aitisi.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<title>Αίτηση</title>
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
    
    <!-- Main Section: Aitisi(3 steps split them) -->
    <section class="fwh-slide fwh-slide--steps">
        <main class="main-section">
            <h2>Υποβολή Αίτησης</h2>
            &ensp;
            <div class="signup-form">
                <form action="submit.php" method="post" enctype="multipart/form-data">
                    <h4>Πρώτο Βήμα - Προσωπικά Στοιχεία (1/3)</h4>
                    <fieldset class="step1">
                        <label for='first_name'><b>Όνομα*</b></label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="Όνομα" required="required" value = <?php echo $data['first_name'] ?>>
                        </div>

                        <label for='last_name'><b>Επώνυμο*</b></label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" placeholder="Επώνυμο" required="required" value =<?php echo $data['last_name'] ?> >
                        </div>

                        <label for='father_name'><b>Πατρώνυμο*</b></label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="father_name" placeholder="Πατρώνυμο" required="required">
                        </div>

                        <label for='email'><b>Email*</b></label>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email1" placeholder="E-mail" required="required" value =<?php echo $data['email'] ?>>
                        </div>

                        <label for='telephone'><b>Τηλέφωνο*</b></label>
                        <div class="form-group">
                            <input type="tel" pattern="[2-6]{1}[0-9]{9}" title="Must contain exactly 10 digits and start with 2 or 6" class="form-control" name="telephone" placeholder="Τηλέφωνο" required="required" value =<?php echo $data['telephone'] ?>>
                        </div>

                        <label for='adt'><b>Αριθμός Ταυτότητας/Διαβατηρίου*</b></label>
                        <div class="form-group">
                            <input type="text" pattern="[A-Za-z]{2}[0-9]{6}" title="Must start with 2 chars and 5 numbers" class="form-control" name="adt" placeholder="Αριθμός Δελτίου Ταυτότητας" required="required" value =<?php echo $data['adt'] ?>>
                        </div>
                    </fieldset>
                    &ensp;

                    <h4>Δεύτερο Βήμα - Στοιχεία Τίτλου Σπουδών (2/3)</h4>
                    <fieldset class="step2">
                        <label for='type_of_studies'><b>Τύπος Φοίτησης*</b></label>
                        <div class="form-group">
                            <select name="type_of_studies">
                                <option value="Επιλογή Σπουδών">Επιλογή Σπουδών</option>
                                <option value="Προπτυχιακό">Προπτυχιακές Σπουδές</option>
                                <option value="Μετάπτυχιακό">Μετάπτυχιακές Σπουδές</option>
                                <option value="Διδακτορικό">Διδακτορικές Σπουδές</option>
                            </select>
                        </div>

                        <label for='title_of_studies'><b>Τίτλος Σπουδών*</b></label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="titlos" placeholder="Τίτλος Σπουδών" required="required">
                        </div>
                        
                        <label for='country_of_studies'><b>Χώρα Σπουδών*</b></label>
                        <div class="form-group">
                            <input type="text" list = "countries"class="form-control" name="country_of_studies" placeholder="Χώρα Σπουδών" required="required">
                            <datalist id = "countries" name="country_of_studies">
                            <?php
                                $sql = "SELECT DISTINCT(country) FROM universities_exoteriko";
                                $row = mysqli_query($conn, $sql);
                                while($data = mysqli_fetch_array($row)){
                                ?>
                                    <option><?php echo $data['country']; ?></option>
                                <?php
                                }
                                ?>
                            </datalist>
                        </div>
                        
                        <label for='university'><b>Πανεπιστήμιο*</b></label>
                        <div class="form-group">
                            <input type="text" list = "unis" class="form-control" name="university" placeholder="Πανεπιστήμιο" required="required">
                            <datalist id = "unis" name="university" style="padding:5px; margin:2px; width:500px">
                                <?php
                                    $sql1 = "SELECT * FROM universities_exoteriko";
                                    $row1 = mysqli_query($conn, $sql1);
                                    while($data1 = mysqli_fetch_array($row1)){
                                    ?>
                                        <option><?php echo $data1['university']; ?></option>
                                    <?php
                                    }
                                    ?>
                            </datalist>
                        </div>

                        <label for='department'><b>Τμήμα*</b></label>
                        <div class="form-group">
                            <input type="text" list = "dep" class="form-control" name="department" placeholder="Τμήμα" required="required">
                            <datalist id = "dep" name="department">
                                <?php
                                    $sql1 = "SELECT * FROM universities_exoteriko";
                                    $row1 = mysqli_query($conn, $sql1);
                                    while($data1 = mysqli_fetch_array($row1)){
                                    ?>
                                        <option><?php echo $data1['department']; ?></option>
                                    <?php
                                    }
                                    ?>
                            </datalist>
                        </div>

                        <label for='date_start'><b>Ημερομηνία Εγγραφής*</b></label>
                        <div class="form-group">
                            <input type="date" class="form-control" name="date_start" placeholder="Ημερομηνία Εγγραφής" required="required">
                        </div>

                        <label for='date_end'><b>Ημερομηνία Αποφοίτησης*</b></label>
                        <div class="form-group">
                            <input type="date" class="form-control" min="date_start" name="date_end" placeholder="Ημερομηνία Αποφοίτησης" required="required">
                        </div>

                        <label for='time_of_studies'><b>Διάρκεια Σπουδών*</b></label>
                        <div class="form-group">
                            <input type="number" min="1" step="1" pattern="\d+" title="Must be a positive number" class="form-control" name="time_of_studies" placeholder="Διάρκεια Σπουδών σε έτη" required="required">
                        </div>

                        <label for='ects'><b>Πιστωτικές Μονάδες*</b></label>
                        <div class="form-group">
                            <input type="number" min="1" step="1" pattern="\d+" title="Must be a positive number" class="form-control" name="ects" placeholder="Αριθμός Πιστωτικών Μονάδων" required="required">
                        </div>
                    </fieldset>
                    &ensp;
 
                    <h4>Τρίτο Βήμα - Επισυναπτόμενα (3/3)</h4>
                    <fieldset class="step3">
                        <label for='file1'><b>Φωτοαντίγραφο Ταυτότητας*</b></label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="file1" placeholder="Φωτοαντίγραφο Ταυτότητας" required="required" enctype = "multipart/form-data" accept=".doc,.docx,.pdf,.jpg,.png">
                            <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/>
                        </div>

                        <label for='file1'><b>Αντίγραφο Πτυχίου*</b></label>
                        <div class="form-group">
                            <input type="file" class="form-control" name="file2" placeholder="Αντίγραφο Πτυχίου" required="required" accept=".doc,.docx,.pdf,.jpg,.png">
                        </div>

                        <input type="submit" class="btn btn-primary" name="submita" value="Οριστική Υποβολή"> 
                        &ensp; 
                        <input type="submit"  name="submitb" value="Προσωρινή Αποθήκευση"> 
                    </fieldset>           
                </form>
            </div>        
        </main>
    </section>

    &ensp;&ensp;&ensp;&ensp;
    <!-- <br><br>
    <br><br>
    <br><br> -->
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
