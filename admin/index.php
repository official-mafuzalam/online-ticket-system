<?php

// Set the timezone to Bangladesh
date_default_timezone_set( "Asia/Dhaka" );

require_once '../inc/conn.php';


if (isset( $_POST['submit_trip'] )) {

    $coach_no = $_POST['coach_no'];
    $route = $_POST['route'];
    $time = $_POST['time'];
    $station = $_POST['station'];
    $date = $_POST['date'];

    // Generate a random number
    do {
        $random_num = rand( 1000, 99999 );
        $query = "SELECT id FROM trip_status WHERE id = '$random_num'";
        $result = mysqli_query( $con, $query );
    } while (mysqli_num_rows( $result ) > 0);

    // Insert data into the database
    $sql = "INSERT INTO trip_status (id, coach_no, date, time, route, station) VALUES ('$random_num', '$coach_no', '$date', '$time', '$route', '$station')";
    $result = mysqli_query( $con, $sql );

    if ($result) {
        echo "<script>alert('Added a New Trip Successfully');
        window.location.href = 'index.php';
        </script>";
    }
    else {
        echo "Query error!";
    }


}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Friends Travels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <!-- <a class="navbar-brand p-1" href="#">Friends Travels</a> -->
            <p class="navbar-brand p-1">Friends Travels</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container overflow-hidden text-center">
                    <form class="row gx-2" action="" method="post">
                        <div class="col">
                            <div class="p-1">
                                <select class="form-select mr-4" disabled aria-label="Default select example">
                                    <option selected>Station From</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Gopalganj">Gopalganj</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Narail">Narail</option>
                                    <option value="Pirojpur">Pirojpur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <select class="form-select mr-4" disabled aria-label="Default select example">
                                    <option selected>Station To</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Gopalganj">Gopalganj</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Narail">Narail</option>
                                    <option value="Pirojpur">Pirojpur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <input class="form-control" name="date" type="date" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <button type="submit" class="btn btn-outline-success">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex">
                    <a href="../agents/">Agent</a>
                </div>
            </div>

        </div>
    </nav>

    <!-- Trip Action Section -->
    <div class="">
        <div class="row">
            <div class="col">
                <a href="search_tickets.php" class="btn btn-success">Search Ticket</a>
            </div>
            <div class="col">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tripAddModal">
                    New Trip Add
                </button>
            </div>
        </div>
    </div>
    <hr>

    <!-- All Trip Section -->
    <div class="">
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date = $_POST['date'];
        }
        else {
            // Set the $date variable to the current date
            $date = date( 'Y-m-d' );
        }

        $sql = "SELECT * FROM `trip_status` WHERE date = '$date' ORDER BY STR_TO_DATE(time, '%h:%i %p')";
        $result = mysqli_query( $con, $sql );

        if (mysqli_num_rows( $result ) > 0) {

            echo '
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Coach</th>
                            <th scope="col">Time</th>
                            <th scope="col">Route</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                <tbody>';
            while ($row = mysqli_fetch_assoc( $result )) {
                echo '
                    <tr>
                        <td class="text-success fw-bold">' . $row['coach_no'] . '</td>
                        <td class="text-success fw-bold">' . $row['time'] . '</td>
                        <td class="text-success fw-bold">' . $row['route'] . '</td>
                        <td>';

                if ($row['status'] == 1) {
                    echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' . $row['id'] . '">
                            Book
                        </button>';
                }
                else {
                    echo '<button type="button" class="btn btn-danger" disabled>
                            Book
                        </button>';
                }

                echo '</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tripOmit" data-id="' . $row['id'] . '">
                                Omit
                            </button>
                        </td>';
                echo '<td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tripActive" data-id="' . $row['id'] . '">
                            Active
                        </button>
                    </td>
                </tr>';
            }

            echo '</tbody></table>';

        }
        else {
            echo '<p class="text-center fs-3">No Trip Found</p>';
        }

        ?>
    </div>


    <!-- Modal For Seat Plane -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" id="modal-content">



            </div>
        </div>
    </div>

    <!-- Modal For Trip Omit -->
    <div class="modal fade" id="tripOmit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="trip-omit">




            </div>
        </div>
    </div>

    <!-- Modal For Trip Active -->
    <div class="modal fade" id="tripActive" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="trip-active">




            </div>
        </div>
    </div>

    <!-- Modal For Add New Trip -->

    <div class="modal fade" id="tripAddModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Trip Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <select class="form-select mr-4" name="coach_no"
                                onchange="changeValue(), changeTime(), changeStation()">
                                <option selected>Coach No</option>
                                <!-- Khulna -->
                                <option value="101" data-value="Dhaka - Gopalganj - Khulna" data-time="06:30 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">101
                                </option>
                                <option value="105" data-value="Dhaka - Gopalganj - Khulna" data-time="07:30 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">105
                                </option>
                                <option value="110" data-value="Dhaka - Gopalganj - Khulna" data-time="08:30 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">110
                                </option>
                                <option value="115" data-value="Dhaka - Gopalganj - Khulna" data-time="09:30 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">115
                                </option>
                                <option value="120" data-value="Dhaka - Gopalganj - Khulna" data-time="10:30 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">120
                                </option>
                                <option value="125" data-value="Dhaka - Gopalganj - Khulna" data-time="11:30 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">125
                                </option>
                                <option value="130" data-value="Dhaka - Gopalganj - Khulna" data-time="12:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">130
                                </option>
                                <option value="135" data-value="Dhaka - Gopalganj - Khulna" data-time="01:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">135
                                </option>
                                <option value="140" data-value="Dhaka - Gopalganj - Khulna" data-time="02:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">140
                                </option>
                                <option value="145" data-value="Dhaka - Gopalganj - Khulna" data-time="03:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">145
                                </option>
                                <option value="150" data-value="Dhaka - Gopalganj - Khulna" data-time="04:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">150
                                </option>
                                <option value="155" data-value="Dhaka - Gopalganj - Khulna" data-time="05:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">155
                                </option>
                                <option value="160" data-value="Dhaka - Gopalganj - Khulna" data-time="06:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">160
                                </option>
                                <option value="165" data-value="Dhaka - Gopalganj - Khulna" data-time="07:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">165
                                </option>
                                <option value="170" data-value="Dhaka - Gopalganj - Khulna" data-time="08:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">170
                                </option>
                                <option value="175" data-value="Dhaka - Gopalganj - Khulna" data-time="09:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">175
                                </option>
                                <option value="180" data-value="Dhaka - Gopalganj - Khulna" data-time="10:30 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700">180
                                </option>
                                <!-- Pirojpur -->
                                <option value="210" data-value="Dhaka - Gopalganj - Pirojpur" data-time="06:00 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    210
                                </option>
                                <option value="215" data-value="Dhaka - Gopalganj - Pirojpur" data-time="07:00 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    215
                                </option>
                                <option value="220" data-value="Dhaka - Gopalganj - Pirojpur" data-time="08:00 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    220
                                </option>
                                <option value="225" data-value="Dhaka - Gopalganj - Pirojpur" data-time="09:00 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    225
                                </option>
                                <option value="230" data-value="Dhaka - Gopalganj - Pirojpur" data-time="10:00 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    230
                                </option>
                                <option value="235" data-value="Dhaka - Gopalganj - Pirojpur" data-time="11:00 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    235
                                </option>
                                <option value="240" data-value="Dhaka - Gopalganj - Pirojpur" data-time="12:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    240
                                </option>
                                <option value="245" data-value="Dhaka - Gopalganj - Pirojpur" data-time="01:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    245
                                </option>
                                <option value="250" data-value="Dhaka - Gopalganj - Pirojpur" data-time="02:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    250
                                </option>
                                <option value="255" data-value="Dhaka - Gopalganj - Pirojpur" data-time="03:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    255
                                </option>
                                <option value="260" data-value="Dhaka - Gopalganj - Pirojpur" data-time="04:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    260
                                </option>
                                <option value="265" data-value="Dhaka - Gopalganj - Pirojpur" data-time="05:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    265
                                </option>
                                <option value="270" data-value="Dhaka - Gopalganj - Pirojpur" data-time="06:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    270
                                </option>
                                <option value="275" data-value="Dhaka - Gopalganj - Pirojpur" data-time="07:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    275
                                </option>
                                <option value="280" data-value="Dhaka - Gopalganj - Pirojpur" data-time="08:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    280
                                </option>
                                <option value="285" data-value="Dhaka - Gopalganj - Pirojpur" data-time="09:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    285
                                </option>
                                <option value="290" data-value="Dhaka - Gopalganj - Pirojpur" data-time="10:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    290
                                </option>
                                <option value="295" data-value="Dhaka - Gopalganj - Pirojpur" data-time="11:00 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700">
                                    295
                                </option>
                                <!-- Kotalipara -->
                                <option value="310" data-value="Dhaka - Gopalganj - Kotalipara" data-time="06:15 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">310
                                </option>
                                <option value="315" data-value="Dhaka - Gopalganj - Kotalipara" data-time="07:15 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">315
                                </option>
                                <option value="320" data-value="Dhaka - Gopalganj - Kotalipara" data-time="08:15 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">320
                                </option>
                                <option value="325" data-value="Dhaka - Gopalganj - Kotalipara" data-time="09:15 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">325
                                </option>
                                <option value="330" data-value="Dhaka - Gopalganj - Kotalipara" data-time="10:15 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">330
                                </option>
                                <option value="335" data-value="Dhaka - Gopalganj - Kotalipara" data-time="11:15 AM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">335
                                </option>
                                <option value="340" data-value="Dhaka - Gopalganj - Kotalipara" data-time="12:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">340
                                </option>
                                <option value="345" data-value="Dhaka - Gopalganj - Kotalipara" data-time="01:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">345
                                </option>
                                <option value="350" data-value="Dhaka - Gopalganj - Kotalipara" data-time="02:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">350
                                </option>
                                <option value="355" data-value="Dhaka - Gopalganj - Kotalipara" data-time="03:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">355
                                </option>
                                <option value="360" data-value="Dhaka - Gopalganj - Kotalipara" data-time="04:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">360
                                </option>
                                <option value="365" data-value="Dhaka - Gopalganj - Kotalipara" data-time="05:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">365
                                </option>
                                <option value="370" data-value="Dhaka - Gopalganj - Kotalipara" data-time="06:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">370
                                </option>
                                <option value="375" data-value="Dhaka - Gopalganj - Kotalipara" data-time="07:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">375
                                </option>
                                <option value="380" data-value="Dhaka - Gopalganj - Kotalipara" data-time="08:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">380
                                </option>
                                <option value="385" data-value="Dhaka - Gopalganj - Kotalipara" data-time="09:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">385
                                </option>
                                <option value="390" data-value="Dhaka - Gopalganj - Kotalipara" data-time="10:15 PM"
                                    data-station="Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550">390
                                </option>
                                <!-- Narail -->
                                <option value="410" data-value="Dhaka - Vatiyapara - Narail" data-time="06:45 AM"
                                    data-station="Vatiyapara - 450, Narail - 550">410
                                </option>
                                <option value="415" data-value="Dhaka - Vatiyapara - Narail" data-time="07:45 AM"
                                    data-station="Vatiyapara - 450, Narail - 550">415
                                </option>
                                <option value="420" data-value="Dhaka - Vatiyapara - Narail" data-time="08:45 AM"
                                    data-station="Vatiyapara - 450, Narail - 550">420
                                </option>
                                <option value="425" data-value="Dhaka - Vatiyapara - Narail" data-time="09:45 AM"
                                    data-station="Vatiyapara - 450, Narail - 550">425
                                </option>
                                <option value="430" data-value="Dhaka - Vatiyapara - Narail" data-time="10:45 AM"
                                    data-station="Vatiyapara - 450, Narail - 550">430
                                </option>
                                <option value="435" data-value="Dhaka - Vatiyapara - Narail" data-time="11:45 AM"
                                    data-station="Vatiyapara - 450, Narail - 550">435
                                </option>
                                <option value="440" data-value="Dhaka - Vatiyapara - Narail" data-time="12:45 PM"
                                    data-station="Vatiyapara - 450, Narail - 550">440
                                </option>
                                <option value="445" data-value="Dhaka - Vatiyapara - Narail" data-time="01:45 PM"
                                    data-station="Vatiyapara - 450, Narail - 550">445
                                </option>
                                <option value="450" data-value="Dhaka - Vatiyapara - Narail" data-time="02:45 PM"
                                    data-station="Vatiyapara - 450, Narail - 550">450
                                </option>
                                <option value="455" data-value="Dhaka - Vatiyapara - Narail" data-time="03:45 PM"
                                    data-station="Vatiyapara - 450, Narail - 550">455
                                </option>
                                <option value="460" data-value="Dhaka - Vatiyapara - Narail" data-time="04:45 PM"
                                    data-station="Vatiyapara - 450, Narail - 550">460
                                </option>
                                <option value="465" data-value="Dhaka - Vatiyapara - Narail" data-time="05:45 PM"
                                    data-station="Vatiyapara - 450, Narail - 550">465
                                </option>
                                <option value="470" data-value="Dhaka - Vatiyapara - Narail" data-time="09:45 PM"
                                    data-station="Vatiyapara - 450, Narail - 550">470
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="text" name="route" id="route" value="" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="time" id="time" value="" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="station" id="station" value="" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input name="date" type="date" class="form-control" value="<?php echo date( 'Y-m-d' ); ?>"
                                required />
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="submit_trip" class="btn btn-primary" value="SAVE">
                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>















    <!-- Script -->


    <script>

        // Seat Plan Modal
        $(document).ready(function () {
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                $.ajax({
                    type: "GET",
                    url: "fetch-data.php",
                    data: { id: id },
                    success: function (response) {
                        // Display the fetched data in the modal
                        modal.find('#modal-content').html(response);
                    }
                });
            });
        });

        // Trip Omit Modal
        $(document).ready(function () {
            $('#tripOmit').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                $.ajax({
                    type: "GET",
                    url: "trip_omit.php",
                    data: { id: id },
                    success: function (response) {
                        // Display the fetched data in the modal
                        modal.find('#trip-omit').html(response);
                    }
                });
            });
        });

        // Trip Active Modal
        $(document).ready(function () {
            $('#tripActive').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                $.ajax({
                    type: "GET",
                    url: "trip_active.php",
                    data: { id: id },
                    success: function (response) {
                        // Display the fetched data in the modal
                        modal.find('#trip-active').html(response);
                    }
                });
            });
        });




        // Auto Change Route by Coach No
        function changeValue() {
            var dropdown = document.getElementsByName("coach_no")[0];
            var inputBox = document.getElementById("route");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-value");
        }

        // Auto Change Time by Coach No
        function changeTime() {
            var dropdown = document.getElementsByName("coach_no")[0];
            var inputBox = document.getElementById("time");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-time");
        }
        // Auto Change Station by Coach No
        function changeStation() {
            var dropdown = document.getElementsByName("coach_no")[0];
            var inputBox = document.getElementById("station");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-station");
        }

    </script>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>