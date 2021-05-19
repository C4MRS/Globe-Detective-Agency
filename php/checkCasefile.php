<?php
session_start();
$title = $_POST['title'];

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

$query = "select titolo from casefile where titolo='$title'";

$result = mysqli_query($link, $query);  //Restituisce un true o false in base al completamento della query
$row = mysqli_fetch_assoc($result);

$count = mysqli_num_rows($result);

if ($count == 1) {
        if(isset($_SESSION['ID'])){
    ?>
    <html>
        <head>
            <script src = "https://smtpjs.com/v3/smtp.js"></script>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
            <link rel="stylesheet" href="css/casefile.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
            <script src="js/scripts.js"></script>
            <script src="js/email.js"></script>
            <title>Admins' Index</title>
        </head>
        <style>
            *{
                margin: 0;
                padding: 0;
                text-decoration: none;
                font-family: "Ubuntu",sans-serif;
                box-sizing: border-box;
            }

            html{
                scroll-behavior: smooth;
            }
            ::selection{
                background-color: #48dbfb60;
            }
            
            ::-webkit-scrollbar{
                width: 10px;
                background-color: #f1f1f1;
            }
            
            ::-webkit-scrollbar-thumb{
                background-color: #353b48;
            }

            body {
                margin:0;
                padding:0;
                font-family: sans-serif;
                background: linear-gradient(#141e30, #243b55);
                color: white;
            }

            .logo{
                width: 88px;
                height: 92px;
                background-image: url(../images/GDA_logo_invertito.png);
                background-size: contain;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                width: 20%;
                background: rgba(0,0,0,.5);
                position: fixed;
                height: 100%;
                overflow: auto;
            }

            li a {
                display: block;
                color: white;
                padding: 15px 16px;
                text-decoration: none;
            }

            li a.active {
                background-color: #00cccc;
                color: white;
            }

            li a:hover:not(.active) {
                background-color: #394d4d;
                color: white;
            }
            .logoadjust{
                width: 75%;
                height: 60%;
                background-repeat: no-repeat;
                background-position-y: 100%;
                margin-left: 10%;
            }

            li i {
                margin-right: 20px;
            }

            .boxCasefile {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 400px;
                padding: 40px;
                transform: translate(-50%, -50%);
                background: rgba(0,0,0,.5);
                box-sizing: border-box;
                box-shadow: 0 15px 25px rgba(0,0,0,.6);
                border-radius: 10px;
            }

            .boxCasefile h2 {
                margin: 0 0 30px;
                padding: 0;
                color: #fff;
                text-align: center;
            }

            .boxCasefile .user-box {
                position: relative;
            }

            .boxCasefile .user-box input {
                width: 100%;
                padding: 10px 0;
                font-size: 16px;
                color: #fff;
                margin-bottom: 30px;
                border: none;
                border-bottom: 1px solid #fff;
                outline: none;
                background: transparent;
            }
            .boxCasefile .user-box label {
                position: absolute;
                top:0;
                left: 0;
                padding: 10px 0;
                font-size: 16px;
                color: #fff;
                pointer-events: none;
                transition: .5s;
            }

            .boxCasefile .user-box input:focus ~ label,
            .boxCasefile .user-box input:valid ~ label {
                top: -20px;
                left: 0;
                color: #03e9f4;
                font-size: 12px;
            }

            .boxCasefile form a{
                position: relative;
                display: inline-block;
                overflow: hidden;
            }
            .boxCasefile input[type="submit"]{
                border-width: 0px;
                border: none;
                background: none;
                position: relative;
                display: inline-block;
                padding: 10px 20px;
                color: #03e9f4;
                font-size: 16px;
                text-decoration: none;
                text-transform: uppercase;
                overflow: hidden;
                transition: .5s;
                letter-spacing: 4px
            }

            .boxCasefile input[type="submit"]:hover{
                background: #03e9f4;
                color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 5px #03e9f4,
                    0 0 25px #03e9f4,
                    0 0 50px #03e9f4,
                    0 0 100px #03e9f4;
            }

            .boxCasefile a span {
                position: absolute;
                display: block;
            }

            .boxCasefile a span:nth-child(1) {
                top: 0;
                left: -100%;
                width: 100%;
                height: 2px;
                background: linear-gradient(90deg, transparent, #03e9f4);
                animation: btn-anim1 1s linear infinite;
            }

            @keyframes btn-anim1 {
                0% {
                left: -100%;
                }
                50%,100% {
                left: 100%;
                }
            }

            .boxCasefile a span:nth-child(2) {
                top: -100%;
                right: 0;
                width: 2px;
                height: 100%;
                background: linear-gradient(180deg, transparent, #03e9f4);
                animation: btn-anim2 1s linear infinite;
                animation-delay: .25s
            }

            @keyframes btn-anim2 {
                0% {
                top: -100%;
                }
                50%,100% {
                top: 100%;
                }
            }

            .boxCasefile a span:nth-child(3) {
                bottom: 0;
                right: -100%;
                width: 100%;
                height: 2px;
                background: linear-gradient(270deg, transparent, #03e9f4);
                animation: btn-anim3 1s linear infinite;
                animation-delay: .5s
            }

            @keyframes btn-anim3 {
                0% {
                right: -100%;
                }
                50%,100% {
                right: 100%;
                }
            }

            .boxCasefile a span:nth-child(4) {
                bottom: -100%;
                left: 0;
                width: 2px;
                height: 100%;
                background: linear-gradient(360deg, transparent, #03e9f4);
                animation: btn-anim4 1s linear infinite;
                animation-delay: .75s
            }

            @keyframes btn-anim4 {
                0% {
                bottom: -100%;
                }
                50%,100% {
                bottom: 100%;
                }
            }
        </style>
        <body>
            <ul>
                <li><a href="../adminIndex.html"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
                <li><a class="active" href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
                <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
                <li><a href="../addUser.html"><i class="fas fa-user-plus"></i>Add User</a></li>
                <li><a href="../checkInvestigator.html"><i class="fas fa-user-check"></i>Check Investigator</a></li>
                <li><a href="../addInvestigator.html"><i class="fas fa-user-plus"></i>Add Investigator</a></li>
                <li><a href="../index.html"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
                <li class="logo logoadjust"></li>
            </ul>
            <div style="margin-left:21%;padding:1px 16px;height:1000px;">
                <div class="boxCasefile">
                    <h2><?php echo "Casefile found, data printout:"?></h2>
                    <?php
                        $query = "select * from casefile where titolo='$title'";

                        $result = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($result);

                        $count = mysqli_num_rows($result);

                        echo "<strong style=\"color:#fcba03\";>Title: </strong>" . $row['titolo'] . "<br>";
                        echo "<strong style=\"color:#fcba03\";>Description: </strong>" . $row['descrizione'] . "<br>";
                        $cliente = $row['IDC'];
                        $investigatore = $row['IDI'];

                        $query = "select nome, cognome from cliente where ID='$cliente'";

                        $result = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($result);

                        $count = mysqli_num_rows($result);
                        echo "<strong style=\"color:#fcba03\";>Client: </strong>" . $row['nome'] . " " . $row['cognome'] . "<br>";

                        $query = "select nome, cognome from investigatore where ID='$investigatore'";

                        $result = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($result);

                        $count = mysqli_num_rows($result);
                        echo "<strong style=\"color:#fcba03\";>Investigator: </strong>" . $row['nome'] . " " . $row['cognome'] . "<br>";

                    ?>
                </div>
            </div>
        </body>
    </html>
}
<?php
    }else{?>
        <html>
        <head>
            <script src = "https://smtpjs.com/v3/smtp.js"></script>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
            <link rel="stylesheet" href="css/casefile.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
            <script src="js/scripts.js"></script>
            <script src="js/email.js"></script>
            <title>Investigators' Index</title>
        </head>
        <style>
            *{
                margin: 0;
                padding: 0;
                text-decoration: none;
                font-family: "Ubuntu",sans-serif;
                box-sizing: border-box;
            }

            html{
                scroll-behavior: smooth;
            }
            ::selection{
                background-color: #48dbfb60;
            }
            
            ::-webkit-scrollbar{
                width: 10px;
                background-color: #f1f1f1;
            }
            
            ::-webkit-scrollbar-thumb{
                background-color: #353b48;
            }

            body {
                margin:0;
                padding:0;
                font-family: sans-serif;
                background: linear-gradient(#141e30, #243b55);
                color: white;
            }

            .logo{
                width: 88px;
                height: 92px;
                background-image: url(../images/GDA_logo_invertito.png);
                background-size: contain;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                width: 20%;
                background: rgba(0,0,0,.5);
                position: fixed;
                height: 100%;
                overflow: auto;
            }

            li a {
                display: block;
                color: white;
                padding: 15px 16px;
                text-decoration: none;
            }

            li a.active {
                background-color: #00cccc;
                color: white;
            }

            li a:hover:not(.active) {
                background-color: #394d4d;
                color: white;
            }
            .logoadjust{
                width: 75%;
                height: 60%;
                background-repeat: no-repeat;
                background-position-y: 100%;
                margin-left: 10%;
            }

            li i {
                margin-right: 20px;
            }

            .boxCasefile {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 400px;
                padding: 40px;
                transform: translate(-50%, -50%);
                background: rgba(0,0,0,.5);
                box-sizing: border-box;
                box-shadow: 0 15px 25px rgba(0,0,0,.6);
                border-radius: 10px;
            }

            .boxCasefile h2 {
                margin: 0 0 30px;
                padding: 0;
                color: #fff;
                text-align: center;
            }

            .boxCasefile .user-box {
                position: relative;
            }

            .boxCasefile .user-box input {
                width: 100%;
                padding: 10px 0;
                font-size: 16px;
                color: #fff;
                margin-bottom: 30px;
                border: none;
                border-bottom: 1px solid #fff;
                outline: none;
                background: transparent;
            }
            .boxCasefile .user-box label {
                position: absolute;
                top:0;
                left: 0;
                padding: 10px 0;
                font-size: 16px;
                color: #fff;
                pointer-events: none;
                transition: .5s;
            }

            .boxCasefile .user-box input:focus ~ label,
            .boxCasefile .user-box input:valid ~ label {
                top: -20px;
                left: 0;
                color: #03e9f4;
                font-size: 12px;
            }

            .boxCasefile form a{
                position: relative;
                display: inline-block;
                overflow: hidden;
            }
            .boxCasefile input[type="submit"]{
                border-width: 0px;
                border: none;
                background: none;
                position: relative;
                display: inline-block;
                padding: 10px 20px;
                color: #03e9f4;
                font-size: 16px;
                text-decoration: none;
                text-transform: uppercase;
                overflow: hidden;
                transition: .5s;
                letter-spacing: 4px
            }

            .boxCasefile input[type="submit"]:hover{
                background: #03e9f4;
                color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 5px #03e9f4,
                    0 0 25px #03e9f4,
                    0 0 50px #03e9f4,
                    0 0 100px #03e9f4;
            }

            .boxCasefile a span {
                position: absolute;
                display: block;
            }

            .boxCasefile a span:nth-child(1) {
                top: 0;
                left: -100%;
                width: 100%;
                height: 2px;
                background: linear-gradient(90deg, transparent, #03e9f4);
                animation: btn-anim1 1s linear infinite;
            }

            @keyframes btn-anim1 {
                0% {
                left: -100%;
                }
                50%,100% {
                left: 100%;
                }
            }

            .boxCasefile a span:nth-child(2) {
                top: -100%;
                right: 0;
                width: 2px;
                height: 100%;
                background: linear-gradient(180deg, transparent, #03e9f4);
                animation: btn-anim2 1s linear infinite;
                animation-delay: .25s
            }

            @keyframes btn-anim2 {
                0% {
                top: -100%;
                }
                50%,100% {
                top: 100%;
                }
            }

            .boxCasefile a span:nth-child(3) {
                bottom: 0;
                right: -100%;
                width: 100%;
                height: 2px;
                background: linear-gradient(270deg, transparent, #03e9f4);
                animation: btn-anim3 1s linear infinite;
                animation-delay: .5s
            }

            @keyframes btn-anim3 {
                0% {
                right: -100%;
                }
                50%,100% {
                right: 100%;
                }
            }

            .boxCasefile a span:nth-child(4) {
                bottom: -100%;
                left: 0;
                width: 2px;
                height: 100%;
                background: linear-gradient(360deg, transparent, #03e9f4);
                animation: btn-anim4 1s linear infinite;
                animation-delay: .75s
            }

            @keyframes btn-anim4 {
                0% {
                bottom: -100%;
                }
                50%,100% {
                bottom: 100%;
                }
            }
        </style>
        <body>
            <ul>
                <li><a href="../invIndex.html"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
                <li><a class="active" href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
                <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <li><a href="../index.html"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
                <li class="logo logoadjust"></li>
            </ul>
            <div style="margin-left:21%;padding:1px 16px;height:1000px;">
                <div class="boxCasefile">
                    <h2><?php echo "Casefile found, data printout:"?></h2>
                    <?php
                        $query = "select * from casefile where titolo='$title'";

                        $result = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($result);

                        $count = mysqli_num_rows($result);

                        echo "<strong style=\"color:#fcba03\";>Title: </strong>" . $row['titolo'] . "<br>";
                        echo "<strong style=\"color:#fcba03\";>Description: </strong>" . $row['descrizione'] . "<br>";
                        $cliente = $row['IDC'];
                        $investigatore = $row['IDI'];

                        $query = "select nome, cognome from cliente where ID='$cliente'";

                        $result = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($result);

                        $count = mysqli_num_rows($result);
                        echo "<strong style=\"color:#fcba03\";>Client: </strong>" . $row['nome'] . " " . $row['cognome'] . "<br>";

                        $query = "select nome, cognome from investigatore where ID='$investigatore'";

                        $result = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($result);

                        $count = mysqli_num_rows($result);
                        echo "<strong style=\"color:#fcba03\";>Investigator: </strong>" . $row['nome'] . " " . $row['cognome'] . "<br>";

                    ?>
                </div>
            </div>
        </body>
    </html>
<?php
    }
    }else{
            echo "Casefile inesistente o non hai i permessi per visualizzarlo, verrai reindirizzato alla pagina di ricerca.";
            sleep(5);
            header("Location: checkCasefilePage.php");
        }
?>