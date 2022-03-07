<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Deleting club</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<body>
    <?php
    if (isset($_GET['clubId'])) {
        if(is_integer($_GET['clubId'])) {
            $musicId = $_GET['clubId'];

            // connecting to db
            $db = new PDO('mysql:host=172.31.22.43;dbname=Abraham200491120', 'Abraham200491120', '5IdK3ahyFi');

            // setup SQL DELETE
            $sql = "DELETE FROM clubs WHERE clubId = :clubId";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);

            $cmd->execute();

            $db = null;

            echo '<h1>Club Removed<h1> <a href="table.php">Back to Club list</a>';

        }
        else {
            echo "Error";
        }
    }
    ?>