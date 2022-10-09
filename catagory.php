<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Multiple Item Product Carousel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="catagory.css">
    <style>
        body {
            background: #e2eaef;
            font-family: "Open Sans", sans-serif;
        }

        h2 {
            color: #000;
            font-size: 26px;
            font-weight: 300;
            text-align: center;
            text-transform: uppercase;
            position: relative;
            margin: 30px 0 60px;
        }

        h2::after {
            content: "";
            width: 100px;
            position: absolute;
            margin: 0 auto;
            height: 4px;
            border-radius: 1px;
            background: #10847e;
            left: 0;
            right: 0;
            bottom: -20px;
        }

        .carousel {
            margin: 50px auto;
            padding: 0 70px;
        }

        .carousel .item {
            color: #747d89;
            min-height: 325px;
            text-align: center;
            overflow: hidden;
        }

        .carousel .thumb-wrapper {
            padding: 25px 15px;
            background: #fff;
            border-radius: 6px;
            text-align: center;
            position: relative;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
        }

        .carousel .item .img-box {
            height: 120px;
            margin-bottom: 20px;
            width: 100%;
            position: relative;
        }

        .carousel .item img {
            max-width: 100%;
            max-height: 100%;
            display: inline-block;
            position: absolute;
            bottom: 0;
            margin: 0 auto;
            left: 0;
            right: 0;
        }

        .carousel .item h4 {
            font-size: 18px;
        }

        .carousel .item h4,
        .carousel .item p,
        .carousel .item ul {
            margin-bottom: 5px;
        }

        .carousel .thumb-content .btn {
            color: #10847e;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: bold;
            background: none;
            border: 1px solid #10847e;
            padding: 6px 14px;
            margin-top: 5px;
            line-height: 16px;
            border-radius: 20px;
        }

        .carousel .thumb-content .btn:hover,
        .carousel .thumb-content .btn:focus {
            color: #fff;
            background: #10847e;
            box-shadow: none;
        }

        .carousel .thumb-content .btn i {
            font-size: 14px;
            font-weight: bold;
            margin-left: 5px;
        }

        .carousel .item-price {
            font-size: 13px;
            padding: 2px 0;
        }

        .carousel .item-price strike {
            opacity: 0.7;
            margin-right: 5px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            height: 44px;
            width: 40px;
            background: #10847e;
            margin: auto 0;
            border-radius: 4px;
            opacity: 0.8;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: #0c6b66;
            opacity: 1;
        }

        .carousel-control-prev i,
        .carousel-control-next i {
            font-size: 36px;
            position: absolute;
            top: 50%;
            display: inline-block;
            margin: -19px 0 0 0;
            z-index: 5;
            left: 0;
            right: 0;
            color: #fff;
            text-shadow: none;
            font-weight: bold;
        }

        .carousel-control-prev i {
            margin-left: -2px;
        }

        .carousel-control-next i {
            margin-right: -4px;
        }

        .carousel-indicators {
            bottom: -50px;
        }

        .carousel-indicators li,
        .carousel-indicators li.active {
            width: 10px;
            height: 10px;
            margin: 4px;
            border-radius: 50%;
            border: none;
        }

        .carousel-indicators li {
            background: rgba(0, 0, 0, 0.2);
        }

        .carousel-indicators li.active {
            background: rgba(0, 0, 0, 0.6);
        }

        .carousel .wish-icon {
            position: absolute;
            right: 10px;
            top: 10px;
            z-index: 99;
            cursor: pointer;
            font-size: 16px;
            color: #abb0b8;
        }

        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            color: inherit;
        }

        .carousel .wish-icon .fa-heart {
            color: #ff6161;
        }

        .star-rating li {
            padding: 0;
        }

        .star-rating i {
            font-size: 14px;
            color: #ffc000;
        }
    </style>
    <script>
        $(document).ready(function() {
            $(".wish-icon i").click(function() {
                $(this).toggleClass("fa-heart fa-heart-o");
            });
        });
    </script>
