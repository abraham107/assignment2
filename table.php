<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Clubs</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="js/script.js" type="text/javascript" defer></script>
    </head>
    <body>
        <h1>English Footbal Clubs</h1>
        <table class="table table-dark table-striped" border="3" width="100%">
            <thead>
                <tr>
                    <th>Club-Name</th>
                    <th>Ground</th>
                    <th>Measure</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db = new PDO('mysql:host=172.31.22.43;dbname=Abraham200491120', 'Abraham200491120', '5IdK3ahyFi');
                $sql = "SELECT * FROM clubs";

                $cmd = $db->prepare($sql);
                $cmd->execute();
                $clubs = $cmd->fetchAll();

                foreach ($clubs as $club) {
                    echo '<tr>
                    <td>
                    <a href="edit.php?clubId=' . $club['clubId'] . '">' . $club['clubName'] . '</a>
                    </td>
                    <td>' . $club['ground'] . '</td>
                    <td>
                    <a class="btn btn-danger"
                    onclick="return confirmDelete()"
                    href="delete-club.php?clubId=' . $club['clubId'] . '">Delete</a>
                    </td>
                    </tr>';
                }

                $db = null;
                ?>
            </tbody>
        </table>
    </body>
</html>