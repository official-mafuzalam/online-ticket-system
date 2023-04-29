<?php

require_once 'inc/conn.php';


$coach_no = $_POST['coach_no'];
$s_no = $_POST['s_no'];
$coach_id = $_POST['id'];
$route = $_POST['route'];
$date = $_POST['date'];
$time = $_POST['time'];

$seat = $_POST['seat_no'];
$station = $_POST['station'];
$mobile = $_POST['mobile'];
$name = $_POST['name'];
$gender = $_POST['gender'];

$sql = "UPDATE trip_status SET $seat = 1 WHERE id = $coach_id";

$result = mysqli_query( $con, $sql );


$ticket_id = uniqid();

$sql_sell_ticket = "INSERT INTO sell_ticket_history (`ticket_id`, `coach_no`, `coach_id`, `route`, `date`, `time`, `seat`, `station`, `mobile`, `name`, `gender`) 
                    VALUES ('$ticket_id','$coach_no','$coach_id','$route','$date','$time','$seat','$station','$mobile','$name','$gender')";

$result_sell_ticket = mysqli_query( $con, $sql_sell_ticket );


if ($result_sell_ticket) {
    echo '<script>
        window.open("ticket_print.php?id=' . $ticket_id . '", "_blank");
        window.location.href = "index.php";
    </script>';


}




?>