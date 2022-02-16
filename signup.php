<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Εγγραφή Χρήστη</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Εγγραφή Νέου Χρήστη</h2>
                    </div>
                    <p>Παρακαλώ Συμπληρώστε αυτή τη φόρμα για να εγγραφείτε στο σύστημα.</p>
                    <form action="insert.php" method="post">
                        <div class="form-group">
                            <label>Όνομα</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Επώνυμο</label>
                            <input type="text" name="lname" class="form-control">
                        </div>
                        <label for='adt'><b>Αριθμός Ταυτότητας/Διαβατηρίου*</b></label>
                        <div class="form-group">
                            <input type="text" pattern="[A-Za-z]{2}[0-9]{6}" class="form-control" name="adt" title="Must contain exactly 2 chars and 6 letters" placeholder="Αριθμός Δελτίου Ταυτότητας" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <label for='telephone'><b>Τηλέφωνο*</b></label>
                        <div class="form-group">
                            <input type="tel" pattern="[2-6]{1}[0-9]{9}" title="Must contain exactly 10 digits and starts with 2 or 6" class="form-control" name="telephone" placeholder="Τηλέφωνο" required="required">
                        </div>

                        <div class="form-group">
                            <label>Κωδικός Πρόσβασης</label>
                            <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="pass" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Εγγραφή">
                        <div class="text-center">Έχετε ήδη λογαριασμό; <a href="login.php">Συνδεθείτε Εδώ</a></div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>