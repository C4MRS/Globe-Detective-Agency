<?php

$db_name = 'gda';
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$password = $_POST["password"];
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
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <script src="js/scripts.js"></script>
  <title>Login</title>
  <script>
      function myFunction() {
            alert("User already present with this email!");
        }
  </script>
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

        .navbar{
            position: fixed;
            background-color: transparent;
            width: 100%;
            padding: 30px 0;
            top: 0;
            z-index: 999;
            transition: .3s linear;
        }

        .inner-width{
            max-width: 1300px;
            margin: auto;
            padding: 0 40px;
        }

        .navbar .inner-width{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo{
            width: 88px;
            height: 92px;
            background-image: url(../images/GDA_logo_invertito.png);
            background-size: contain;
        }

        .menu-toggler{
            background: none;
            width: 30px;
            border: none;
            cursor: pointer;
            position: relative;
            outline: none;
            z-index: 999;
            display: none;
        }

        .menu-toggler span{
            display: block;
            height: 3px;
            background-color: #fff;
            margin: 6px 0;
            position: relative;
            transition: .3s linear;
        }

        .navbar-menu a{
            color: #fff;
            font-size: 15px;
            font-weight: 500;
            margin-left: 30px;
            transition: .2s linear;
        }

        .navbar-menu a:hover{
            color: #48dbfb !important;
        }

        .sticky{
            background-color: #fff;
            padding: 18px 0;
        }

        .sticky .logo{
            background-image: url(../images/GDA_logo_auto_x2.png);
        }

        .sticky .navbar-menu a{
            color: #111;
        }

        .sticky .menu-toggler span{
            background-color: #111;
        }

        #home{
            height: 100vh;
            min-height: 500px;
            background: url(../images/background.png) no-repeat center;
            background-size: cover;
            background-attachment: fixed;
        }

        #home .inner-width{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-align: center;
        }

        #home .content{
            width: 100%;
            color: #fff;
        }

        #home .content h1{
            font-size: 60px;
            margin-bottom: 60px;
        }

        #home .content h1::after{
            content: "HI WE ARE GLOBE DETECTIVE AGENCY";
            animation: textanim 10s linear infinite;
        }

        @keyframes textanim{
                25%{
                    content: "WE ARE RELIABLE";
                }
                50%{
                    content: "WE ARE SAFE";
                }
                75%{
                    content: "WE ARE EFFICIENT";
                }
            }

        .sm a{
            color: #fff;
            font-size: 22px;
            margin: 0 10px;
            transition: .2s linear;
        }

        .sm a:hover{
            color: #48dbfb;
        }

        #home .buttons{
            margin-top: 60px;
        }

        #home .buttons a{
            display: inline-block;
            margin: 15px 30px;
            color: #48dbfb;
            font-size: 15px;
            font-weight: 500;
            width: 180px;
            border: 1px solid #48dbfb;
            padding: 14px 0;
            border-radius: 6px;
            transition: .2s linear;
        }

        #home .buttons a:hover,
        #home .buttons a:nth-child(2)
        {
            background-color: #48dbfb;
            color: #fff;
        }

        section{
            padding: 100px 0;
            background-color: #f1f1f1;
        }

        .section-title{
            text-align: center;
            margin-bottom: 80px;
            position: relative;
            font-size: 26px;
            padding-bottom: 20px;
            color: #111;
        }

        .section-title::before{
            content: "";
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: #111;
            bottom: 0;
            left: calc(50% - 40px);
        }

        .section-title::after{
            content: "";
            position: absolute;
            width: 16px;
            height: 10px;
            background-color: #48dbfb;
            border: 4px solid #f1f1f1;
            left: calc(50% - 12px);
            bottom: -7px;
        }

        .about-content{
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .about-pic{
            width: 200px;
            border-radius: 50%;
            margin-right: 100px;
        }

        .about-text{
            flex: 1;
        }

        .about-text h3{
            margin: 10px 0;
            color: #444;
            font-size: 16px;
        }

        .about-text h3 span:nth-child(1):after,
        .about-text h3 span:nth-child(2):after{
            content: "";
            width: 6px;
            height: 6px;
            background-color: #444;
            display: inline-block;
            border-radius: 50%;
            margin: 0 14px;
        }

        .about-text p{
            font-size: 17px;
            text-align: justify;
            line-height: 26px;
            margin-top: 20px;
        }

        .skills{
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .skill{
            width: calc(50% - 20px);
            margin: 15px 0;
        }

        .skill-info{
            display: flex;
            justify-content: space-between;
        }

        .skill-bar{
            height: 3px;
            background-color: #ddd;
            margin-top: 14px;
            position: relative;
        }

        .skill-bar::after{
            content: "";
            position: absolute;
            height: 6px;
            background-color: #48dbfb;
            bottom: 0;
        }

        .reliability:after{
            width: 100%;
        }

        .sCases:after{
            width: 99%;
        }

        .staff:after{
            width: 100%;
        }

        .uCases:after{
            width: 1%;
        }

        .safety:after{
            width: 100%;
        }

        .looking:after{
            width: 40%;
        }

        section.dark{
            background-color: #353b48;
        }

        section.dark .section-title{
            color: #f1f1f1;
        }

        section.dark .section-title::before{
            background-color: #f1f1f1;
        }

        section.dark .section-title::after{
            border: 4px solid #353b48;
        }

        .services{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .service{
            width: calc(33% - 20px);
            text-align: center;
            border: 1px solid #48dbfb;
            border-radius: 6px;
            margin: 20px 0;
            padding: 40px 20px;
            color: #fff;
            cursor: pointer;
            transition: .3s linear;
        }

        .service .icon{
            color: #48dbfb;
            font-size: 40px;
            margin-bottom: 20px;
            transition: .3s linear;
        }

        .service h4{
            font-size: 16px;
            margin-bottom: 6px;
        }

        .service:hover{
            background-color: #48dbfb;
        }

        .service:hover .icon{
            color: #fff;
        }

        .time-line,.works{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .block{
            width: calc(50% - 20px);
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 10px 0;
            padding: 30px;
            position: relative;
        }

        .block::before{
            content: "";
            position: absolute;
            width: 1px;
            height: 120%;
            background-color: #ddd;
            left: -20px;
            top: 50%;
            transform: translateY(-50%);
        }

        .block::after{
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            background-color: #48dbfb;
            left: -28px;
            top: 30px;
            border-radius: 50%;
        }

        .block h3{
            font-size: 16px;
            margin: 10px 0;
        }

        .block p{
            font-size: 15px;
            color: #444;
        }

        .work{
            width: calc(33% - 10px);
            overflow: hidden;
            border-radius: 6px;
            margin: 10px 0;
            cursor: pointer;
            position: relative;
        }

        .work img{
            width: 100%;
            height: 100%;
            transition: .4s linear;
        }

        .work::before{
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-color: #48dbfbcc;
            transition: .2s linear;
            opacity: 0;
            transform: scale(0);
        }

        .work .info{
            position: absolute;
            z-index: 2;
            bottom: 40px;
            left: 40px;
            color: #fff;
            transition: .4s linear;
            opacity: 0;
        }

        .work:hover img{
        transform: scale(1.6) rotate(25deg);
        }

        .work:hover::before,
        .work:hover .info
        {
        opacity: 1;
        transform: scale(1);
        }

        .contact-info{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-bottom: 60px;
        }

        .contact-info .item{
        width: calc(33% - 20px);
        height: 160px;
        background-color: #353b48;
        color: #fff;
        text-align: center;
        border-radius: 4px;
        cursor: pointer;
        transition: .3s linear;
        }

        .contact-info i{
        display: block;
        font-size: 40px;
        line-height: 120px;
        height: 100px;
        }

        .contact-info .item:hover{
        background-color: #48dbfb;
        }

        .contact-form{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        }

        .contact-form input, .contact-form textarea{
        width: 100%;
        height: 50px;
        margin: 10px 0;
        background-color: #353b48;
        border: none;
        outline: none;
        padding: 20px;
        border-radius: 4px;
        color: #fff;
        }

        .nameZone, .emailZone{
        max-width: calc(50% - 10px);
        }

        .messageZone{
        min-height: 200px;
        resize: vertical;
        }

        .contact-form .btn{
        width: 180px;
        background-color: transparent;
        color: #48dbfb;
        font-size: 16px;
        border: 2px solid #48dbfb;
        padding: 0;
        margin-left: auto;
        cursor: pointer;
        transition: .3s linear;
        }

        .contact-form .btn:hover{
        background-color: #48dbfb;
        color: #fff;
        }

        footer{
        color: #fff;
        padding: 80px 0;
        text-align: center;
        }
        .foot{
        background: url(../images/background.png) no-repeat center;
        }
        .footerr{
        color: #fff;
        padding: 80px 0;
        text-align: center;
        clear: both;
        position: relative;
        height: 105px;
        margin-top: 818px;
        }

        .copyright{
        margin-bottom: 20px;
        font-size: 15px;
        }

        .copyright a{
        font-size: 16px;
        color: #48dbfb;
        font-weight: 500;
        }

        .goTop{
        position: fixed;
        z-index: 999;
        bottom: 40px;
        right: 40px;
        width: 40px;
        height: 40px;
        background-color: #48dbfb;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        color: #fff;
        outline: none;
        display: none;
        }

        @media screen and (max-width: 980px){
        .menu-toggler{
            display: block;
        }

        .navbar-menu{
            position: fixed;
            height: 100vh;
            width: 100%;
            background-color: #353b48;
            top: 0;
            right: -100%;
            max-width: 400px;
            padding: 80px 50px;
            transition: .3s linear;
        }

        .navbar-menu a{
            display: block;
            font-size: 30px;
            margin: 30px 0;
        }

        .sticky .navbar-menu{
            background-color: #f1f1f1;
        }
        
        .navbar-menu.active{
            right: 0;
        }

        .menu-toggler.active span:nth-child(1){
            transform: rotate(-45deg);
            top: 4px;
        }

        .menu-toggler.active span:nth-child(2){
            opacity: 0;
        }

        .menu-toggler.active span:nth-child(3){
            transform: rotate(45deg);
            bottom: 14px;
        }

        .inner-width{
            max-width: 800px;
        }

        .about-pic{
            margin: 0 auto 60px;
        }

        .about-text{
            flex: 100%;
            text-align: center;
        }

        .service{
            width: calc(50% - 20px);
        }

        .block{
            width: calc(100% - 20px);
            margin-left: auto;
        }

        .work{
            width: calc(50% - 10px);
        }

        .contact-info .item{
            width: 100%;
            margin: 10px 0;
        }
        }

        @media screen and (max-width: 600px){
        .inner-width{
            padding: 0 20px;
        }

        .skill{
            width: 100%;
        }

        .service{
            width: 100%;
        }

        .work{
            width: 100%;
        }

        .nameZone, .emailZone{
            max-width: 100%;
        }
        }
        /*TODO: TEST BETTER LOGIN AND REGISTER*/
        .bodyLOGIN{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        }

        .box{
        width: 300px;
        padding: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        background: #191919;
        text-align: center;
        }
        .box h1{
        color:white;
        text-transform: uppercase;
        font-weight: 700;
        }
        .box input[type = "email"], .box input[type = "password"], .box input[type = "text"], .boxTEL{
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #3498db;
        padding: 14px 10px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        }
        .box input[type = "email"]:focus, .box input[type = "password"]:focus, .box input[type = "text"]:focus, .boxTEL:focus{
        width: 100%;
        border-color: #2ecc71;
        }
        .box input[type = "button"], .box input[type = "submit"] {
        border:0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #2ecc71;
        padding: 14px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer;
        }
        .showALLB {
        border:0;
        background: none;
        display: block;
        margin: 20px 90px;
        text-align: center;
        border: 2px solid #2ecc71;
        padding: 14px 15px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer;
        margin-left: 55px;
        }
        .loginButton {
        border:0;
        background: none;
        display: block;
        margin: 20px 90px;
        text-align: center;
        border: 2px solid #2ecc71;
        padding: 14px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer;
        margin-left: 22%;
        }
        .showALL {
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #3498db;
        padding: 14px 10px;
        width: 200px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        margin-left: -37px;
        }
        .box input[type = "submit"]:hover, .box input[type = "button"]:hover{
        background: #2ecc71;
        }
        .signin{
        background-color: #111;
        }
        .hidden {
        display: none;
        }
  </style>
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
    echo "<br>Il tuo nome è: " . $nome;
    echo "<br>Il tuo cognome è: " . $cognome;
    echo "<br>La tua email è: " . $email;
    echo "<br>La tua password è: " . $password;
    echo "<br>La tua email è: " . $email;
    echo "<br>Il tuo numero di telefono è: " . $telefono;
    if ($sesso == "M")
        echo "<br> Il tuo sesso è: Maschio";
    elseif ($sesso == "F")
        echo "<br> Il tuo sesso è: Femmina";
    else
        echo "<br> Il tuo sesso è: Altro";


    echo "Ora verrai reindirizzato alla pagina di Login!";
    sleep(5);
    header("Location: ../login.html");
    exit();
}
?>
