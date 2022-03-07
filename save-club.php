<!DOCTYPE html>
    <html lang = "en">
        <head>
            <meta charset="utf-8" />
            <title>Saving Data</title>
        </head>
        <body>
            <?php

            $clubName = $_POST['clubName'];
            $ground = $_POST['ground'];
            $clubId = $_POST['clubId'];
            

            $db = new PDO('mysql:host=172.31.22.43;dbname=Abraham200491120', 'Abraham200491120', '5IdK3ahyFi');

            if (empty($clubId)) {

            $sql = "INSERT INTO clubs (clubName, ground) VALUES (:clubName, :ground)";
        }
        else {
            $sql = 'UPDATE clubs SET clubName = :clubName, ground = :ground WHERE clubId = :clubId';
        }
            $cmd = $db->prepare($sql);

            $cmd->bindParam(':clubName', $clubName, PDO::PARAM_STR, 50);
            $cmd->bindParam(':ground', $ground, PDO::PARAM_STR, 50);
            if (isset($clubId)) {
                $cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);

            }

            $cmd->execute();

            $db = null;

            echo "Saved";

            ?>
        </body>
    </html>
            