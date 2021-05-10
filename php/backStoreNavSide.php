<?php
$current_file_name = basename($_SERVER['PHP_SELF']);
?>

<!-- Navbar Start -->
        
        <div class="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_file_name=='ProductList.php'||$current_file_name=='editProduct.php'){echo'active';}?>" href="ProductList.php">Product List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_file_name=='userList.php'||$current_file_name=='editUser.php'){echo'active';}?>" href="userList.php">User List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_file_name=='orderList.php'||$current_file_name=='editOrder.php'){echo'active';}?>" href="orderList.php">Order List</a>
                </li>
            </ul>
        </div>
        <!--Navbar end-->
        <div class="logo">
            <a href="../../index.php" class="navbar-brand">FeedMeLife</a>
			<a href="ProductList.php" class="navbar-brand">Backstore</a>
			<a href="loginPage.php?logOut=true" class="navbar-brand">Sign Out</a>
            <a class="navbar-brand" style="float: right;">Welcome Back, <?php echo($_COOKIE['firstName']." ".$_COOKIE['lastName']);?></a>
            

        </div>