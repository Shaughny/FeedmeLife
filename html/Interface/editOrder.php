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
        <title>Edit Order</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/backStore.css">
    </head>
    <body>
    <?php include("../../php/backStoreNavSide.php") ?>
        <div class="content">
            <h4>Add/Edit Order</h4>
            <div class="contain">
                <form id="editOrder">
                    <br><br>
                    <label for="firstName">Client:</label>
                    <input required type="text" class="form-control" placeholder="Client Name" name="clientName" id="clientName" style="Width: 250px;"
                            <?php 
                                if(isset($_GET['number'])) {
                                    $orderDB = simplexml_load_file("../../database/orders.xml");
                                    foreach($orderDB as $order){
                                        if ($order->number == $_GET['number']){
                                            print("value=\"".$order->client."\"");
                                        }
                                    }
                                }
                            ?>
                    >

                    <h5><br><br>Items in the order: </h5>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Isle</th>
                                <th scope="col">Sub-Category</th>
                                <th scope="col"style="width: 10%;" >Item</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col" style="width: 10%;">Qty.</th>
                                <th scope="col"style="width: 20%;">Delete Item</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $orderDB = simplexml_load_file("../../database/orders.xml");
                            foreach($orderDB as $order) {
                                foreach($order as $items) {
                                    foreach($items as $product) {
                                if ($order->number == $_GET['number']){
                                    echo("<td>".$product->category."</td>");
                                    echo("<td>".$product->subcategory."</td>");
                                    echo("<td>".$product->name."</td>");
                                    echo("<td>".$product->price."</td>");
                                    echo("<td>".$product->amount."</td>");
                                    echo("<td style=\"width: 10%;\"><a class=\"btn btn-danger\" href=\"orderList.php?deleteOrder=".$order->number."\" role=\"button\" value=\"delete-row\" onclick=\"return confirm('Are you sure you want to delete this item?');\"> Delete</a></td>");
                                    
                                    echo("</tr>");
                                        } 
                                    }   
                                }
                            }
                            ?>
                        </tbody>

                    </table>
                    
                    <h6> 
                    <?php
                    foreach($orderDB as $order) {
                        if ($order->number == $_GET['number']){
                            echo("<td> Order Total: ".$order->total."</td>");
                        }
                    }
                    ?>
                    </h6>

                    <div class="form-row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-info mb-2">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <script src="../../javascript/backstore-functions.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
