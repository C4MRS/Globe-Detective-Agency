<?php
    session_start();
    if(isset($_SESSION["ID"])){
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
            <li><a class="active" href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
            <li><a href="addUserPage.php"><i class="fas fa-user-plus"></i>Add User</a></li>
            <li><a href="checkInvestigatorPage.php"><i class="fas fa-user-check"></i>Check Investigator</a></li>
            <li><a href="addInvestigatorPage.php"><i class="fas fa-user-plus"></i>Add Investigator</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
                <h2>Check an existing User</h2>
                <form method="post" action="checkUser.php" id="userForm">
                  <div class="user-box">
                    <input type="email" name="email" title="Insert user's email" required>
                    <label>Email</label>
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
    }elseif(isset($_SESSION["nome"])){
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
    </head>
    <body>
        <ul>
            <li><a href="invIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
            <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
            <li><a class="active" href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
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
                <h2>Check an existing User</h2>
                <form method="post" action="checkUser.php" id="userForm">
                  <div class="user-box">
                    <input type="email" name="email" title="Insert user's email" required>
                    <label>Email</label>
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
        header("location: ../login.html");
        exit();
    }
?>