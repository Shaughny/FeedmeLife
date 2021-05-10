<?php
session_start(); 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Feed Me Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/aisle-style.css">
</head>

<body>
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
                        <a class="dropdown-item menuItemActive" href="vegeAisle.php">Fruits & Veges</a>
                        <a class="dropdown-item" href="dairyAisle.php">Dairy & Eggs</a>
                        <a class="dropdown-item" href="pantryAisle.php">Pantry</a>
                        <a class="dropdown-item" href="beverageAisle.php">Beverages</a>
                        <a class="dropdown-item" href="meatAisle.php">Meat & Poultry</a>
                        <a class="dropdown-item" href="snacksAisle.php">Snacks</a>
                        <a class="dropdown-item" href="mealsAisle.php">Prepared Meals</a>
                        <a class="dropdown-item" href="bakeryAisle.php">Bakery</a>
                        <a class="dropdown-item" href="frozenAisle.php">Frozen</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="../../html/Interface/loginPage.php" class="nav-link">Sign in</a>
                </li>
                <li class="nav-item">
                  <a href="../Interface/cart.php" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="17"
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
    <!--end of navigation bar-->
    
    <!--Start of landing page-->
    <div class="big-banner" style="height: 100em; padding-top:150px;">
        <div class="aisleMenu float-container">
            <div class="float-child" id="leftMenu">
                <table>
                    <ul style="list-style-type:none">
                        <li class="menuItem menuItemActive"><a href="vegeAisle.php">Fruits & Veges</a></li>
                        <li class="menuItem"><a href="dairyAisle.php">Dairy Aisle</a></li>
                        <li class="menuItem"><a href="pantryAisle.php">Pantry</a></li>
                        <li class="menuItem"><a href="beverageAisle.php">Beverages</a></li>
                        <li class="menuItem"><a href="meatAisle.php">Meat & Poultry</a></li>
                        <li class="menuItem"><a href="snacksAisle.php">Snacks</a></li>
                        <li class="menuItem"><a href="mealsAisle.php">Prepared Meals</a></li>
                        <li class="menuItem"><a href="bakeryAisle.php">Bakery</a></li>
                        <li class="menuItem"><a href="frozenAisle.php">Frozen</a></li>
                    </ul>
                </table>
            </div>


            <div class="menu float-child" id="rightMenu">
                <h1 id="aisleTitle">Fruits & Veges</h1>
                <div class="grid-container">

                    <a href="../ProductDescription/apples.php">
                    <p><span class="item-name">Apples</span></p>
                        <div class="grid-item" style="background-image: url('../../images/apples.jpg');">
                            
                        </div>
                    </a>
                    <a href="../ProductDescription/oranges.php">
                    <p><span class="item-name">Oranges</span></p>
                        <div class="grid-item" style="background-image: url('../../images/oranges.jpg');">
                            
                        </div>
                    </a>
                    <a href="../ProductDescription/bananas.php">
                    <p><span class="item-name">Bananas</span></p>
                        <div class="grid-item" style="background-image: url('../../images/banana.jpg');">
                            
                        </div>
                    </a>
                    <a href="../ProductDescription/redgrapes.php">
                    <p><span class="item-name">Grapes</span></p>
                        <div class="grid-item" style="background-image: url('../../images/grapes.jpg');">
                            
                        </div>
                    </a>
                    <a href="../ProductDescription/tomatoes.php">
                    <p><span class="item-name">Tomatoes</span></p>
                        <div class="grid-item" style="background-image: url('../../images/tomatoes.jpg');">
                            
                        </div>
                    </a>
                    <a href="../ProductDescription/broccoli.php">
                    <p><span class="item-name">Broccoli</span></p>
                        <div class="grid-item" style="background-image: url('../../images/broccoli.jpg');">
                            
                        </div>
                    </a>
                    <a href="../ProductDescription/onions.php">
                     <p><span class="item-name">Onions</span></p>
                        <div class="grid-item" style="background-image: url('../../images/onion.jpg');">
                           
                        </div>
                    </a>
                    <a href="../ProductDescription/mushrooms.php">
                    <p><span class="item-name">Mushrooms</span></p>
                        <div class="grid-item" style="background-image: url('../../images/mushrooms.jpg');">
                            
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--End of landing page-->
    <!--Start of footer-->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-one">
                        <h3>FeedMeLife</h3>
                        <p>Where the products aren't the only things that are fresh!</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-two">
                        <h2>Promotions</h2>
                        <ul>
                            <li><a href="https://www.youtube.com/results?search_query=kool+and+the+gang+fresh">How fresh are our products?</a></li>
                            <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Want a chance for a $50 gift Card?</a></li>
                            <li><a href="http://www.nooooooooooooooo.com/">Low Quality products?</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-three">
                        <h2>Follow us</h2>
                        <p>We'd love to hear from you on our totally real social media pages!
                        </p>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg>
                        </a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg></a>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-four">
                        <h2>Contact Us</h2>
                        <form action="#">
                            <input type="email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p class="footer-bottom-text">All Rights Reserved by &copy;FeedMeLife, 2021.</p>
    </footer>
    <!--End of footer-->
    <script src="../../javascript/javascript.js"></script>
    <!--Script files for bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>