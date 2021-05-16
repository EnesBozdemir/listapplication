<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="githublistapplication";

    $conn=new mysqli($servername,$username,$password,$dbname) or die();

    if(isset($_POST["submit"])){
        $task=$_POST["task"];

        $sql="INSERT INTO `tasks` (`task`) VALUES ('$task')";
        $result=$conn->query($sql);
        header('Location:index.php');  
    }

    $sql2="SELECT * FROM `tasks`";
    $tasks=$conn->query($sql2);


    if(isset($_GET["deletebutton"])){
        $id=$_GET["deletebutton"];

        $sql3="DELETE FROM `tasks` WHERE id=$id";
        $deleteresult=$conn->query($sql3);
        header("location:index.php");
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>List Application with PHP and MySQL Database</title>
  </head>
  <body>

    <div class="container" style="text-align:center";>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
            <br><br><br>
            <div class="container">
                <h3>List Application PHP and MySQL database</h3>
                <br>
            </div>
            <form class="row g-3" action="index.php" method="POST">
                <div class="col-auto">
                    <input type="text" name="task" class="form-control" aria-label="default input example">
                </div>
                <div class="col-auto">
                    <button type="submit" name="submit" class="btn btn-primary mb-3">Add Task</button>
                </div>
            </form>
            </div>
            <div class="col-md-3">
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <table>
                        <thead>
                            <th>N</th>
                            <th>Task</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                           $i=1; while($row=mysqli_fetch_array($tasks)){ ?>
 
                            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["task"] ?> </td>
                            <td><a href="index.php?deletebutton=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            
            
        </div>
    </div>
    



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>