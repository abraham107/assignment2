<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Clubs</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
  <?php
  $clubId = null;
  $cluName = null;
  $ground = null;

  if (isset($_GET['clubId'])) {
    if (is_numeric($_GET['clubId'])) {
      $clubId = $_GET['clubId'];

      $db = new PDO('mysql:host=172.31.22.43;dbname=Abraham200491120', 'Abraham200491120', '5IdK3ahyFi');
      $sql = "SELECT * FROM clubs WHERE clubId = :clubId";
      $cmd = $db->prepare($sql);
      $cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);
      $cmd->execute();

      $club = $cmd->fetch();
      $clubName = $club['clubName'];
      $ground = $club['ground'];

      $db = null;
    }
  }
  ?>
<h2>English Football Clubs</h2>
<form method="post" action="table.php">
  <div class="container-fluid">
    <label for="clubName">Club-Name:</label><br>
    <input type="text" id="clubName" name="clubName" required value="<?php echo $clubName; ?>" />
    <br>
    <label for="ground">Ground:</label><br>
    <input type="text" id="ground" name="ground" required value="<?php echo $ground; ?>" />
    <br>
    <br>
    <input name="clubId" id="clubId" value="<?php echo $clubId; ?>" type="hidden" />
    <button>submit</button>
  
  </div>
</form> 
<p>Click the Button to save Information.</p>

</body>
</html>