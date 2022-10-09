<?php
session_start();
$first_name = $last_name = $email = $mobile = $address = $city = $state = $xyz = $country = $address = "";











function button1()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "demo";
    $conn = mysqli_connect($servername, $username, $password, "$dbname");
    if (!$conn) {
        $conn = null;
        die('Could not Connect My Sql:');
    }
    $id = $_SESSION['username'];
    // echo $id . "<-----";
    $result = mysqli_query($conn, "SELECT * FROM user_details WHERE username='" . $id . "'");

    $i = 0;
    while ($res = mysqli_fetch_array($result)) {
        global $first_name, $last_name, $email, $address, $city, $pin, $country, $mobile, $state;
        $first_name = $res['firstname'];
        $last_name = $res['lastname'];
        $city = $res['city'];
        $email = $res['email'];
        $mobile = $res['mobile'];
        $state = $res['state'];
        $country = $res['country'];
        $address = $res['address'];
        $xyz = $res['xyz'];
        $i++;
    }
    mysqli_close($conn);
}
button1();

$servername = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = "demo";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    $conn = null;
    die('Could not Connect My Sql:');
}

if (isset($_POST['save']) && $_POST['save'] == "submit1") {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $xyz = $_POST['xyz'];

    $sql = "UPDATE user_details SET first_name='" . $first_name . "',last_name='" . $last_name . "',email='" . $email . "',mobile='" . $mobile . "',address='" . $address . "',city='" . $city . "',state='" . $state . "',country='" . $country . "',xyz='" . $xyz . "'";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1f2b08c359.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <!-- --------------------- -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class=" brand" src="logo1.jpeg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">products</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="http://localhost:9372/project1/login.php">login</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            <li><a class="dropdown-item" href="reset-password.php">Reset Password</a></li>
                            <li><a class="dropdown-item" href="cart.php">cart</a></li>
                            <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ------------------------------------- -->
    <section>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?> " method="POST">
            <div class=" container py-5">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                    alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"><?php echo $first_name;?></h5>

                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fas fa-globe fa-lg text-warning"></i>
                                        <p class="mb-0">https://Radheymedicals.com</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                        <p class="mb-0">@radhey_meds</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <p class="mb-0">Radhey Medical</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                        <p class="mb-0">Radhey Medical</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">First Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0" name="first_name" placeholder="first_name"
                                            value="<?php echo "$first_name"; ?>">
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Last Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0" name="last_name" placeholder="last_name"
                                            value="<?php echo "$last_name"; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0" name="email" placeholder="email"
                                            value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Mobile</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0" name="mobile" placeholder="mobile"
                                            value="<?php echo $mobile; ?>">
                                    </div>
                                </div>
                                <hr>



                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0" placeholder="address" name="address"
                                            value="<?php echo $address ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">City</p>
                                    </div>
                                    <div class="col-sm-9">

                                        <input class="mb-0" name="city" placeholder="city" value="<?php echo $city; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">State</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0" name="state" placeholder="state"
                                            value="<?php echo $state; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Pin Code</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0" name="xyz" placeholder="pin"
                                            value="<?php echo $xyz; ?>">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Country</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="text-muted mb-0" name="country" value="<?php echo $country; ?>"
                                            placeholder="country">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <input type="submit" name="save" value="submit1">
        </form>

    </section>
</body>

</html>