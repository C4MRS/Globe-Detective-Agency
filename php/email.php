<?php
   session_start();

   $subject = $_POST["subject"];

   $content = "From: " . $_SESSION["email"] . "\nMsg:\n" . $_POST["message"] . "\n\nMessage End!!";

   function controllo($conn_info, $query)
   {
      if (mysqli_query($conn_info, $query)) {
         echo "Comando eseguito con successo<br>";
      } else {
         echo mysqli_error($conn_info);
      }
   }

   $conn = mysqli_connect("localhost", "root", "", "gda");

   mail("difendiamolanoia@gmail.com", $ogg, $content);

   echo "<script>
         alert('Message sent successfully! You will now be redirected at the Homepage!');
         window.location = 'loggedindex.php#contact';
         </script>";