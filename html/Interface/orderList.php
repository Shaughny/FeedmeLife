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

$orderDB = simplexml_load_file("../../database/orders.xml");

if (isset($_GET['deleteOrder'])){
    $value = $_GET['deleteOrder'];
    for($i = 0; $i < $orderDB->count(); $i++){
        if ($orderDB->order[$i]->number == $value){
            unset($orderDB->order[$i]);
            break;
        }
    }
    file_put_contents("../../database/orders.xml", $orderDB->saveXML());
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Order List</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/backStore.css">
    </head>
    <body>
    <?php include("../../php/backStoreNavSide.php") ?>

        <div class="content">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Order #</th>
                        <th scope="col">Client</th>
                        <th scope="col">nb. of items</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delete Order</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $orderDB = simplexml_load_file("../../database/orders.xml");
                foreach($orderDB as $order){
                    $itemCount= 0;
                    foreach($order->items->product as $product){
                        $itemCount+=(int)$product->amount;
                    }
                    echo('<tr>');
                    echo("<th scope=\"row\">".$order->number."</th>");
                    echo("<td>".$order->client."</td>");
                    echo("<td>".$itemCount."</td>");
                    echo("<td>".$order->total."</td>");
                    echo("<td style=\"width: 10%;\"><a class=\"btn btn-danger\" href=\"orderList.php?deleteOrder=".$order->number."\" role=\"button\" value=\"delete-row\" onclick=\"return confirm('Are you sure you want to delete this item?');\"> Delete</a></td>");
                    echo("<td style=\"width: 10%;\"><a class=\"btn btn-info\" href=\"editOrder.php?number=".$order->number."\" role=\"button\"> Edit</a></td>");
                    echo("</tr>");
                }
                ?>
                    
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
