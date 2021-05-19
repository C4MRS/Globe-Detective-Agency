<?php
session_start();
$email = $_POST['email'];

function controllo($conn_info, $query)     //Controlla in quel determinato collegamento se il comando inviato è stato eseguito con successo
{
    if (mysqli_query($conn_info, $query)) {
        /*echo "Comando eseguito con successo<br>";*/
    } else {
        echo mysqli_error($conn_info);
    }
}


$db_name = 'gda';

$link = mysqli_connect('localhost', 'root', ''); //Dichiara la connessione indicando indirizzo ip, nome utente e password, dandomi le informazioni necessarie riguardanti la connessione

if ($link) {
    /*echo 'connection successful<br><br>';*/
} else {
    die('could not connect: ' . mysqli_error($link));            //Interrogando questa variabile possiamo sapere se la connessione è andata a buon fine, dando un messaggio di errore in caso contrario
}

$link->select_db($db_name);

$query = "select email from investigatore where email='$email'";

$result = mysqli_query($link, $query);  //Restituisce un true o false in base al completamento della query
$row = mysqli_fetch_assoc($result);

$count = mysqli_num_rows($result);

if ($count == 1) {
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
    </head>
    <body>
        <ul>
          <li><a href="adminIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
          <li><a href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
          <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
          <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
          <li><a href="addUserPage.php"><i class="fas fa-user-plus"></i>Add User</a></li>
          <li><a class="active" href="checkInvestigatorPage.php"><i class="fas fa-user-check"></i>Check Investigator</a></li>
          <li><a href="addInvestigatorPage.php"><i class="fas fa-user-plus"></i>Add Investigator</a></li>
          <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
          <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
            <h2><?php echo "Investigator found, data printout:"?></h2>
                    <?php
                        $query = "select * from investigatore where email='$email'";

                        $result = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($result);

                        $count = mysqli_num_rows($result);

                        echo "<strong style=\"color:#fcba03\";>ID: </strong>" . $row['ID'] . "<br>";
                        echo "<strong style=\"color:#fcba03\";>Name: </strong>" . $row['nome'] . "<br>";
                        echo "<strong style=\"color:#fcba03\";>Surname: </strong>" . $row['cognome'] . "<br>";
                        echo "<strong style=\"color:#fcba03\";>Gender: </strong>" . $row['sesso'] . "<br>";
                        echo "<strong style=\"color:#fcba03\";>Email: </strong>" . $row['email'] . "<br>";
                        echo "<strong style=\"color:#fcba03\";>Cellphone: </strong>" . $row['cell'] . "<br>";
                        echo "<strong style=\"color:#fcba03\";>Admin: </strong>" . $row['admin'] . "<br>";

                        $ID = $row['ID'];
                        $query = "select * from specializzazione where IDI='$ID'";

                        $result = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($result);

                        $count = mysqli_num_rows($result);

                        echo "<strong style=\"color:#fcba03\";>Specialization: </strong>" . $row['nome'] . "<br>";
                    ?>
              </div>
        </div>
    </body>
</html>
<?php
    }else{
            header("Location: checkInvestigatorPage.php");
            exit();
        }
?>