<?php
$insert = false;
    if(isset($_POST['name'])){
        $server = "localhost";
        $username = "root";
        $password = "";
        $con = mysqli_connect($server , $username ,$password);

        if(!$con){
            die("connection failed to database due to" . mysqli_connect_error());
        }
        //echo "success connection to db";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $issue = $_POST['issue'];
        $issue_desc = $_POST['issue_desc'];
        $phone = $_POST['phone'];
      
        $sql = "INSERT INTO `issue`.`issue` (`name`, `email`, `issue`, `issue_desc`, `phone`) VALUES ('$name', '$email', '$issue', '$issue_desc', '$phone')";

        // echo $sql;

        if($con->query($sql) == true){              // error was query($sql == true)
            // echo "successfully inserted ";
            $insert = true;
        }
        else{
            echo " error:$sql <br> $con->error";
        }

        $con->close();

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class="container"> 
    <h3> welcome to iit mandi</h3>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
         Quis cum porro ipsum omnis accusamus minima maxime corrupti
          ipsam quam eligendi doloribus officiis explicabo optio, soluta 
          reiciendis cumque veritatis laudantium, necessitatibus dolorem!
           Quas tenetur maxime, recusandae facilis deserunt aut provident
         Debitis architecto aliquid nobis, id possimus excepturi beatae quod?</p>
         
         

         <?php 
            if($insert == true){
            echo "<h6><p class='subMsg' style='color: green;'> thanks for the feedback we will take a look to it soon </p></h6>";
            }
         ?>
        <form class="form-group" action="index.php" method="POST">
            
            <input type="text" class="form-control" name="name" id="name" placeholder="name">
            <input type="text" class="form-control" name="email" id="email" placeholder="email">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="phone">

            <input type="text" class="form-control" name="issue" id="issue" placeholder="issue">
            <textarea name="issue_desc" class="form-control" id="issue_desc" cols="30" rows="10" placeholder="enter issue detail"></textarea>
            <button type="submit" class="btn btn-success">Submit</button>
       </form>

    </div>
    <script src="index.js"></script>
</body>
</html>