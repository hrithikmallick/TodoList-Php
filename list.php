<?php
include("functions.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Your TodoList</title>
</head>

<body>

    <div class="container">
        <h1>TodoList</h1>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Email your task</label>
                <input type="name" class="form-control" name="ques" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the task that you want to do">
                <small id="emailHelp" class="form-text text-muted">its's a small list for your work</small>
                <button type="submit" name="add" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <?php
        if (isset($_POST['add'])) {
            $ques = $_POST['ques'];
            addlist($ques);
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Succesfully added</strong> Your task is added with your Todolist. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }

        ?>
        <?php
        $result = fetchlist();
        while ($row = mysqli_fetch_assoc($result)) {

            $task = $row["listques"];
            $taskid = $row["listid"];
            echo '<div class="row ml-5">
            <div class="col">Task name:- </div>
            <div class="col">' . $task . '</div>
            <div class="col">            <a class="btn btn-primary" href="deletetask.php?deleteid=' . $taskid . '">task done</a></div>
            </div><br>';
        }

        ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>