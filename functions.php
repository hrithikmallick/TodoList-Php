<?php


function dbconnect()
{
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "todolist";
    $conn = mysqli_connect($servername, $username, $pass, $dbname);
    return $conn;
}
function addlist($listitem)
{

    $conn = dbconnect();
    $response = 0;
    if ($conn) {
        //echo "Connection Successfully";
        $sql = "insert into list (listques) values('$listitem')";

        if (mysqli_query($conn, $sql)) {
            $response = 1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $response = 0;
        }
    } else {
        //echo "Connection Failed";
        $response = 0;
    }
    return $response;
}
function fetchlist()
{
    $conn = dbconnect();
    if ($conn) {
        $sql = "select *from list";
        $result = mysqli_query($conn, $sql);

        return $result;
    } else {
        echo "Error: <br>" . mysqli_error($conn);
    }
}
function deletelist($listid)
{
    $conn = dbconnect();
    if ($conn) {
        $sql = "DELETE FROM `list` WHERE `list`.`listid` = $listid";

        if (mysqli_query($conn, $sql)) {
            header("location: list.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
}
