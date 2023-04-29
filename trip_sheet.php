<?php
// Establish a database connection
require_once 'inc/conn.php';

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    if (isset( $_GET['id'] ) && !empty( $_GET['id'] )) {
        $coach_id = mysqli_real_escape_string( $con, $_GET['id'] );


        // query the database for the selected row
        $query = "SELECT * FROM trip_status WHERE id = '$coach_id'";
        $result = mysqli_query( $con, $query );

        if ($result && mysqli_num_rows( $result ) > 0) {
            $row = mysqli_fetch_assoc( $result );
            // display ticket details
        }
        else {
            // handle error when ticket not found
        }
    }
    else {
        // handle error when id is not provided in URL
    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Trip Sheet</title>
</head>

<body>

    <div class="container">
        <div class="bg-danger" style="width: 100%;">
            <div class="d-flex justify-content-between text-white px-3 py-2">
                <p class="font-weight-bold" style="font-size: 20px;">Friends Travels Ltd</p>
                <p class="font-weight-bold" style="font-size: 20px;"></p>
                <div>
                    <p class="font-weight-bold" style="font-size: 14px;">printed by: Titumir (Hemayetpur)</p>
                    <p class="font-weight-bold" style="font-size: 14px; margin-top: 5px;">29-Apr-2023 06:00:00 PM</p>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between text-black px-3">
                <div>
                    <p>Coach Id: <span class="fw-bold"><?php echo $row['id']; ?></span></p>
                    <p>Route: <span class="fw-bold"><?php echo $row['route']; ?></span></p>
                    <p>Date: <span class="fw-bold"><?php echo $row['date']; ?></span></p>
                </div>
                <div>
                    <p>Coach: <span class="fw-bold"><?php echo $row['coach_no']; ?></span></p>
                    <p>Challan Serial: <span class="fw-bold"><?php echo rand( 1000, 9999 ); ?></span></p>
                    <p>Bus Type: <span class="fw-bold">NON_AC</span></p>
                </div>
            </div>
            <div class="border p-3">
                <div class="row">
                    <div class="col-4 border-end">
                        <p class="text-muted mb-1">Supervisor:</p>
                        <p class="mb-0"><strong>MR. X</strong></p>
                        <p class="text-muted mb-1">Mobile:</p>
                        <p class="mb-0"><strong>01xxxxxxxxxx</strong></p>
                    </div>
                    <div class="col-4 border-end">
                        <p class="text-muted mb-1">Driver:</p>
                        <p class="mb-0"><strong>Mr. Y</strong></p>
                        <p class="text-muted mb-1">Mobile:</p>
                        <p class="mb-0"><strong>017yyyyyyyy</strong></p>
                    </div>
                    <div class="col-4">
                        <p class="text-muted mb-1">Reg.No:</p>
                        <p class="mb-0"><strong><?php echo $row['coach_no']; ?></strong></p>
                    </div>
                </div>
            </div>

            <br>
            <table class="table border text-center">
                <thead>
                    <tr>
                        <th scope="col">Seat</th>
                        <th scope="col">PNR</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Station</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Get the coach status for the given ID
                    $coachStatusQuery = "SELECT * FROM trip_status WHERE id = ? AND (A1 = 1 OR A2 = 1 OR A3 = 1 OR A4 = 1)";
                    $coachStatusStmt = $con->prepare( $coachStatusQuery );
                    $coachStatusStmt->bind_param( "i", $coach_id );
                    $coachStatusStmt->execute();
                    $coachStatusResult = $coachStatusStmt->get_result();

                    // Loop through each row and get the column names where the value is 1
                    $columns = [];
                    while ($row = $coachStatusResult->fetch_assoc()) {
                        foreach ($row as $columnName => $columnValue) {
                            if ($columnValue == 1) {
                                array_push( $columns, $columnName );
                            }
                        }
                    }

                    // Loop through each column and get the ticket information for the given seat
                    foreach ($columns as $column) {
                        $ticketQuery = "SELECT ticket_id, name, mobile, gender, station, seat FROM sell_ticket_history WHERE coach_id = ? AND seat = ?";
                        $ticketStmt = $con->prepare( $ticketQuery );
                        $ticketStmt->bind_param( "is", $coach_id, $column );
                        $ticketStmt->execute();
                        $ticketResult = $ticketStmt->get_result();

                        // Loop through each row and echo the ticket information
                        while ($ticketRow = $ticketResult->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='col'>" . $ticketRow['seat'] . "</th>";
                            echo "<th scope='col'>" . $ticketRow['ticket_id'] . "</th>";
                            echo "<th scope='col'>" . $ticketRow['name'] . "</th>";
                            echo "<th scope='col'>" . $ticketRow['mobile'] . "</th>";
                            echo "<th scope='col'>" . $ticketRow['gender'] . "</th>";
                            echo "<th scope='col'>" . $ticketRow['station'] . "</th>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>












            </table>










            <br><br>
            <br><br>
            <br><br>
            <hr>


            <table width="100%" cellspacing="0" cellpadding="0" data-v-357c67d1=""
                style="border-collapse: collapse; margin-top: 10px;">

                <tr>
                    <div class="row border">
                        <div class="col-md-2 text-center border-right">Seat</div>
                        <div class="col-md-2 text-center border-right">PNR</div>
                        <div class="col-md-2 text-center border-right">Name</div>
                        <div class="col-md-2 text-center border-right">Mobile</div>
                        <div class="col-md-2 text-center border-right">Gender</div>
                        <div class="col-md-2 text-center border-right">Dropping</div>
                    </div>
                </tr>

                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        C1</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Jamuna Line (Rainkhola)</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                    </td>
                    <td colspan="1" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0T7ZHIREPRXDS</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        <table width="100%" data-v-357c67d1="">
                            <tr data-v-357c67d1="">
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">
                                </td>
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">M
                                </td>
                                <td data-v-357c67d1="" style="width: 33%;"></td>
                            </tr>
                        </table>
                    </td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        RAINKHOLA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        MATHBARIA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        C2</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Jamuna Line (Rainkhola)</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                    </td>
                    <td colspan="1" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0T7ZHIREPRXDS</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        <table width="100%" data-v-357c67d1="">
                            <tr data-v-357c67d1="">
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">
                                </td>
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">M
                                </td>
                                <td data-v-357c67d1="" style="width: 33%;"></td>
                            </tr>
                        </table>
                    </td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        RAINKHOLA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        MATHBARIA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        C3</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Jamuna Line (Rainkhola)</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                    </td>
                    <td colspan="1" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0T7ZHIREPRXDS</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        <table width="100%" data-v-357c67d1="">
                            <tr data-v-357c67d1="">
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">
                                </td>
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">M
                                </td>
                                <td data-v-357c67d1="" style="width: 33%;"></td>
                            </tr>
                        </table>
                    </td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        RAINKHOLA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        MATHBARIA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        C4</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Jamuna Line (Rainkhola)</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                    </td>
                    <td colspan="1" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0T7ZHIREPRXDS</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        <table width="100%" data-v-357c67d1="">
                            <tr data-v-357c67d1="">
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">
                                </td>
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">M
                                </td>
                                <td data-v-357c67d1="" style="width: 33%;"></td>
                            </tr>
                        </table>
                    </td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        RAINKHOLA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        MATHBARIA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        D1</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Jamuna Line (Rainkhola)</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                    </td>
                    <td colspan="1" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0T7ZHIREPRXDS</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        <table width="100%" data-v-357c67d1="">
                            <tr data-v-357c67d1="">
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">
                                </td>
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">M
                                </td>
                                <td data-v-357c67d1="" style="width: 33%;"></td>
                            </tr>
                        </table>
                    </td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        RAINKHOLA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        MATHBARIA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        D2</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Jamuna Line (Rainkhola)</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                    </td>
                    <td colspan="1" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0T7ZHIREPRXDS</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        <table width="100%" data-v-357c67d1="">
                            <tr data-v-357c67d1="">
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">
                                </td>
                                <td data-v-357c67d1="" style="border-right: 2px solid rgb(196, 196, 196); width: 33%;">M
                                </td>
                                <td data-v-357c67d1="" style="width: 33%;"></td>
                            </tr>
                        </table>
                    </td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        RAINKHOLA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        MATHBARIA</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        750</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td colspan="12" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: left; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; font-weight: 600; font-size: 20px;">
                        Sub Total</td>
                    <td colspan="1" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; font-weight: 600; font-size: 20px;">
                        5250</td>
                </tr>
            </table>
            <table width="100%" cellspacing="0" cellpadding="0" data-v-357c67d1=""
                style="border-collapse: collapse; margin-top: 10px;">
                <tr data-v-357c67d1=""
                    style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500; background-color: rgb(219, 219, 219); margin-top: 20px; padding: 0px 0px 10px 10px; text-align: center;">
                    <td colspan="100" data-v-357c67d1=""
                        style="border: 1px solid transparent; text-align: center; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; font-weight: 600; font-size: 20px;">
                        Free Seats</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        A1</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        A2</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        A3</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        A4</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        B1</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        B3</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        B4</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        D3</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        D4</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        E1</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        E2</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        E3</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        E4</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        F1</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        F2</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        F3</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        F4</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        G1</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        G2</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        G3</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        G4</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        H1</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        H2</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        H3</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        H4</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        I1</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        I2</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        I3</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        I4</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        J1</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        J2</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        J3</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        J4</td>
                </tr>
            </table>
            <table width="100%" cellspacing="0" cellpadding="0" data-v-357c67d1=""
                style="border-collapse: collapse; margin-top: 10px;">
                <tr data-v-357c67d1=""
                    style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500; background-color: rgb(219, 219, 219); margin-top: 20px; padding: 0px 0px 10px 10px; text-align: center;">
                    <td colspan="10" data-v-357c67d1=""
                        style="border: 1px solid transparent; text-align: center; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; font-weight: 600; font-size: 20px;">
                        Counter Wise Seat Report</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 600;">
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Counter</td>
                    <td colspan="1" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        User Name</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Sold Seats</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Fare (F) </td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Discount (D) </td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Receive Amount (R) <br data-v-357c67d1=""></td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Commission (C) </td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Final Amount <br data-v-357c67d1=""> (R-C) </td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        RAINKHOLA</td>
                    <td colspan="1" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Jamuna Line (Rainkhola)</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        7</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        5250</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        5250</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        5250</td>
                </tr>
                <tr data-v-357c67d1="" style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500;">
                    <td colspan="3" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        Total</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        7</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        5250</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        5250</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        0</td>
                    <td colspan="2" data-v-357c67d1=""
                        style="border-right: 2px solid rgb(196, 196, 196); text-align: center; padding-top: 10px; padding-bottom: 10px;">
                        5250</td>
                </tr>
            </table>
            <table width="100%" cellspacing="0" cellpadding="0" data-v-357c67d1=""
                style="border-collapse: collapse; margin-top: 10px;"><!----><!----><!----><!----></table><!---->
            <table width="100%" cellspacing="0" cellpadding="0" data-v-357c67d1=""
                style="border-collapse: collapse; margin-top: 10px;">
                <tr data-v-357c67d1=""
                    style="border: 2px solid rgb(196, 196, 196); font-size: 12px; font-weight: 500; background-color: rgb(219, 219, 219); margin-top: 20px; padding: 0px 0px 10px 10px; text-align: center;">
                    <td colspan="10" data-v-357c67d1=""
                        style="border: 1px solid transparent; text-align: center; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; font-weight: 600; font-size: 20px;">
                        <div class="p-3" data-v-357c67d1="" style="text-align: center;">
                            <h5 data-v-357c67d1="" style="padding: 5px;">Balance</h5>
                            <h6 data-v-357c67d1="" style="font-weight: bold; color: green;">Receive Amount Total: 5250
                                Taka
                            </h6>
                        </div>
                    </td>
                </tr>
            </table>
            <div style="margin-top:10px;border:2px solid #C4C4C4;width:100%;" data-v-357c67d1="">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-top:100px;padding-left:10px;padding-right:10px;"
                    data-v-357c67d1="">
                    <div style="width:25%;" data-v-357c67d1="">
                        <div style="border-top:2px solid black;width:50%;" data-v-357c67d1=""></div>
                        <p style="margin-top:5px;color:black;" data-v-357c67d1="">Signature</p>
                        <p style="margin-top:5px;color:black;" data-v-357c67d1="">(Counter Master)</p>
                    </div>
                    <div style="width:25%;" data-v-357c67d1="">
                        <div style="border-top:2px solid black;width:50%;" data-v-357c67d1=""></div>
                        <p style="margin-top:5px;color:black;" data-v-357c67d1="">Signature</p>
                        <p style="margin-top:5px;color:black;" data-v-357c67d1="">(Guide)</p>
                    </div>
                    <div style="width:25%;" data-v-357c67d1="">
                        <div style="border-top:2px solid black;width:50%;" data-v-357c67d1=""></div>
                        <p style="margin-top:5px;color:black;" data-v-357c67d1="">Signature</p>
                        <p style="margin-top:5px;color:black;" data-v-357c67d1="">(Checker 1)</p>
                    </div>
                    <div style="width:25%;" data-v-357c67d1="">
                        <div style="border-top:2px solid black;width:50%;" data-v-357c67d1=""></div>
                        <p style="margin-top:5px;color:black;" data-v-357c67d1="">Signature</p>
                        <p style="margin-top:5px;color:black;" data-v-357c67d1="">(Checker 2)</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="width:100%;background-color:#f04935;" data-v-357c67d1="">
            <div style="display:flex;justify-content:space-between;align-items:center;color:white;padding-left:10px;padding-right:10px;"
                data-v-357c67d1="">
                <p style="font-size:14px;font-weight:400;display:flex;column-gap:10px;justify-content:center;align-items:center;"
                    data-v-357c67d1="">Powered by: <span data-v-357c67d1=""><img src="/img/logo-white.f4809256.png"
                            style="width:40px;height:20px;" alt="" data-v-357c67d1=""></span></p>
                <div data-v-357c67d1=""><a href="https://jatri.co/"
                        style="font-size:14px;font-weight:600;color:white;text-decoration:none;"
                        data-v-357c67d1="">www.Jatri.co</a></div>
            </div>
        </div>
    </div>


</body>

</html>