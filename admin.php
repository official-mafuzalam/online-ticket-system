<?php

require_once 'inc/conn.php';



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
        $result = mysqli_query( $con, $sql );

        if (mysqli_num_rows( $result ) > 0) {

            echo '
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Coach</th>
                        <th scope="col">Time</th>
                        <th scope="col">Route</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
            while ($row = mysqli_fetch_assoc( $result )) {
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
                    </tr>';
            }
            echo '</tbody></table>';

        }
        else {
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

    <!-- Modal For Add New Trip -->

    <div class="modal fade" id="tripAddModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Trip Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <select class="form-select mr-4" name="coach_no" aria-label="Default select example">
                                <option selected>Coach No</option>
                                <option value="101">101</option>
                                <option value="105">105</option>
                                <option value="110">110</option>
                                <option value="115">115</option>
                                <option value="210">210</option>
                                <option value="215">215</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" name="route" required>
                                <option selected>Route</option>
                                <option value="Dhaka - Gopalganj - Khulna">Dhaka - Gopalganj - Khulna</option>
                                <option value="Dhaka - Gopalganj - Pirojpur">Dhaka - Gopalganj - Pirojpur</option>
                                <option value="Dhaka - Gopalganj - Kotalipara">Dhaka - Gopalganj - Kotalipara</option>
                                <option value="Dhaka - Vatiyapara - Narail">Dhaka - Vatiyapara - Narail</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="deposit_category" class="form-select" required onchange="changeValue()">
                                <option value="" selected>Select Fees Category</option>
                                <option value="Semester Fees" data-value="8500">Semester Fees</option>
                                <option value="Tuition Fees" data-value="12000">Tuition Fees</option>
                                <option value="Form Fill-Up Fees" data-value="2500">Form Fill-Up Fees</option>
                                <option value="Mid Term Fees" data-value="600">Mid Term Fees</option>
                                <option value="Referred Exam Fees" data-value="800">Referred Exam Fees</option>
                                <option value="Others" data-value="0">Others</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="number" name="deposit_amount" id="deposit_amount" value="" class="form-control"
                                required>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
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



        function changeValue() {
            var dropdown = document.getElementsByName("deposit_category")[0];
            var inputBox = document.getElementById("deposit_amount");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-value");
        }

    </script>




    <!-- <script>
        const checkboxes = document.querySelectorAll('.btn-check');
        const selectedItemsDiv = document.querySelector('#selected-items');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => {
                const label = event.target.nextElementSibling;
                if (event.target.checked && label !== null && label.innerHTML !== null) {
                    selectedItemsDiv.innerHTML += `<span class="badge badge-lg bg-primary">${label.innerHTML}</span>`;
                } else {
                    const badges = selectedItemsDiv.querySelectorAll('.badge');
                    badges.forEach((badge) => {
                        if (badge.innerHTML === label.innerHTML) {
                            selectedItemsDiv.removeChild(badge);
                        }
                    });
                }
            });
        });
    </script> -->










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