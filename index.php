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
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Book
                            </button>
                        </td>

                    </tr>';
            }
            echo '</tbody></table>';

        } else {
            echo 'Data not found in the database';
        }

        ?>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="container text-center">
                    <div class="row">
                        <div class="col fw-semibold">
                            Coach 105
                        </div>
                        <div class="col fw-semibold">
                            27-04-2023
                        </div>
                        <div class="col fw-semibold">
                            06:00 AM
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <div class="row seat">
                                    <div class="col gap">
                                        <input type="checkbox" class="btn-check" id="A1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="A1">A1</label>

                                        <input type="checkbox" class="btn-check" id="A2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="A2">A2</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="A3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="A3">A3</label>

                                        <input type="checkbox" class="btn-check" id="A4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="A4">A4</label>
                                    </div>
                                </div>
                                <div class="row seat">
                                    <div class="col gap">
                                        <input type="checkbox" class="btn-check" id="B1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="B1">B1</label>

                                        <input type="checkbox" class="btn-check" id="B2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="B2">B2</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="B3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="B3">B3</label>

                                        <input type="checkbox" class="btn-check" id="B4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="B4">B4</label>
                                    </div>
                                </div>
                                <div class="row seat">
                                    <div class="col gap">
                                        <input type="checkbox" class="btn-check" id="C1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="C1">C1</label>

                                        <input type="checkbox" class="btn-check" id="C2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="C2">C2</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="C3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="C3">C3</label>

                                        <input type="checkbox" class="btn-check" id="C4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="C4">C4</label>
                                    </div>
                                </div>
                                <div class="row seat">
                                    <div class="col gap">
                                        <input type="checkbox" class="btn-check" id="D1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="D1">D1</label>

                                        <input type="checkbox" class="btn-check" id="D2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="D2">D2</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="D3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="D3">D3</label>

                                        <input type="checkbox" class="btn-check" id="D4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="D4">D4</label>
                                    </div>
                                </div>
                                <div class="row seat">
                                    <div class="col gap">
                                        <input type="checkbox" class="btn-check" id="E1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="E1">E1</label>

                                        <input type="checkbox" class="btn-check" id="E2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="E2">E2</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="E3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="E3">E3</label>

                                        <input type="checkbox" class="btn-check" id="E4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="E4">E4</label>
                                    </div>
                                </div>
                                <div class="row seat">
                                    <div class="col gap">
                                        <input type="checkbox" class="btn-check" id="F1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="F1">F1</label>

                                        <input type="checkbox" class="btn-check" id="F2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="F2">F2</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="F3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="F3">F3</label>

                                        <input type="checkbox" class="btn-check" id="F4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="F4">F4</label>
                                    </div>
                                </div>
                                <div class="row seat">
                                    <div class="col gap">
                                        <input type="checkbox" class="btn-check" id="G1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="G1">G1</label>

                                        <input type="checkbox" class="btn-check" id="G2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="G2">G2</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="G3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="G3">G3</label>

                                        <input type="checkbox" class="btn-check" id="G4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="G4">G4</label>
                                    </div>
                                </div>
                                <div class="row seat">
                                    <div class="col gap">
                                        <input type="checkbox" class="btn-check" id="H1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="H1">H1</label>

                                        <input type="checkbox" class="btn-check" id="H2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="H2">H2</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="H3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="H3">H3</label>

                                        <input type="checkbox" class="btn-check" id="H4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="H4">H4</label>
                                    </div>
                                </div>
                                <div class="row seat">
                                    <div class="col gap">
                                        <input type="checkbox" class="btn-check" id="I1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="I1">I1</label>

                                        <input type="checkbox" class="btn-check" id="I2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="I2">I2</label>
                                    </div>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="I3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="I3">I3</label>

                                        <input type="checkbox" class="btn-check" id="I4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="I4">I4</label>
                                    </div>
                                </div>
                                <div class="row seat">
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="J1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="J1">J1</label>

                                        <input type="checkbox" class="btn-check" id="J2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="J2">J2</label>
                                    </div>
                                    <input type="checkbox" class="btn-check" id="J5" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="J5">J5</label>
                                    <div class="col">
                                        <input type="checkbox" class="btn-check" id="J3" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="J3">J3</label>

                                        <input type="checkbox" class="btn-check" id="J4" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="J4">J4</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col seat">
                            <form action="process_form.php" method="post">
                                <h5>
                                    <div class="selected-items">
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





            </div>
        </div>
    </div>



    <script>
        const checkboxes = document.querySelectorAll('.btn-check');
        const selectedItemsDiv = document.querySelector('.selected-items');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => {
                const label = event.target.nextElementSibling;
                if (event.target.checked) {
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
</body>

</html>