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
                    <p class="font-weight-bold" style="font-size: 14px; margin-top: 5px;">
                        <?php echo date( "Y-m-d H:i:s" ); ?></p>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex border justify-content-between text-black px-3">
                <div>
                    <p>Coach Id: <span class="fw-bold"><?php echo $row['id']; ?></span></p>
                    <p>Route: <span class="fw-bold"><?php echo $row['route']; ?></span></p>
                    <p>Date: <span class="fw-bold"><?php echo $row['date']; ?></span></p>
                </div>
                <div>
                    <p>Supervisor: <span class="fw-bold">MR. X</span></p>
                    <p>Driver: <span class="fw-bold">Mr. Y</span></p>
                    <p>Reg.No: <span class="fw-bold">NON_AC</span></p>
                </div>
                <div>
                    <p>Coach: <span class="fw-bold"><?php echo $row['coach_no']; ?></span></p>
                    <p>Challan Serial: <span class="fw-bold"><?php echo rand( 1000, 9999 ); ?></span></p>
                    <p>Bus Type: <span class="fw-bold">NON_AC</span></p>
                </div>
            </div>

            <br>
            <table class="table table-striped-columns border text-center">
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
                            echo "<td class='font-weight-normal'>" . $ticketRow['seat'] . "</td>";
                            echo "<td class='font-weight-normal'>" . $ticketRow['ticket_id'] . "</td>";
                            echo "<td class='font-weight-normal'>" . $ticketRow['name'] . "</td>";
                            echo "<td class='font-weight-normal'>" . $ticketRow['mobile'] . "</td>";
                            echo "<td class='font-weight-normal'>" . $ticketRow['gender'] . "</td>";
                            echo "<td class='font-weight-normal'>" . $ticketRow['station'] . "</td>";
                            echo "</tr>";
                        }

                    }
                    ?>
                </tbody>

            </table>


            <br><br><br><br>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Counter Master)</p>
                    </div>
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Guide)</p>
                    </div>
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Checker 1)</p>
                    </div>
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Checker 2)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-danger">
            <div class="d-flex justify-content-between align-items-center text-white px-3">
                <a href="https://friendsit.xyz/" class="font-weight-bold text-white text-decoration-none"
                    target="_blank">
                    www.friendsit.xyz
                </a>
            </div>
        </div>
    </div>


</body>

</html>