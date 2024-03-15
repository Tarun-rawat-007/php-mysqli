<?php
$insert = false;

if(isset($_POST['name'])){
// set connection varibles
    $_SERVER="localhost";
    $username="root";
    $password="";

    // craete a database connection
    $con=mysqli_connect($_SERVER,$username,$password,);

    // check for connection success
    if(!$con){
        die("connection to the data base failed due to ".mysqli_connect_error());
    }
    // echo "success connecting to db";

    // collect post varibles
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    

    $sql= "    INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());  ";

    // echo $sql;
    // excute query
    if($con->query($sql)== true){
        // echo "successfully inserted";
        // flag for successfull insertion
        $insert =true;

    }
    else{
        echo "Error: $sql <br> $con->error";
       

    }
    // close db connection
    $con->close();
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>welcome to dit university form</h3>
        <p>login for registration</p>

        <?php
        if($insert ==true){
            
            echo "<br><p class='submitmsg'>Successfully inserted  login details Entry !</p>
            ";
        }
        ?>
       
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name:">
            <input type="text" name="age" id="age" placeholder="Enter your age:">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender:">
            <input type="email" name="email" id="email" placeholder="Enter your email:">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone:">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other information here:"></textarea>
    
            <button class="btn">Submit</button>
    
        </form>
        
    
    
    </div>


</body>
</html>