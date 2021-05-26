<?php
$mysqli = new mysqli("localhost", "root", "", "gda");
if($mysqli->connect_error) {
  exit('Could not connect');
}
$q=$_GET['q'];
$sql = "SELECT * from cliente where email='$q'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1){
echo "<strong>ID: </strong>".$row['ID']."<br><strong>Nome: </strong>".$row['nome']."<br><strong>Cognome: </strong>".$row['cognome']."<br><strong>Sesso: </strong>".$row['sesso']."<br><strong>Email:</strong> ".$row['email']."<br><strong>Cellulare:</strong> ".$row['cell'];
}
?>