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
$productDB = simplexml_load_file("../../database/products.xml");

if (isset($_GET['deleteProduct'])){
    $value = $_GET['deleteProduct'];
    for($i = 0; $i < $productDB->count(); $i++){
        if ($productDB->product[$i]->id == $value){
            unset($productDB->product[$i]);
            break;
        }
    }
    file_put_contents("../../database/products.xml", $productDB->saveXML());
}

if(isset($_POST['productAdded'])){
    if(isset($_GET['editProduct'])){
        foreach ($productDB as $product) {
            if ($product->id == $_GET['editProduct']){
                $product->name=str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['itemName']));
                $product->price=$_POST['price'];
                $product->quantity=str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['quantity'])); //this is done to avoid having 2 &amp; in the xml file
                if (strcasecmp($_POST['sale'], 'Yes')==0){
                    $product->sale="true";
                    $product->saleprice=$_POST['saleprice'];
                }
                else{
                    $product->sale="false";
                    $product->saleprice=null;
                }
                $product->description=str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['description']));
                $product->category=str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['category']));
                $product->subcategory=str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['subcategory']));
            }
        }
    }
    else{
        //we need to add a unique ID to the product and we do that by looking at the last element's id and adding 1 to it
        $idNum = $productDB->product[$productDB->count()-1]->id+1;
        $product = $productDB->addChild('product');
        
        $id = $product->addChild('id',$idNum);
        $name = $product->addChild('name',str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['itemName'])));
        $image = $product->addChild('image','../../images/placeholder-images-image_large.webp'); //we can't do image uploads so we do this instead :(
        $price = $product->addChild('price',$_POST['price']);
        $quantity = $product->addChild('quantity',str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['quantity'])));
        $amount = $product->addChild('amount',0);
        if (strcasecmp($_POST['sale'], 'Yes')==0){
            $sale = $product->addChild('sale', 'true');
            $saleprice = $product->addChild('saleprice',$_POST['saleprice']);
        }
        else{
            $sale = $product->addChild('sale', 'true');
            $saleprice = $product->addChild('saleprice');
        }
        $description = $product->addChild('description',str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['description'])));
        $category = $product->addChild('category',str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['category'])));
        $subcategory = $product->addChild('subcategory',str_replace("&amp;&amp;","&amp;",htmlspecialchars($_POST['subcategory'])));
    }
    //Format XML to save indented tree rather than one line
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($productDB->asXML());
        $dom->save('../../database/products.xml');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Product List</title>
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
                        <th scope="col">Item</th>
                        <th scope="col">Id</th>
                        <th scope="col">Isle</th>
                        <th scope="cal">Sub Category</th>
                        <th scope="col">Qty.</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sale</th>
                        <th scope="col">Sale Price</th>
			            <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
						<td></td>
                        <td></td>
                        <td></td>
                        <td style="width: 10%;"><a class="btn btn-info" href="editProduct.php" role="button">+Item</a></td>
                    </tr>
                    
                    <?php
                        foreach($productDB as $product){
                            print("<tr>");
                            print("<th scope=\"row\">".$product->name."</th>");
                            print("<td>".$product->id."</td>");
                            print("<td>".$product->category."</td>");
                            print("<td>".$product->subcategory."</td>");
                            print("<td>".$product->quantity."</td>");
                            print("<td>$".$product->price."</td>");
                            if($product->sale == "true"){print("<td>Yes</td>");}
                            else{print("<td>No</td>");}
                            if(empty($product->saleprice)){
                                print("<td></td>");
                            }
                            else{
                                print("<td>$".$product->saleprice."</td>");
                            }
                            print("<td style=\"width: 10%;\"><a class=\"btn btn-danger\" href=\"ProductList.php?deleteProduct=".$product->id."\" role=\"button\" value=\"delete-row\" onclick=\"return confirm('Are you sure you want to delete this item?');\"> Delete</a></td>");
                            print("<td style=\"width: 10%;\"><a class=\"btn btn-info\" href=\"editProduct.php?id=".$product->id."\" role=\"button\"> Edit</a></td>");
                            print("</tr>");

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
