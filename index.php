<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Friends Travels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Coach</th>
                    <th scope="col">Time</th>
                    <th scope="col">Route</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>105</td>
                    <td>09:00 AM</td>
                    <td>Dhaka - Gopalganj - Khulna</td>
                    <td>
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Book
                        </button>
                    </td>

                </tr>
            </tbody>
        </table>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            Coach 105
                        </div>
                        <div class="col">
                            27-04-2023
                        </div>
                        <div class="col">
                            06:00 AM
                        </div>
                    </div>
                </div>

                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="btn-check" id="btn-check-outlined1" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined1">A1</label>
                                
                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined">A2</label>
                                
                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined">A3</label>
                                
                                <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btn-check-outlined">A4</label>

                            </div>
                        </div>
                        <div class="col">
                            27-04-2023
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>