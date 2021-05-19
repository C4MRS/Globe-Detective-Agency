<?php
session_start();
$db_name = 'gda';
$title = $_POST["title"];
$desc = $_POST["description"];
$IDI = $_POST["investigator"];
$IDC = $_POST["client"];

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

$sql = "INSERT INTO casefile (titolo, descrizione, IDC, IDI) values (?, ?, ?, ?)";
$stmt = $link->prepare($sql);
$stmt->bind_param("ssii", $title, $desc, $IDI, $IDC);

$sql = "select titolo from casefile where titolo='$title'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    if(isset($_SESSION["ID"])){
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
                alert("Casefile already present with this title!");
            }
        </script>
    </head>
    <body onload="myFunction()">
        <ul>
            <li><a href="adminIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a class="active" href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
            <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
            <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
            <li><a href="addUserPage.php"><i class="fas fa-user-plus"></i>Add User</a></li>
            <li><a href="checkInvestigatorPage.php"><i class="fas fa-user-check"></i>Check Investigator</a></li>
            <li><a href="addInvestigatorPage.php"><i class="fas fa-user-plus"></i>Add Investigator</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
                <h2>Add a new Casefile</h2>
                <form method="post" action="/GDA/php/addCasefile.php" id="aCasefileForm">
                  <div class="user-box">
                    <input type="text" name="title" title="Insert casefile's title" required>
                    <label>Title</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="description" required="">
                    <label>Short description</label>
                  </div>
                  <div class="user-box">
                    <input type="number" name="investigator" required>
                    <label>Investigator's ID</label>
                  </div>
                  <div class="user-box">
                    <input type="number" name="client" required>
                    <label>Client's ID</label>
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
        <title>Investigators' Index</title>
        <script>
            function myFunction() {
                alert("Casefile already present with this title!");
            }
        </script>
    </head>
    <body onload="myFunction()">
        <ul>
            <li><a href="adminIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a class="active" href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
            <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
            <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
                <h2>Add a new Casefile</h2>
                <form method="post" action="/GDA/php/addCasefile.php" id="aCasefileForm">
                  <div class="user-box">
                    <input type="text" name="title" title="Insert casefile's title" required>
                    <label>Title</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="description" required="">
                    <label>Short description</label>
                  </div>
                  <div class="user-box">
                    <input type="number" name="investigator" required>
                    <label>Investigator's ID</label>
                  </div>
                  <div class="user-box">
                    <input type="number" name="client" required>
                    <label>Client's ID</label>
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
} else {
    $stmt->execute();
    if(isset($_SESSION["ID"])){?>
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
                alert("Casefile added successfully!");
            }
        </script>
    </head>
    <body onload="myFunction()">
        <ul>
            <li><a href="adminIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a class="active" href="#"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
            <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
            <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
            <li><a href="addUserPage.php"><i class="fas fa-user-plus"></i>Add User</a></li>
            <li><a href="checkInvestigatorPage.php"><i class="fas fa-user-check"></i>Check Investigator</a></li>
            <li><a href="addInvestigatorPage.php"><i class="fas fa-user-plus"></i>Add Investigator</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
                <h2>Add a new Casefile</h2>
                <form method="post" action="/GDA/php/addCasefile.php" id="aCasefileForm">
                  <div class="user-box">
                    <input type="text" name="title" title="Insert casefile's title" required>
                    <label>Title</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="description" required="">
                    <label>Short description</label>
                  </div>
                  <div class="user-box">
                    <input type="number" name="investigator" required>
                    <label>Investigator's ID</label>
                  </div>
                  <div class="user-box">
                    <input type="number" name="client" required>
                    <label>Client's ID</label>
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
} else{
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
        <title>Investigators' Index</title>
        <script>
            function myFunction() {
                alert("Casefile added successfully!");
            }
        </script>
    </head>
    <body onload="myFunction()">
        <ul>
            <li><a href="adminIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a class="active" href="#"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
            <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
            <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
                <h2>Add a new Casefile</h2>
                <form method="post" action="/GDA/php/addCasefile.php" id="aCasefileForm">
                  <div class="user-box">
                    <input type="text" name="title" title="Insert casefile's title" required>
                    <label>Title</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="description" required="">
                    <label>Short description</label>
                  </div>
                  <div class="user-box">
                    <input type="number" name="investigator" required>
                    <label>Investigator's ID</label>
                  </div>
                  <div class="user-box">
                    <input type="number" name="client" required>
                    <label>Client's ID</label>
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