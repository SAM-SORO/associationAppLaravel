<?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "association";

// connect to mysql
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

$query = "SELECT * FROM `membres";
$result1 = mysqli_query($connect, $query);

$dataRow = "";

while($row2 = mysqli_fetch_array($result2))
{
    $dataRow = $dataRow."<tr><td>$row2[0]</td><td>$row2[1]</td><td>$row2[2]</td><td>$row2[3]</td><td>$row2[4]</td><td>$row2[5]</td><td>$row2[6]</td></tr>";
}

