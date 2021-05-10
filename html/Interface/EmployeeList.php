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
    <title>Employee List</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/backStore.css">
    <link rel="stylesheet" href="../../css/userBackstore.css">
</head>
<body>
<?php include("../../php/backStoreNavSide.php") ?>

    <div class="content">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">e-mail</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th ></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td colspan="6" style="width: 10%;"><a class="btn btn-info" href="editEmployee.html" role="button">+Employee</a></td>
                </tr>
                <tr>
                    <th scope="row">14995</th>
                    <td>James Jamieson</td>
                    <td>jamesjamieson@gmail.com</td>
                    <td style="width: 10%;"><a class="btn delete-btn" href="#" role="button" value="delete-row" onclick="deleteRow(this)">Delete</a></td>
                    <td style="width: 10%;"><a class="btn btn-info" href="editEmployee.html" role="button">Edit</a></td>
                </tr>
                <tr>
                    <th scope="row">13425</th>
                    <td>Jon Arbuckle</td>
                    <td>jonarbuckle@gmail.com</td>
                    <td style="width: 10%;"><a class="btn delete-btn" href="#" role="button" value="delete-row" onclick="deleteRow(this)">Delete</a></td>
                    <td style="width: 10%;"><a class="btn btn-info" href="editEmployee.html" role="button">Edit</a></td>
                </tr>
                <tr>
                    <th scope="row">16778</th>
                    <td>Jane Doe</td>
                    <td>janedoe@gmail.com</td>
                    <td style="width: 10%;"><a class="btn delete-btn" href="#" role="button" value="delete-row" onclick="deleteRow(this)">Delete</a></td>
                    <td style="width: 10%;"><a class="btn btn-info" href="editEmployee.html" role="button">Edit</a></td>
                </tr>
            </tbody>
        </table>
        </table>
    </div>

    <script src="../../javascript/backstore-functions.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>


</html>
