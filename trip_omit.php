<?php
// Establish a database connection
require_once 'inc/conn.php';

// Get the id number from the GET request
$id = $_GET['id'];

// query the database to retrieve the coach_no, time, and route data for the selected row
$query = "SELECT s_no, id, coach_no, date, time, route FROM trip_status WHERE id='$id'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // display the coach_no, time, and route data in the modal
    echo '<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">' . $row['route'] . '</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>';

    echo '
    <div class="modal-body">
        <div class="container text-center">
            <div class="row g-2 seat">
                <div class="col-md">
                    <input type="tel" class="form-control"  name="mobile" value="'.$row['coach_no'].'" readonly>
                </div>
                <div class="col-md">
                    <input type="text" class="form-control" name="name" value="" readonly>
                </div>
            </div>
        </div>
    </div>';

}

?>