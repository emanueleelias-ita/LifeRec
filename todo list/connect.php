<?php

$conn = mysqli_connect("localhost", "root", "", "todo");
if ($conn -> connect_error) {
  die("connection failed: ". $conn -> connect_error);
}
$sql = "SELECT id, titolo, contenuto, date, stato FROM todo order by date asc";
$result = $conn -> query($sql);
$count = mysqli_num_rows($result);
