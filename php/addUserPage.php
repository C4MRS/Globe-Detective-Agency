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
        <script type="text/javascript">
          function resetS(){
            <?php session_unset();?>
          }
        </script>
        <title>Admins' Index</title>
    </head>
    <body>
        <ul>
            <li><a href="adminIndexPage.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="addCasefilePage.php"><i class="fas fa-file-alt" style="margin-right: 25px;"></i>Add Casefile</a></li>
            <li><a href="checkCasefilePage.php"><i class="fas fa-search"></i>Check Casefile</a></li>
            <li><a href="checkUserPage.php"><i class="fas fa-user-check"></i>Check User</a></li>
            <li><a class="active" href="addUserPage.php"><i class="fas fa-user-plus"></i>Add User</a></li>
            <li><a href="checkInvestigatorPage.php"><i class="fas fa-user-check"></i>Check Investigator</a></li>
            <li><a href="addInvestigatorPage.php"><i class="fas fa-user-plus"></i>Add Investigator</a></li>
            <li><a href="../index.html" onclick="resetS()"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
            <li class="logo logoadjust"></li>
        </ul>
        <div style="margin-left:21%;padding:1px 16px;height:1000px;">
            <div class="boxCasefile">
                <h2>Add a new User</h2>
                <form method="post" action="addUser.php" id="addUserForm">
                  <div class="user-box">
                    <input type="text" name="name" title="Insert client's name" required>
                    <label>Name</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="surname" title="Insert client's surname" required="">
                    <label>Surname</label>
                  </div>
                  <div class="user-box">
                    <input type="text" name="gender" pattern="[MFO]{1}" title="Insert M for Male, F for Female, O for Other" required>
                    <label>Gender</label>
                  </div>
                  <div class="user-box">
                    <input type="email" name="email" title="Insert client's email" required>
                    <label>Client's email</label>
                  </div>
                  <div class="user-box">
                    <input type="password" name="password" title="Insert client's password" required>
                    <label>Password</label>
                  </div>
                  <div class="user-box">
                    <input type="tel" name="cell" pattern="[0-9]{10}" required>
                    <label>Cellphone</label>
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