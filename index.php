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
                    Mafuz Alam
                </div>
            </div>

        </div>
    </nav>

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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" id="modal-content">

                

            </div>
        </div>
    </div>



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

    </script>




    <script>
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