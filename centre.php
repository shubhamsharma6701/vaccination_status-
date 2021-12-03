<?php
    $insert = false;
    if(isset($_POST['centre_id'])){
        $server = "localhost";
        $username = "root";
        $password = "";

        $connection = mysqli_connect($server, $username, $password);
        if(!$connection)
            die("Connection to the database failed". mysqli_connect_error());
        $centre_id = $_POST['centre_id'];
        $centre_location = $_POST['centre_location'];
        $age_group = $_POST['age_group'];

        $mysql = "INSERT INTO `vaccination_status`.`vaccination_centres`(`centre_id`, `centre_location`, `age_group`) VALUES('$centre_id', '$centre_location', '$age_group');";

        if($connection->query($mysql) == TRUE){
            $insert = true;
        }
        else{
            echo "Error: $mysql <br> $connection->error";
        }
        $connection->close();
    }

?>

<!DOCTYPE html>
<head>
    <title>
        Centre
    </title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="centre.css">
<body>
    <div id = "header">
        <h3>Welcome to the Vaccination Status Portal</h3>
        <a href="index.php">Vaccinated Person</a>
        <a href="centre.php">New Centre</a>
        <a href="side_effects.php">Side Effects</a>
    </div>
    <div>
        <?php
            if($insert == true)
                echo "New centre successfully inserted in the database <br>";
        ?>
        <form id = "form" action="centre.php" method="post">
            Centre ID: <input type="text" name = "centre_id"><br><br>
            Centre Location: <input type="text" name = "centre_location"><br><br>
            Age Group: <input type="text" name = "age_group"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html> 