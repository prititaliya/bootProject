<?php
if( session_status() == 1 )
   session_start();
$session    = session_id();
$time       = time();
$time_check = $time-300;     //We Have Set Time 5 Minutes
$tbl_name   = "online_users";

include '_db_connect.php';
// Check connection
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$sql    = "SELECT * FROM $tbl_name WHERE session='$session'";
$result = mysqli_query($conn, $sql);
$count  = mysqli_num_rows($result);

//If count is 0 , then enter the values
if ($count == "0") {
    $sql1    = "INSERT INTO $tbl_name(session, time)VALUES('$session', '$time')";
    $result1 = mysqli_query($conn, $sql1);
} else {
    $sql2    = "UPDATE $tbl_name SET time='$time' WHERE session = '$session'";
    $result2 = mysqli_query($conn, $sql2);
}

$sql3              = "SELECT * FROM $tbl_name";
$result3           = mysqli_query($conn, $sql3);
$count_user_online = mysqli_num_rows($result3);


// after 5 minutes, session will be deleted
$sql4    = "DELETE FROM $tbl_name WHERE time<$time_check";
$result4 = mysqli_query($conn, $sql4);

//To see the result run this script in multiple browser.
mysqli_close($conn);
