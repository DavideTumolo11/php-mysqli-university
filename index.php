<?php

define('DB_SERVERNAME', 'localhost:3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', '01_university');


$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);


//var_dump($connection);


if ($connection && $connection->connect_error) {
    echo 'database connection failed';
    die;
}

$sqlYear = "SELECT * FROM `students` WHERE YEAR (`date_of_birth`) = 1990";
$resultYear = $connection->query($sqlYear);

$sqlDegrees = "SELECT `name`, `period`,`year` FROM `courses` WHERE `period` = 'I semestre' and `year` = 1";
$resultDegrees = $connection->query($sqlDegrees);

$sqlAllDegrees = "SELECT `name` FROM `degrees`";
$resultAllDegrees = $connection->query($sqlAllDegrees);



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
</head>

<body>


    <?php while ($row = $resultYear->fetch_assoc()) :

        ['date_of_birth' => $date_of_birth] = $row;

    ?>


        <div>
            <p>Students born in 1990 <strong><?= $date_of_birth ?></strong></p>
        </div>




    <?php endwhile; ?>



    <?php while ($row = $resultDegrees->fetch_assoc()) :

        ['name' => $name] = $row;
        ['period' => $period] = $row;

    ?>


        <div>
            <p>Name of Courses <strong><?= $name ?></strong></p>
            <p>period <strong><?= $period ?></strong></p>
        </div>



    <?php endwhile; ?>



    <?php while ($row = $resultAllDegrees->fetch_assoc()) :

        ['name' => $name] = $row;

    ?>


        <div>
            <p>All degrees <strong><?= $name ?></strong></p>
        </div>



    <?php endwhile; ?>






</body>

</html>