</head>

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
                        <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
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
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
                <h2>Diabetic <b>Care</b></h2>
                <div id="myCarousel1" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel1" data-slide-to="1"></li>

                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="item carousel-item active">

                            <div class="row">


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/dc1-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Accu-Chek Active Glucometer Test Strips Box Of 50</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹975</strike> <b>₹799.5</b></p>
                                            <form action="product.php" method="POST">
                                                <input type='hidden' name='ProductId' value='prod1'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/dc2-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Everherb Jamun Juice -Maintains Sugar Levels -1l</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹499.00</strike> <b>₹199.5</b></p>
                                            <form action="product.php" method="POST">
                                                <input type='hidden' name='ProductId' value='prod2'>
                                                <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/dc3-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Protinex Diabetes Care Vanilla 400gm- Control Blood Sugar</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹650.00</strike> <b>₹572</b></p>
                                            <form action="product.php" method="POST">
                                                <input type='hidden' name='ProductId' value='prod3'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/dc4-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Dr. Reddy'S Celevida Nutrition Drink For Diabetes Care - 400g</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹690.00</strike> <b>₹607.2</b></p>
                                            <form action="product.php" method="POST">
                                                <input type='hidden' name='ProductId' value='prod4'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="item carousel-item">
                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/dc5-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Sugar Free Gold Sweetener Powder Jar Of 100 G</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹150.00</strike> <b>₹135</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod5'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/dc6-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Onetouch Select Plus Simple Glucometer With 10 Free Strips</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹1147.00</strike> <b>₹871.72</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod6'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/dc7-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Liveasy Essentials Men'S Diabetic & Orthopedic Slippers </h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹999.00</strike> <b>₹519.48</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod7'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/dc8-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Liveasy Wellness Diabetic Protein - Blood Sugar </h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹999.00</strike> <b>₹549.45</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod8'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel1" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel1" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Ayurvedic <b>Care</b></h2>
                <div id="myCarousel2" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel2" data-slide-to="1"></li>

                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="item carousel-item active">

                            <div class="row">


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ayu1-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Himalaya Septilin Tablets - 60'S</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹165.00</strike> <b>₹140.25</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod9'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ayu2-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Liveasy Wellness Multivitamin 60</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹699.00</strike> <b>₹349.5</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod10'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ayu3-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Everherb Amla Juice 1 Litre Bottle</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹399.00</strike> <b>₹199.5</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod11'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ayu4-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Himalaya Tentex Forte Tablets - 10'S</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹90.00</strike> <b>₹81.00</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod12'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item carousel-item">
                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ayu5-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Volini Pain Relief Spray - 60 Gm</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹208.00</strike> <b>₹172.64</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod13'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ayu6-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Himalaya Abana Tablets - 60'S</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹160.00</strike> <b>₹140.00</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod14'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ayu7-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Zandu Kesari Jivan Nutrition 900 G</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹740.00</strike> <b>₹629.00</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod15'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ayu8-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Dr Ortho An Ayurvedic Medicine Oil 120 Ml</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹295.00</strike> <b>₹259.6</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod16'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel2" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel2" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>personal <b>healthcare</b></h2>
                <div id="myCarousel3" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel3" data-slide-to="1"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="item carousel-item active">

                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ph1-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Revital H Men Multivitamin With Calcium</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹500.00</strike> <b>₹467.00</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod17'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ph2-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Boroline Sx Antiseptic Ayurvedic Cream 20 Gm</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹40.00</strike> <b>₹38.00</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod18'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ph3-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4>Venusia Max Intensive Moisturizing Lotion 500gm</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹899.00</strike> <b>₹687.24</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod19'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ph4-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4> Gnc Mega Men Sport Multivitamin 120 Tablets</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹2499.00</strike> <b>₹2399.00</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod20'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item carousel-item">
                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ph5-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4> Listerine Cavity Fighter Mouthwash Bottle Of 500 Ml</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹305.00</strike> <b>₹268.00</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod21'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ph6-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4> Cetaphil Dam Daily Advance Hydrating Lotion - 100g</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹599.00</strike> <b>₹475.00</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod22'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ph7-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4> Indulekha Bringha Hair Oil Bottle Of 50 Ml</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹234.00</strike> <b>₹205.92</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod23'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="thumb-wrapper">

                                        <div class="img-box">
                                            <img src="images/ph8-1.jpg" class="img-fluid" alt="">
                                        </div>
                                        <div class="thumb-content">
                                            <h4> Dettol Original Germ Protection Bathing Soap Bar - 125g</h4>
                                            <div class="star-rating">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>

                                            <p class="item-price"><strike>₹70.00</strike> <b>₹63.00</b></p>
                                            <form action="product.php" method="POST">

                                                <input type='hidden' name='ProductId' value='prod24'>
                                                 <button type="submit" class="btn btn-outline-success" name="Productbutton">view more</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control-prev" href="#myCarousel3" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel3" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>