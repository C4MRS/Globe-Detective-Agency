<?php
$mysqli = new mysqli("localhost", "root", "", "gda");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$q=$_GET['q'];
$sql = "SELECT * from casefile where titolo='$q'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1){
    $titolo = $row['titolo'];
    $descrizione = $row['descrizione'];
    $IDI = $row['IDI'];
    $IDC = $row['IDC'];
    
    $nI = "";
    $cI = "";
    $nC = "";
    $cC = "";

    $sql2 = "SELECT nome,cognome from investigatore where ID='$IDI'";
    $result2 = mysqli_query($mysqli, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    if(mysqli_num_rows($result2)){
        $nI=$row2['nome'];
        $cI=$row2['cognome'];
    }
    $sql3 = "SELECT nome,cognome from cliente where ID='$IDC'";
    $result3 = mysqli_query($mysqli, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
    if(mysqli_num_rows($result3)){
        $nC=$row3['nome'];
        $cC=$row3['cognome'];
    }

    echo "<strong>Titolo: </strong>".$titolo."<br><strong>Descrizione: </strong>".$descrizione."<br><strong>Nome Cliente: </strong>".$nC." ".$cC."<br><strong>Nome Investigatore: </strong>".$nI." ".$cI."<br>";
}
?>