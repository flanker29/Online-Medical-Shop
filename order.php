<?php
// Initialize the session
session_start();

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1f2b08c359.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="card ">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #6a0404;font-size: 20px;">Invoice >> <strong>ID: #123-123</strong></p>
                    </div>
                    <div class="col-xl-3 float-end">
                        <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                class="fas fa-print text-primary"></i> Print</a>
                        <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                class="far fa-file-pdf text-danger"></i> Export</a>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <div class="col-md-12">
                        <div class="text-center">
                            <i class="fa fa-medkit" style="font-size:48px;color:rgba(241, 24, 24, 0.749)"></i>
                            <p class="pt-3" style="font-size:30px;">Radheymedicals.com</p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">To: <span
                                        style="color:#5d9fc5 ;"><?php echo $_SESSION['username']; ?></span></li>


                                <li class="text-muted text-white mb-3"><i class="fas fa-phone"></i>(+91) 95-121-55077
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-4">
                            <p class="text-muted">Invoice</p>
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="fw-bold">ID:</span>#123-456</li>

                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                        class="me-1 fw-bold">Status:</span><span
                                        class="badge bg-warning text-black fw-bold">
                                        paid</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $user = $_SESSION['username'];
                                $sql = "SELECT * FROM cart where username='$user'";
                                $result = mysqli_query($link, $sql);

                                $total_amt = 0;
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $total_amt += $row['qty'] * $row['price'];
                                ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo $row['product_id']; ?></td>
                                    <td><?php echo $row['qty']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['qty'] * $row['price']; ?></td>
                                </tr>

                                <?php
                                    }
                                }

                                ?>

                            </tbody>

                        </table>
                    </div>
                    <div class="row">

                        <div class="col-xl-3">

                            <p class="text-black float-start"><span class="text-black me-3">Total Amount</span><span
                                    style="font-size: 25px;">$<?php echo $total_amt; ?></span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-10">
                            <p>Thank you for your purchase</p>
                        </div>
                        <div class="col-xl-2">
                            <a href="welcome.php"><button type="button" class="btn btn-primary text-capitalize"
                                    style="background-color:#60bdf3 ;">Have a Good day</button></a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>