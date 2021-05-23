<?php

$db_name = 'gda';
$name = $_POST["name"];
$surname = $_POST["surname"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$cell = $_POST["cell"];
$admin = $_POST["admin"];
$spec = $_POST["Specialization"];

function controllo($conn_info, $query)
{
    if (mysqli_query($conn_info, $query)) {
        //echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}

$link = mysqli_connect('localhost', 'root', '');

if ($link) {
    //echo 'Connessione al database riuscita<br> ';
} else {
    die('could not connect: ' . mysqli_error($link));
}

$link->select_db($db_name);

$sql = "INSERT INTO investigatore (nome, cognome, sesso, email, password, cell, admin) values (?, ?, ?, ?, ?, ?, ?)";
$stmt = $link->prepare($sql);
$stmt->bind_param("ssssssi", $name, $surname, $gender, $email, $password, $cell, $admin);

$sql1 = "select email from investigatore where email='$email'";
$result1 = mysqli_query($link, $sql1);
$count1 = mysqli_num_rows($result1);

if ($count1 == 1) {
    ?>
<!DOCTYPE html>
<html>
    <head>
        <script src = "https://smtpjs.com/v3/smtp.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
        <link rel="stylesheet" href="../css/casefile.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/email.js"></script>
        <title>Admins' Index</title>
        <script>
            function myFunction() {
                alert("Investigator already present with this email!");
            }
        </script>
    </head>
    <body onload="myFunction()">
        <ul>
            <li><a href="adminIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
            <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
            <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
            <li><a href="addUserPage.php"><i class="fas fa-user-plus"></i>Add User</a></li>
            <li><a href="checkInvestigatorPage.php"><i class="fas fa-user-check"></i>Check Investigator</a></li>
            <li><a class="active" href="addInvestigatorPage.php"><i class="fas fa-user-plus"></i>Add Investigator</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
                <h2>Add a new Investigator</h2>
                <form method="post" action="addInvestigator.php">
                  <div class="user-box">
                    <input type="text" name="name" title="Insert investigator's name" required>
                    <label>Name</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="surname" title="Insert investigator's surname" required="">
                    <label>Surname</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="gender" pattern="[MFO]{1}" title="Insert M for Male, F for Female, O for Other" required>
                    <label>Gender</label>
                  </div>
                  <div class="user-box">
                    <input type="email" name="email" title="Insert investigator's email" required>
                    <label>Investigator's email</label>
                  </div>
                  <div class="user-box">
                    <input type="password" name="password" title="Insert investigator's password" required>
                    <label>Password</label>
                  </div>
                  <div class="user-box">
                    <input type="tel" name="cell" pattern="[0-9]{10}" required>
                    <label>Cellphone</label>
                  </div>
                  <div class="user-box">
                    <input type="tel" name="cell" pattern="[0-1]{1}" title="1 - Admin permission | 0 - Investigator permission" required>
                    <label>Admin</label>
                  </div>
                  <div class="user-box">
                  <br><br><label>Specialization</label>
                    <select name="Specialization">
                      <option value="Missing People">Missing People</option>
                      <option value="Marital infidelity">Marital infidelity</option>
                      <option value="Environmental Remediation">Environmental Remediation</option>
                      <option value="Business Investigations">Business Investigations</option>
                      <option value="Asset Recovery">Asset Recovery</option>
                      <option value="Family Investigations">Family Investigations</option>
                    </select><br><br>
                  </div>
                  <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input type="submit" value="SUBMIT">
                  </a>
                </form>
              </div>
        </div>
    </body>
</html>
<?php
}else{
$sql1 = "select email from cliente where email='$email'";
$result1 = mysqli_query($link, $sql1);
$count1 = mysqli_num_rows($result1);
  if($count1 == 1){
?>
<html>
    <head>
        <script src = "https://smtpjs.com/v3/smtp.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
        <link rel="stylesheet" href="../css/casefile.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/email.js"></script>
        <title>Admins' Index</title>
        <script>
            function myFunction() {
                alert("Email already used by a client!");
            }
        </script>
    </head>
    <body onload="myFunction()">
        <ul>
            <li><a href="adminIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
            <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
            <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
            <li><a href="addUserPage.php"><i class="fas fa-user-plus"></i>Add User</a></li>
            <li><a href="checkInvestigatorPage.php"><i class="fas fa-user-check"></i>Check Investigator</a></li>
            <li><a class="active" href="addInvestigatorPage.php"><i class="fas fa-user-plus"></i>Add Investigator</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
                <h2>Add a new Investigator</h2>
                <form method="post" action="addInvestigator.php">
                  <div class="user-box">
                    <input type="text" name="name" title="Insert investigator's name" required>
                    <label>Name</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="surname" title="Insert investigator's surname" required="">
                    <label>Surname</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="gender" pattern="[MFO]{1}" title="Insert M for Male, F for Female, O for Other" required>
                    <label>Gender</label>
                  </div>
                  <div class="user-box">
                    <input type="email" name="email" title="Insert investigator's email" required>
                    <label>Investigator's email</label>
                  </div>
                  <div class="user-box">
                    <input type="password" name="password" title="Insert investigator's password" required>
                    <label>Password</label>
                  </div>
                  <div class="user-box">
                    <input type="tel" name="cell" pattern="[0-9]{10}" required>
                    <label>Cellphone</label>
                  </div>
                  <div class="user-box">
                    <input type="tel" name="cell" pattern="[0-1]{1}" title="1 - Admin permission | 0 - Investigator permission" required>
                    <label>Admin</label>
                  </div>
                  <div class="user-box">
                  <br><br><label>Specialization</label>
                    <select name="Specialization">
                      <option value="Missing People">Missing People</option>
                      <option value="Marital infidelity">Marital infidelity</option>
                      <option value="Environmental Remediation">Environmental Remediation</option>
                      <option value="Business Investigations">Business Investigations</option>
                      <option value="Asset Recovery">Asset Recovery</option>
                      <option value="Family Investigations">Family Investigations</option>
                    </select><br><br>
                  </div>
                  <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input type="submit" value="SUBMIT">
                  </a>
                </form>
              </div>
        </div>
    </body>
</html>
<?php
} else {
  $stmt->execute();
  $sql1 = "select ID from investigatore where email='$email'";
  $result1 = mysqli_query($link, $sql1);
  $row = mysqli_fetch_assoc($result1);
  $count1 = mysqli_num_rows($result1);
  
  if ($count1 == 1) {
    $ID = $row['ID'];
    $sql = "INSERT INTO specializzazione (nome, IDI) values (?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("si", $spec, $ID);
    $stmt->execute();
  }
    ?>
    <!DOCTYPE html>
<html>
    <head>
        <script src = "https://smtpjs.com/v3/smtp.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
        <link rel="stylesheet" href="../css/casefile.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/email.js"></script>
        <script>
            function myFunction() {
                alert("Investigator added successfully!");
            }
        </script>
        <title>Admins' Index</title>
    </head>
    <body onload="myFunction()">
        <ul>
            <li><a href="adminIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
            <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
            <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
            <li><a href="addUserPage.php"><i class="fas fa-user-plus"></i>Add User</a></li>
            <li><a href="checkInvestigatorPage.php"><i class="fas fa-user-check"></i>Check Investigator</a></li>
            <li><a class="active" href="addInvestigatorPage.php"><i class="fas fa-user-plus"></i>Add Investigator</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
                <h2>Add a new Investigator</h2>
                <form method="post" action="addInvestigator.php">
                  <div class="user-box">
                    <input type="text" name="name" title="Insert investigator's name" required>
                    <label>Name</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="surname" title="Insert investigator's surname" required="">
                    <label>Surname</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="gender" pattern="[MFO]{1}" title="Insert M for Male, F for Female, O for Other" required>
                    <label>Gender</label>
                  </div>
                  <div class="user-box">
                    <input type="email" name="email" title="Insert investigator's email" required>
                    <label>Investigator's email</label>
                  </div>
                  <div class="user-box">
                    <input type="password" name="password" title="Insert investigator's password" required>
                    <label>Password</label>
                  </div>
                  <div class="user-box">
                    <input type="tel" name="cell" pattern="[0-9]{10}" required>
                    <label>Cellphone</label>
                  </div>
                  <div class="user-box">
                    <input type="tel" name="admin" pattern="[0-1]{1}" title="1 - Admin permission | 0 - Investigator permission" required>
                    <label>Admin</label>
                  </div>
                  <div class="user-box">
                  <br><br><label>Specialization</label>
                    <select name="Specialization">
                      <option value="Missing People">Missing People</option>
                      <option value="Marital infidelity">Marital infidelity</option>
                      <option value="Environmental Remediation">Environmental Remediation</option>
                      <option value="Business Investigations">Business Investigations</option>
                      <option value="Asset Recovery">Asset Recovery</option>
                      <option value="Family Investigations">Family Investigations</option>
                    </select><br><br>
                  </div>
                  <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input type="submit" value="SUBMIT">
                  </a>
                </form>
              </div>
        </div>
    </body>
</html>
<?php
}
}
?>