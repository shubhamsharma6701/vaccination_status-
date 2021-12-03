<?php
    $insert = false;
    if(isset($_POST['aadhar_number'])){
        $server = 'localhost';
        $username = 'root';
        $password = '';

        $connection = mysqli_connect($server, $username, $password);
        if(!$connection)
            die("Connection to the database failed".mysqli_connect_error());
        $aadhar_number = $_POST['aadhar_number'];
        $side_effect = $_POST['side_effect'];

        $mysql = "INSERT INTO 'vaccination_status'.'side_effects_reported'('aadhar_number', 'side_effect') VALUES('$aadhar_number', '$side_effect');";

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
        Side Effects Reported
    </title>
</head>
<link rel="stylesheet" href = "side_effect.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <form id = "form" action="side_effects.php" method="post">
            Aadhar Number: <input style = "width:200px;" class = "number" type="text" name = "aadhar_number"><br><br>
            Side Effect: <textarea id="" cols="30" rows="10" name = "side_effect"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>