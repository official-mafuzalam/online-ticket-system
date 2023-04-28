<?php

// Set the timezone to Bangladesh
date_default_timezone_set("Asia/Dhaka");

require_once 'inc/conn.php';


if (isset($_POST['submit_trip'])) {

    $coach_no = $_POST['coach_no'];
    $route = $_POST['route'];
    $time = $_POST['time'];
    $station = $_POST['station'];
    $date = $_POST['date'];

    // Generate a random number
    do {
        $random_num = rand(1000, 99999);
        $query = "SELECT id FROM trip_status WHERE id = '$random_num'";
        $result = mysqli_query($con, $query);
    } while (mysqli_num_rows($result) > 0);

    // Insert data into the database
    $sql = "INSERT INTO trip_status (id, coach_no, date, time, route, station) VALUES ('$random_num', '$coach_no', '$date', '$time', '$route', '$station')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Added a New Trip Successfully');
        window.location.href = 'admin.php';
        </script>";
    } else {
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
            <a class="navbar-brand p-1" href="#">Friends Travels</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container overflow-hidden text-center">
                    <form class="row gx-2">
                        <div class="col">
                            <div class="p-1">
                                <select class="form-select mr-4" aria-label="Default select example">
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
                                <select class="form-select mr-4" aria-label="Default select example">
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
                                <input class="form-control" type="date" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex">
                    <a href="index.php">Agent</a>
                </div>
            </div>

        </div>
    </nav>

    <!-- Trip Action Section -->
    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tripAddModal">
                    Trip Add
                </button>
            </div>
        </div>
    </div>

    <!-- All Trip Section -->
    <div class="container">
        <?php

        $sql = "SELECT * FROM `trip_status` ORDER BY s_no ASC";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

            echo '
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Coach</th>
                        <th scope="col">Time</th>
                        <th scope="col">Route</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <tr>
                        <td>' . $row['coach_no'] . '</td>
                        <td>' . $row['time'] . '</td>
                        <td>' . $row['route'] . '</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' . $row['id'] . '">
                                Book
                            </button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tripOmit" data-id="' . $row['id'] . '">
                            Omit
                        </button>
                        </td>
                    </tr>';
            }
            echo '</tbody></table>';

        } else {
            echo 'Data not found in the database';
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
                                <option value="101" data-value="Dhaka - Gopalganj - Khulna" data-time="06:30 AM"
                                    data-station="Gopalgonj - 500, Fakirhat - 600, Khulna -700">101
                                </option>
                                <option value="105" data-value="Dhaka - Gopalganj - Khulna" data-time="08:30 AM"
                                    data-station="Gopalgonj - 500, Fakirhat - 600, Khulna -700">105
                                </option>
                                <option value="110" data-value="Dhaka - Gopalganj - Khulna" data-time="12:30 PM"
                                    data-station="Gopalgonj - 500, Fakirhat - 600, Khulna -700">110
                                </option>
                                <option value="115" data-value="Dhaka - Gopalganj - Khulna" data-time="05:30 PM"
                                    data-station="Gopalgonj - 500, Fakirhat - 600, Khulna -700">115
                                </option>
                                <option value="210" data-value="Dhaka - Gopalganj - Pirojpur" data-time="07:30 AM"
                                    data-station="Gopalgonj - 500, Nazirpur - 600, Pirojpur -700">210
                                </option>
                                <option value="215" data-value="Dhaka - Gopalganj - Pirojpur" data-time="11:30 AM"
                                    data-station="Gopalgonj - 500, Nazirpur - 600, Pirojpur -700">215
                                </option>
                                <option value="220" data-value="Dhaka - Gopalganj - Pirojpur" data-time="08:30 PM"
                                    data-station="Gopalgonj - 500, Nazirpur - 600, Pirojpur -700">220
                                </option>
                                <option value="310" data-value="Dhaka - Gopalganj - Kotalipara" data-time="09:30 AM"
                                    data-station="Gopalgonj - 500, Kotalipara - 600">310
                                </option>
                                <option value=" 315" data-value="Dhaka - Gopalganj - Kotalipara" data-time="09:30 PM"
                                    data-station="Gopalgonj - 500, Kotalipara - 600">315
                                </option>
                                <option value="410" data-value="Dhaka - Vatiyapara - Narail" data-time="09:00 AM"
                                    data-station="Vatiyapara - 450, Narail - 550">410
                                </option>
                                <option value="420" data-value="Dhaka - Vatiyapara - Narail" data-time="09:00 PM"
                                    data-station="Vatiyapara - 450, Narail - 550">420
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="route" id="route" value="" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="time" id="time" value="" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="station" id="station" value="" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <input name="date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>"
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




        function changeValue() {
            var dropdown = document.getElementsByName("coach_no")[0];
            var inputBox = document.getElementById("route");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-value");
        }

        function changeTime() {
            var dropdown = document.getElementsByName("coach_no")[0];
            var inputBox = document.getElementById("time");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-time");
        }

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