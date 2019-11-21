<?php
require "connect.php";

if (isset($_POST['titolo']) && isset($_POST['contenuto']) && isset($_POST['date']) ) {
    $con = mysqli_connect ('127.0.0.1','root','');
    mysqli_select_db($con, 'todo');

    $titolo = $_POST['titolo'];
    $contenuto = $_POST['contenuto'];
    $date = $_POST['date'];
    $sql = "insert into todo (titolo,contenuto,date) values ('$titolo','$contenuto', '$date')";
    mysqli_query($con,$sql);
    header("refresh:0; url=todo.php");
}

if(isset($_GET['del_task'])) {
    $con = mysqli_connect ('127.0.0.1','root','');
    mysqli_select_db($con, 'todo');

    $id = $_GET['del_task'];
    $sql = "update todo set stato='1' where id=$id";
    mysqli_query($con,$sql);
    header("refresh:0; url=todo.php");
}

if(isset($_GET['cancella'])) {
    $con = mysqli_connect ('127.0.0.1','root','');
    mysqli_select_db($con, 'todo');

    $id = $_GET['cancella'];
    $sql = "delete from todo where id=$id";
    mysqli_query($con,$sql);
    header("refresh:0; url=todo.php");
}
