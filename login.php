<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
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

</head>
<title>Σύνδεση Χρήστη</title>
<body>
<div class="signup-form">
    <form action="loginProcess.php" method="post" enctype="multipart/form-data">
		<h2>Σύνδεση</h2>
		<p class="hint-text">Εισάγετε Πληροφορίες Σύνδεσης</p>
        <label for='emailt'><b>Email</b></label>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <label for='pass'><b>Κωδικός</b></label>
		<div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Σύνδεση</button>
        </div>
        <div class="text-center">Δεν έχετε λογαριασμό; <a href="signup.php">Εγγραφείτε Εδώ</a></div>
    </form>
</div>
</body>
</html>