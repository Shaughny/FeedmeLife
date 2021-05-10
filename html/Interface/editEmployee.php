<?php
if (!isset($_COOKIE['role'])||$_COOKIE['role']!='admin'){ //This is the thing you need to do to check if someone is an admin
    http_response_code(403);
    die('Error 403: Access denied');
}
else{
    setcookie("firstName", $_COOKIE['firstName'], time()+3600); //refresh cookies so that they dont get logged off in an hour
    setcookie("lastName", $_COOKIE['lastName'], time()+3600);   
    setcookie("role", "admin", time()+3600);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add/Edit Employee</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/userBackstore.css">
        <link rel="stylesheet" href="../../css/backStore.css">
    </head>
    <body>
    <?php include("../../php/backStoreNavSide.php") ?>
        <div class="content"><h4>Add/Edit Employee</h4>
            <div class="contain" style="margin: 1in;">
                <form action="employeeList.html" method="POST" style="padding-left:2rem;padding-right:2rem;">
                    <div class="row g-1">

                        <div class="col px-md-3"><h1>Login & Security</h1>
                            <label for="usrnum"><h2>Employee ID:</h2></label>
                            <input type="number" class="form-control" id="employeeID">
                        </div>
                        <div class="col px-md-3"><h1>Address</h1>
                            <label for="addr1"><h2>Address Line 1:</h2></label>
                            <input type="text" class="form-control" id="addr1">
                        </div>
                        <div class="col px-md-3"><h1>Information</h1>
                            <label for="cardname"><h2>Transit Number:</h2></label>
                            <input type="text" class="form-control" id="transitNum">
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col px-md-3">
                            <label for="usrname"><h2>Name:</h2></label>
                            <input type="text" class="form-control" id="usrname">
                        </div>
                        <div class="col px-md-3">
                            <label for="addr2"><h2>Address Line 2:</h2></label>
                            <input type="text" class="form-control" id="addr2">
                        </div>
                        <div class="col px-md-3">
                            <label for="cardnum"><h2>Position:</h2></label>
                            <input type="number" class="form-control" id="position">
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col px-md-3">
                            <label for="usremail"><h2>Email Address:</h2></label>
                            <input type="email" class="form-control" id="usremail">
                        </div>
                        <div class="col px-md-3">
                            <label for="town"><h2>Town/City:</h2></label>
                            <input type="text" class="form-control" id="town">
                        </div>
                        <div class="col px-md-3">
                            <label for="exp"><h2>Date of Birth:</h2></label>
                            <input type="day" class="form-control" placeholder="DD/MM/YYYY" id="birth">
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col px-md-3">
                            <label for="pass"><h2>Password:</h2></label>
                            <input type="text" class="form-control" id="pass">
                        </div>
                        <div class="col px-md-3">
                            <label for="postal"><h2>Postal Code:</h2></label>
                            <input type="text" class="form-control" id="postal">
                        </div>
                        <div class="col px-md-3">
                            <label for="cvv"><h2>SSN:</h2></label>
                            <input type="number" class="form-control"  id="ssn">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col px-md-3 auto" style="margin-top: 2.5rem;">
                            <button type="submit" class="btn btn-info mb-2 mx-auto" style="display:block">Save Changes</button>
                        </div>
                    </div>
                </form>
        </div>