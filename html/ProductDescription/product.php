<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/product.css">
</head>



<body onload="descSubtotalCalc()"> 
    <!--Navigation bar at the top-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="../../index.php" class="navbar-brand">FeedMeLife</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto">

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="#navbarDropDown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop by Aisle</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../aisles/vegeAisle.php">Fruits & Veges</a>
                        <a class="dropdown-item" href="../aisles/dairyAisle.php">Dairy & Eggs</a>
                        <a class="dropdown-item" href="../aisles/pantryAisle.php">Pantry</a>
                        <a class="dropdown-item" href="../aisles/beverageAisle.php">Beverages</a>
                        <a class="dropdown-item" href="../aisles/meatAisle.php">Meat & Poultry</a>
                        <a class="dropdown-item" href="../aisles/snacksAisle.php">Snacks</a>
                        <a class="dropdown-item" href="../aisles/mealsAisle.php">Prepared Meals</a>
                        <a class="dropdown-item" href="../aisles/bakeryAisle.php">Bakery</a>
                        <a class="dropdown-item" href="../aisles/frozenAisle.php">Frozen</a>
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="../Interface/loginPage.php" class="nav-link">Sign in</a>
                </li>
                <li class="nav-item">
                    <a href="../Interface/cart.html" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="17"
                            height="17" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg> My Cart</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container product">
        <div class="row name">
            <div class="col-md-4 ">
                <p id="product-name"><?php 
                            if (isset($_GET['getProduct'])){
                                $value=$_GET['getProduct']-1;
                                $xml=simplexml_load_file("../../database/products.xml");
                                print($xml->product[$value]->name);
                            }
                        
                        ?></p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4 ">
                <div class="img-container" id="pita">
                    <img src="<?php 
                            if (isset($_GET['getProduct'])){
                                $value=$_GET['getProduct']-1;
                                $xml=simplexml_load_file("../../database/products.xml");
                                print($xml->product[$value]->image);
                            }
                        
                        ?>" style="max-height: 500px; display:block; margin-left:auto; margin-right:auto">
                </div>

            </div>
            <div class="col-md-4 text">


                <p id="product-size"><?php 
                            if (isset($_GET['getProduct'])){
                                $value=$_GET['getProduct']-1;
                                $xml=simplexml_load_file("../../database/products.xml");
                                print($xml->product[$value]->quantity);
                            }
                        
                        ?></p>
                <p id="product-price">
                    <?php 
                            if (isset($_GET['getProduct'])){
                                $value=$_GET['getProduct']-1;
                                $xml=simplexml_load_file("../../database/products.xml");
                                print($xml->product[$value]->price);
                            }
                        
                        ?></p>
                <div class="quantity buttons_added">
                    <input type="button" value="-" class="control" id="minus" onclick="descSubtract1()">
                    <input type="number" step="1" min="1" max=""name="quantity" value="1" title="Qty" 
                    class="input-text qty text" size="4" pattern=""inputmode="" id="quant" oninput="descSubtotalCalc()">
                    <input type="button" value="+" class="control" id="plus" onclick="descAdd1()">
                </div>
                <button>Add to cart</button>
                <br>
                <br>
                <p id="subtotal"></p>


            </div>
            <div class="col-md-4 ">
                <div class="">
                    <button id="info" class="descriptionButton" onclick="descToggle()" data-toggle="collapse" data-target="#para">More Information ></button>
                    <div id="para" class="collapse col-md-2 description">
                        <?php 
                            if (isset($_GET['getProduct'])){
                                $value=$_GET['getProduct']-1;
                                $xml=simplexml_load_file("../../database/products.xml");
                                print($xml->product[$value]->description);
                            }
                        
                        ?>
                    </div>

                </div>

            </div>


        </div>

    </div>

    <!--Footer beginning-->
    <?php include("../../php/footer.php");?>

    <script src="../../javascript/javascript.js"></script>

    <!--Script source files for bootstrap-->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</body>




</html>