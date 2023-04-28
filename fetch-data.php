<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "friendsi_online_ticket";

$conn = mysqli_connect( $servername, $username, $password, $dbname );

// Check connection
if (!$conn) {
    die( "Connection failed: " . mysqli_connect_error() );
}

// Get the id number from the GET request
$id = $_GET['id'];

// query the database to retrieve the coach_no, time, and route data for the selected row
$query = "SELECT s_no, id, coach_no, date, time, route, a1, a2, a3, a4, b1, b2, b3, b4, c1, c2, c3, c4 FROM trip_status WHERE id='$id'";
$result = mysqli_query( $conn, $query );

if (mysqli_num_rows( $result ) > 0) {
    $row = mysqli_fetch_assoc( $result );

    // display the coach_no, time, and route data in the modal
    echo '<div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">' . $row['route'] . '</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>';
    echo '
    <div class="modal-body">
        <div class="container text-center">
            <div class="container text-center">
                <div class="row">
                    <div class="col fw-semibold">
                    ' . $row['coach_no'] . '
                    </div>
                    <div class="col fw-semibold">
                    ' . $row['date'] . '
                    </div>
                    <div class="col fw-semibold">
                    ' . $row['time'] . '
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="form-check form-check-inline">
                        <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'A1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'A1">A1</label>
                    
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'A2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'A2">A2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'A3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'A3">A3</label>
                    
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'A4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'A4">A4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'B1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'B1">B1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'B2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'B2">B2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'B3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'B3">B3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'B4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'B4">B4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'C1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'C1">C1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'C2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'C2">C2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'C3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'C3">C3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'C4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'C4">C4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'D1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'D1">D1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'D2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'D2">D2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'D3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'D3">D3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'D4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'D4">D4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'E1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'E1">E1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'E2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'E2">E2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'E3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'E3">E3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'E4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'E4">E4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'F1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'F1">F1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'F2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'F2">F2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'F3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'F3">F3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'F4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'F4">F4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'G1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'G1">G1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'G2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'G2">G2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'G3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'G3">G3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'G4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'G4">G4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'H1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'H1">H1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'H2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'H2">H2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'H3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'H3">H3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'H4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'H4">H4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I1">I1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I2">I2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I3">I3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I4">I4</label>
                        </div>
                    </div>
                        <div class="row seat">
                            <div class="col">
                                <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J1" autocomplete="off">
                                <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J1">J1</label>

                                <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J2">J2</label>
                            </div>
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J5" autocomplete="off">
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J5">J5</label>
                            <div class="col">
                                <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J3">J3</label>

                                <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J4">J4</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col seat">
                    <form action="" method="post">
                        <h5>
                            <div id="selected-items">
                            
                            </div>
                        </h5>
                        <br>
                        <div class="row g-2 seat">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" id="station" name="station">
                                        <option selected>Select Station</option>
                                        <option value="1">Gopalganj - 500</option>
                                        <option value="2">Fakirhat - 600</option>
                                        <option value="3">Khulna - 700</option>
                                    </select>
                                    <label for="station">Station</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 seat">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="mobile" name="mobile"
                                        placeholder="01751944774" value="+88 01">
                                    <label for="mobile">Mobile Number</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="MR. X" value="Mr: ">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 seat">
                            <div class="col-md">
                                <div class="form-floating">
                                    <select class="form-select" id="gender" name="gender">
                                        <option selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <label for="gender">Gender</label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info" value="Confirm">
                    </form>
                </div>
            </div>
        </div>
    </div>';
}
else {
    // if no rows are returned, display an error message
    echo "No data found.";
}

// Close the database connection
mysqli_close( $conn );
?>

<script>
    // function to update the selected items in the "selected-items" div
    function updateSelectedItems() {
        // get all the checkboxes with class "btn-check" that are checked
        var selectedCheckboxes = document.querySelectorAll('.btn-check:checked');
        // get the "selected-items" div
        var selectedItemsDiv = document.getElementById('selected-items');
        // clear the contents of the div
        selectedItemsDiv.innerHTML = '';
        // iterate over the selected checkboxes
        for (var i = 0; i < selectedCheckboxes.length; i++) {
            // create a span element for each selected checkbox
            var selectedCheckboxSpan = document.createElement('span');
            selectedCheckboxSpan.className = 'badge bg-primary me-2';
            selectedCheckboxSpan.innerHTML = selectedCheckboxes[i].nextElementSibling.innerHTML;
            // add the span element to the "selected-items" div
            selectedItemsDiv.appendChild(selectedCheckboxSpan);
        }
    }

    // listen for changes in the state of any checkbox with class "btn-check"
    document.querySelectorAll('.btn-check').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateSelectedItems();
        });
    });
</script>