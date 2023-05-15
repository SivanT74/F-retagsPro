<?php
  $servername = "mysql_db";
  $username = "dbuser";
  $password = "Fotled#23";
  $dbname = "Pant_avfall";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  session_start();
  
  $site_Name = $_GET['Name'];
  $site_id = $_GET['site_id'];
  $txtsort = $_GET['Sort'];

  
  $result = mysqli_query($conn, "SELECT * FROM kommentar WHERE pop_up_ID = '$site_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="comments.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kommentarer</title>
    <script src="Recycling.js"></script>
    <script src="Sites.js"></script>
</head>
<body>
      <!-- Navbaren -->
      <ul class="nav">
        <li><a href="index.php" >Hem</a></li>
        <li><a href="Miljön.html" >Miljön</a></li>
        <li><a href="Omoss.html" >Om oss</a></li>
      </ul>
      <div class="adressbox">
      <h3 class="adressrubrik"><?php echo $site_Name; ?></h3>
      <h5 class="adressrubrik">
        <?php 
        $txtsort = str_replace(",", ",<br>", $txtsort);
        echo $txtsort; 
        ?>
      </h5>
      </div>
      <!-- Shows comments-->
      <div id="comments">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="comment">
      <div class="comment-header">
        <span class="comment-author"><?php echo $row["name"]; ?></span>
        <span class="comment-date"><?php echo $row["created_at"]; ?></span>
      </div>
      <div class="comment-body"><?php echo $row["kommentar"]; ?></div>
    </div>
  <?php } ?>
</div>

    <!-- form to submit comment -->
    <div id="wrap">
<form method="POST" action="submit_comment.php">
  <input type="hidden" name="site_id" value="<?php echo $site_id; ?>">
  <input type="hidden" name="Name" value="<?php echo $site_Name; ?>">
  <div class="form-group">
    <label for="name" class="CommText">Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="comment" class="CommText">Comment:</label>
    <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
  </div>
  <button type="submit" class="btn-btn-primary">Submit</button>
</form>

</body>
</html>