<?php
session_start();
session_unset();

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

$email = $_POST['email'];
//$password = generate_hash($_POST['password']);
//echo $password;

function controllo($conn_info, $query)     //Controlla in quel determinato collegamento se il comando inviato è stato eseguito con successo
{
    if (mysqli_query($conn_info, $query)) {
        echo "Comando eseguito con successo<br>";
    } else {
        echo mysqli_error($conn_info);
    }
}


$db_name = 'gda';

$link = mysqli_connect('localhost', 'root', ''); //Dichiara la connessione indicando indirizzo ip, nome utente e password, dandomi le informazioni necessarie riguardanti la connessione

if ($link) {
    echo 'connection successful<br> ';
} else {
    die('could not connect: ' . mysqli_error($link));            //Interrogando questa variabile possiamo sapere se la connessione è andata a buon fine, dando un messaggio di errore in caso contrario
}

$link->select_db($db_name);

//Ricavo della password tramite email cosicché sia possibile effettuare un confronto tra la password salvata nel database e la password inserita dall'utente
$query = "select email, password from cliente where email='$email'";

$result = mysqli_query($link, $query);  //Restituisce un true o false in base al completamento della query
$row = mysqli_fetch_assoc($result);

$count = mysqli_num_rows($result);
if($count == 1){
    $testingpw = $row['password'];
}
$length = strlen($testingpw);
$password = substr(crypt($_POST["password"],$testingpw), 0, $length);
$query = "select email, password from investigatore where email='$email' and password='$password'";

$result = mysqli_query($link, $query);  //Restituisce un true o false in base al completamento della query
$row = mysqli_fetch_assoc($result);

$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "Accesso riuscito, stampa dei dati: <br>";

    $query = "select * from investigatore where email='$email' and password='$password'";

    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);

    $count = mysqli_num_rows($result);

    $_SESSION["nome"] = $row['nome'];
    if ($row['admin'] == 1) {
        $_SESSION["ID"] = $row['ID'];
        header("Location: AdminIndexPage.php");
        exit();
    } else{
        header("Location: invIndexPage.php");
        exit();
    }
}else
    {
        $query = "select email, password from cliente where email='$email' and password='$password'";
        $result = mysqli_query($link, $query);  //Restituisce un true o false in base al completamento della query
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            //Crea una variabile di sessione in cui viene salvata l'email la quale utilizzerò in futuro
            $_SESSION["email"] = $email;
            header("Location: loggedIndexPage.php");
            exit();
        }
    }
    header("Location: ../login.html");