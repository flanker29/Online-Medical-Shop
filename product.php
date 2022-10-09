<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

global $id, $price, $username;
$id = $price = $username = "";
?>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</head>
<style>
    .container {
        margin-top: 100px;
        margin-left: 200px;
        position: relative;
    }

    .img-box {
        height: 120px;
        margin-bottom: 20px;
        width: 100%;
        position: relative;
    }

    .carousel {
        width: 250px;
        height: 300px;
    }

    .new {
        background: green;
        width: 50px;
        color: white;
        font-size: 12px;
        font-weight: bold;
    }

    .star-rating i {
        font-size: 14px;
        color: #ffc000;
    }

    .col-mid-7 h2 {
        color: #555;
    }

    .price {
        color: #FE980F;
        font-size: 26px;
        font-weight: bold;
        padding-top: 20px;

    }

    input {
        border: 1px solid #ccc;
        font-weight: bold;
        height: 33px;
        text-align: center;
        width: 30px;
    }

    .cart {
        background: #10847e;
        color: #FFFFFF;
        font-size: 15px;
        margin-left: 20px;
    }
</style>

<body>



    <!-- --------------------- -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class=" brand" src="logo1.jpeg" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catagory.php">products</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="http://localhost:9372/project1/login.php">login</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <?php

    $id = $_POST['ProductId'];
    echo $id;
    $x = substr($id, 4);
    $x = $x * 3 - 2;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "demo";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM product where id='$x' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $image_array = array();
    for ($i = 0; $i < 3; $i++) {
        $img = mysqli_query($conn, "SELECT * FROM images where id='$x'");
        while ($rowi = mysqli_fetch_array($img)) {

            $image_array[$i] = "<img src='images/" . $rowi['file_name'] . "' >";
        }
        $x++;
    }


    //$img1 = '<img src="data:image/jpg;base64,' . base64_encode($row["img1"]) . '"." class="d-block w-100"" />';
    //$img2 = '<img src="data:image/jpg;base64,' . base64_encode($row["img2"]) . '"." class="d-block w-100"" />';
    //$img3 = '<img src="data:image/jpg;base64,' . base64_encode($row["img3"]) . '"." class="d-block w-100"" />';
    $conn->close();

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                               <?php echo $image_array[0] ?>
                        </div>
                        <div class="carousel-item">
                            <?php echo $image_array[1] ?>
                        </div>
                        <div class="carousel-item">
                            <?php echo $image_array[2] ?>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-7">
                <p class="new">NEW</p>
                <h2><?php echo $row['name']; ?></h2>
                <p>Product code: ISRC</p>
                <div class="star-rating">
                    <ul class="list-inline">
                        <?php for ($i = 0; $i < $row['star']; $i++) : ?>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < 5 - $row['star']; $i++) : ?>
                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                        <?php endfor; ?>
                    </ul>
                </div>

                <?php $price1 = $row['price']; ?>
                <p class="price"><?php echo $row['price']; ?></p><del><?php echo $row['cprice']; ?></del>
                <p><b>Availability: </b>In stock</p>
                <p>Delivery by <b>Tommorow</b></p>
                <label>Quantity:</label>
                <form action="cart.php" method="POST">
                    <input type="text" name="qty" value="1">
                    <input type="hidden" name="prod" value="<?php echo $x; ?>">
                    <input type="hidden" name="pr" value="<?php echo $price1; ?>">
                    <input type="submit" class="btn btn-default cart" name="submit_cart" value="ADD_to_Cart">

                </form>
            </div>


        </div>
    </div>
</body>

</html>

<?php







?>