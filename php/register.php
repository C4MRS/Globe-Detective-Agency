<?php

$db_name = 'gda';
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$telefono = $_POST["telefono"];
$sesso = $_POST["sesso"];

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

$sql = "INSERT INTO cliente (nome, cognome, sesso, email, password, cell) values (?, ?, ?, ?, ?, ?)";
$stmt = $link->prepare($sql);
$stmt->bind_param("ssssss", $nome, $cognome, $sesso, $email, $password, $telefono);

$sql = "select email from cliente where email='$email'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
    ?>
<!DOCTYPE html>
<html class="signin">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <script src="js/scripts.js"></script>
  <title>Login</title>
  <script>
      function myFunction() {
            alert("User already present with this email!");
        }
  </script>

</head>


<body onload="myFunction()">
<!-- Navbar -->
<nav class="navbar">
    <div class="inner-width">
      <a href="index.html#home" class="logo"></a>
      <button class="menu-toggler">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-menu">
        <a href="index.html#home">Home</a>
        <a href="index.html#about">About</a>
        <a href="index.html#services">Services</a>
        <a href="index.html#awards">Awards</a>
        <a href="index.html#works">Works</a>
        <a href="index.html#contact">Contact</a>
        <a href="signin.html">Sign in</a>
      </div>
    </div>
</nav>

<form class="box" method="post" action="php/login.php">
    <h1>ACCEDI</h1><br>
    <input id="EM" type="email" name="email" placeholder="Your@Email.com" required maxlength="100">
    <input id="Psw" type="password" name="password" placeholder="Password" required maxlength="20"><br>
    <input type="submit" class="loginButton" value="Accedi"><br>
</form>
<!-- Footer -->
<footer class="footerr">
    <div class="inner-width">
      <div class="copyright">
        &copy; 2021 | Created for <a href="index.html#home">Globe Detective Agency</a>
      </div>
      <div class="sm">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin-in"></a>
        <a href="#" class="fab fa-youtube"></a>
      </div>
    </div>
  </footer>
</body>
</html>
<?php
} else {
    $stmt->execute();
    header("Location: ../login.html");
    exit();
}
?>

