<?php
$servername = "mysql_db";
$username = "dbuser";
$password = "Fotled#23";
$dbname = "Pant_avfall";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$comment = $_POST['comment'];
$pop_up_id = $_POST['site_id'];
$site_Name = $_POST['Name'];

$sql = "INSERT INTO kommentar (pop_up_id, name, kommentar) VALUES ('$pop_up_id', '$name', '$comment')";


if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header("Location: milha.php?site_id=$pop_up_id&Name=$site_Name");
    
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
?>
