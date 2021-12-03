<?php
    $insert = false;
    if(isset($_POST['pname'])){
        $server = "localhost";
        $username = "root";
        $password = "";
        
        $connection = mysqli_connect($server, $username, $password);
        if(!$connection){
            die("Connection to the database failed". mysqli_connect_error());
        }
        $pname = $_POST['pname'];
        $aadhar_number = $_POST['aadhar_number'];
        $age = $_POST['age'];
        $vaccine_name = $_POST['vaccine_name'];
        $dose = $_POST['dose'];
        $centre_id = $_POST['centre_id'];

        $mysql = "INSERT INTO `vaccination_status`.`people_vaccinated`(`aadhar_number`, `pname`, `age`, `vaccine_name`, `dose`, `centre_id`) VALUES('$aadhar_number', '$pname', '$age', '$vaccine_name', '$dose', '$centre_id');";

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
        Vaccination Status 
    </title>
    <link rel="stylesheet" href="forms.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id = "header">
        <h3>Welcome to the Vaccination Status Portal</h3>
        <a href="index.php">Vaccinated Person</a>
        <a href="centre.php">New Centre</a>
        <a href="side_effects.php">Side Effects</a>
    </div>
    <div id = "form">
        <?php
            if($insert == true)
                echo "Thanks for submitting the form <br>";
        ?>
        <form action = "index.php" method = "post">
            Aadhar Number: <input id = "aadhar_number" name = "aadhar_number" class = "number" type="text" ><br><br>
            Name of the person: <input  id = "pname" name = "pname" class = "name" type="text" ><br><br>
            Age: <input id = "age" name = "age" class = "number" type="text"><br><br>
            Vaccine: <input id = "vaccine_name" name = "vaccine_name" class = "name" type="text"><br><br>
            Dose: <input id = "dose" name = "dose" class = "number" type="text"><br><br>
            Centre ID: <input id = "centre_id" name = "centre_id" type="text"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
