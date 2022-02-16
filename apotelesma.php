<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">  
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0df444f366.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/login.css">

    <style>
        ul.a {list-style-type: circle;}
    </style>
</head>
<title>ΔΟΑΤΑΠ</title>
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

<?php
include_once 'server.php';
    session_start();
    if(isset($_POST['apodoxi'])){
        $id = $_POST['apodoxi'];
        $answer = 3;
    }
    else if(isset($_POST['aporipsi'])){
        $id = $_POST['aporipsi'];
        $answer = 4;
    }
    else if(isset($_POST['apodoxi_me'])){
        $id = $_POST['apodoxi_me'];
        $answer = 5;
    }
    $records = mysqli_query($conn,"select * from aitiseis where adt = '$id'"); // fetch data from database
    $t = mysqli_query($conn,"select * from aitiseis_titlos where adt = '$id'");
    $titlos = mysqli_fetch_array($t);

    while($data = mysqli_fetch_array($records))
    {
?>
    <h2>Αίτηση</h2>
    <form method="post">
    <table border="2" style="margin:30px; width:50%;">
        <tr>
            <th>Όνομα</th> <td><?php echo $data['first_name']; ?></td>
        </tr>
        <tr>
            <th>Eπώνυμο</th> <td><?php echo $data['last_name']; ?></td>
        </tr>

        <tr>
            <th>Τύπος Σπουδών</th> <td><?php echo $titlos['type_of_studies']; ?></td>
        </tr>
        <tr>
            <th>Τίτλος</th> <td><?php echo $titlos['titlos']; ?></td>
        </tr>
        <tr>
            <th>Χώρα Σπουδών</th> <td><?php echo $titlos['country_of_studies']; ?></td>
        </tr>
        <tr>
            <th>Πανεπιστήμιο</th> <td><?php echo $titlos['university']; ?></td>
        </tr>
        <tr>
            <th>Τμήμα</th> <td><?php echo $titlos['department']; ?></td>
        </tr>
        <tr>
            <th>Διάρκεια Σπουδών</th> <td><?php echo $titlos['time_of_studies']; ?></td>
        </tr>
        <tr>
            <th>Πιστωτικές Μονάδες</th> <td><?php echo $titlos['ects']; ?></td>
        </tr>
    </table>	
    </form>
 <?php
        }
    $records = mysqli_query($conn,"UPDATE aitiseis
        SET result = '$answer'
        WHERE adt = '$id' "); 
    $data = mysqli_query($conn,"SELECT result
                            FROM aitiseis
                            WHERE adt = '$id' ");
    $row  = mysqli_fetch_array($data);
    $answer = $row['result'];
    if($answer == 3){
    ?>    
    <form action="apodoxi.php" method="post" enctype="multipart/form-data">
        <label for='university' style="margin-left:5px;"><b>Πανεπιστήμιο</b></label>
        <div class="form-group">
            <select name="university" style="padding:5px; margin:2px; width:500px">
            <?php
                $sql1 = "SELECT DISTINCT(university) FROM universities";
                $row1 = mysqli_query($conn, $sql1);
                while($data1 = mysqli_fetch_array($row1)){
                ?>
                    <option><?php echo $data1['university']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <label for='department' style="margin-left:5px;"><b>Τμήμα</b></label>
        <div class="form-group">
            <select name="department" style="padding:5px; margin:2px; width:500px">
            <?php
                $sql1 = "SELECT department FROM universities";
                $row1 = mysqli_query($conn, $sql1);
                while($data1 = mysqli_fetch_array($row1)){
                ?>
                    <option><?php echo $data1['department']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" style="background-color:green;" value="<?=$id?>">Υποβολή</button>   
    </form>
    <?php
    }
    else if($answer == 4){
        ?>
        <h3>Αιτιολογία Αποδοχής/Απόρριψης Αίτησης</h3>
        <form action="notes.php" method="post" enctype="multipart/form-data">
            <br><label for='note' style="margin-left:5px;"><b>Αιτιολογία</b></label>
            <br><input type="text" class="form-control" name="note" placeholder="Αιτιολογία" required="required" style="width:500px; margin-left:5px;">
            <br><button type="submit" class="btn btn-primary" name="submit" style="background-color:#008CBA;color:white;border: 2px; font-size: 16px; width:200px; margin-left:5px;"value='<?=$id?>'>Υποβολή Αναφοράς</button>   
            <br><br>
        </form>
        <?php
    }
    else if($answer == 5){
    ?>
    <h3>Προτεινόμενα Μαθήματα για Εκκρεμή Αίτηση </h3>
    <form action="ekremis.php" method="post" enctype="multipart/form-data">
        <label for='university' style="margin-left:5px;"><b>Πανεπιστήμιο</b></label>
        <div class="form-group">
            <select name="university" style="padding:5px; margin:2px; width:500px">
            <option></option>
            <?php
                $sql1 = "SELECT DISTINCT(university) FROM universities";
                $row1 = mysqli_query($conn, $sql1);
                while($data1 = mysqli_fetch_array($row1)){
                ?>
                    <option><?php echo $data1['university']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <label for='department' style="margin-left:5px;"><b>Τμήμα</b></label>
        <div class="form-group">
            <select name="department" style="padding:5px; margin:2px; width:500px">
            <option></option>
            <?php
                $sql1 = "SELECT department FROM universities";
                $row1 = mysqli_query($conn, $sql1);
                while($data1 = mysqli_fetch_array($row1)){
                ?>
                    <option><?php echo $data1['department']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <label for='lessons' style="margin-left:5px;" multiple><b>Μαθήματα</b></label> 
        <div class="form-group">
            <select name="lessons" style="padding:5px; margin:2px; width:500px">
            <option></option>
            <?php
                $sql = "SELECT id FROM universities";
                $row = mysqli_query($conn, $sql);
                $id1 = mysqli_fetch_array($row);
                echo "$id1";
                $sql1 = "SELECT lesson FROM mathimata";
                $row1 = mysqli_query($conn, $sql1);
                while($data1 = mysqli_fetch_array($row1)){
                    ?>
                        <option><?php echo $data1['lesson']; ?></option>
                    <?php
                    }
            ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" style="background-color:green;" value="<?=$id?>">Υποβολή</button>   
    </form>
    <?php
    }
?> 


    <!-- Footer Section -->
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
                    <a href="aitisi.php">Αίτηση</a>
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
