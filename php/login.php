<?php
session_start();
session_unset();

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}


$email = $_POST['email'];
$password = $_POST['password'];

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

    echo $row['nome'] . "<br>";
    $_SESSION["nome"] = $row['nome'];
    echo $row['cognome'] . "<br>";
    echo $row['email'] . "<br>";
    echo $row['telefono'] . "<br>";
    echo $row['sesso'];
    if ($row['admin'] == 1) {
        $_SESSION["ID"] = $row['ID'];
        echo "Attivazione modalità Amministratore, attendere prego!";
        sleep(5);
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
            //Crea delle variabili di sessione in cui vengono salvate le credenziali di accesso dell'utente
            $_SESSION["email"] = $email;
        
            echo "Accesso riuscito, stampa dei dati: <br>";
        
            $query = "select * from cliente where email='$email' and password='$password'";
        
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);
        
            $count = mysqli_num_rows($result);
        
            echo $row['nome'] . "<br>";
            $_SESSION["nome"] = $row['nome'];
            echo $row['cognome'] . "<br>";
            $_SESSION["cognome"] = $row['cognome'];
            echo $row['email'] . "<br>";
            echo $row['telefono'] . "<br>";
            echo $row['sesso'];
            header("Location: ../loggedIndex.html");
            exit();
        }
    }
    header("Location: ../login.html");