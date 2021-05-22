<?php
     if (isset($_POST['submit'])) {
        $name = "raff";
        $subjects = $_REQUEST["subject"];
        $email = "difendiamolanoia77@gmail.com";
        $message = $_REQUEST['message'];

      // Set your email address where you want to receive emails. 
       $to = 'difendiamolanoia@gmail.com';
       $subject = $subjects;
       $headers = "From: ".$name." <".$email."> \r\n";
       $send_email = mail($to,$subject,$message,$headers);

       echo ($send_email) ? 'success' : 'error';

    }
?>