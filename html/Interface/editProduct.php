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
        <title><?php if(isset($_GET['id'])) print("Edit Product");
                else print("Add Product");?></title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/backStore.css">
    </head>
    <body>
    <?php include("../../php/backStoreNavSide.php") ?>
        <div class="content">
            <h4><?php if(isset($_GET['id'])) print("Edit Product");
                else print("Add Product");?></h4>
            <div class="image">
                <img src="
                <?php
                if(isset($_GET['id'])){
                    $productDB = simplexml_load_file("../../database/products.xml");
                    foreach($productDB as $product){
                        if ($product->id == $_GET['id']){
                            print($product->image);
                        }
                    }
                }
                else print("../../images/placeholder-images-image_large.webp");
                ?>
                " width="30%" height="30%"class="center">
                <br>
            </div>
            <div class="contain" style="text-align: center; margin-bottom: 2rem; margin-top: 2rem;">
                <form>
                    <div class="form-group">
                      <label for="exampleFormControlFile1"></label>
                      <input type="file" class="form-control-file btn btn-info mb-2" id="exampleFormControlFile1">
                    </div>
                  </form>
            </div>
            <div class="contain">
                <div class="row g-1">
                    <div class ="col-3">
                        <h5>Item Name</h5>
                    </div>
                    <div class="col-2">
                    <h5>Category</h5>
                    </div>
                    <div class="col-1">
                    <h5>Qty.</h5>
                    </div>
                    <div class="col">
                    <h5>Price</h5>
                    </div>
                    <div class="col">
                    <h5>Sale</h5>
                    </div>
                    <div class="col">
                    <h5>Sale Price</h5>
                    </div>
                    <div class="col">
                    <h5>Sub Category</h5>
                    </div>
                </div>
                <form action="ProductList.php<?php if(isset($_GET['id'])) print("?editProduct=".$_GET['id'])?>" method="POST" name="productForm">
                    <div class="row g-1">
                        <div class="col-3">
                            <input required type="text" class="form-control" placeholder="Item" name="itemName" id="itemName"
                            <?php 
                                if(isset($_GET['id'])) {
                                    $productDB = simplexml_load_file("../../database/products.xml");
                                    foreach($productDB as $product){
                                        if ($product->id == $_GET['id']){
                                            print("value=\"".$product->name."\"");
                                        }
                                    }
                                }
                            ?>
                            >
                        </div>
                        <div class="col-2">
                            <select required class="form-control" onChange="updateCategory(this.selectedIndex)" name="category">
                                <option>Choose Isle...</option>
                                <?php
                                $category = simplexml_load_file("../../database/categories.xml");
                                if(isset($_GET['id'])){
                                    $productDB = simplexml_load_file("../../database/products.xml");
                                    foreach($productDB as $product){
                                        if ($product->id == $_GET['id']){
                                            $place = $product->category;
                                        }
                                    }
                                    foreach($category as $isle){
                                        if (strcasecmp($isle['name'], $place)==0){ // if category name is the same as the product category, select it
                                            print("<option selected>".$isle['name']."</option>");
                                        }
                                        else print("<option>".$isle['name']."</option>");
                                    }
                                } 
                                else{
                                    foreach($category as $isle){
                                        print("<option>".$isle['name']."</option>");
                                    }
                                }
                                
                                ?>
                            </select>
                        </div>
                        <div class="col-1">
                            <input type="text" class="form-control" id="quantity" placeholder="Qty." name="quantity"
                            <?php 
                                if(isset($_GET['id'])) {
                                    $productDB = simplexml_load_file("../../database/products.xml");
                                    foreach($productDB as $product){
                                        if ($product->id == $_GET['id']){
                                            print("value=\"".$product->quantity."\"");
                                        }
                                    }
                                }
                            ?>
                            >
                        </div>
                        <div class="col">
                            <input required type="number" step="0.01" class="form-control" placeholder="Price" name="price"
                            <?php 
                                if(isset($_GET['id'])) {
                                    $productDB = simplexml_load_file("../../database/products.xml");
                                    foreach($productDB as $product){
                                        if ($product->id == $_GET['id']){
                                            print("value=\"".$product->price."\"");
                                        }
                                    }
                                }
                            ?>
                            >
                        </div>
                        <div class="col">
                            <select required name="sale" onChange="saleEnable(this.selectedIndex)" class="form-control">
                                <option>Sale...</option>
                                <?php
                                if(isset($_GET['id'])){
                                    $productDB = simplexml_load_file("../../database/products.xml");
                                    foreach($productDB as $product){
                                        if ($product->id == $_GET['id']){
                                            if(strcasecmp($product->sale,"true")==0){
                                                print("<option selected>Yes</option>
                                                <option>No</option>");
                                            }
                                            else print("<option>Yes</option>
                                            <option selected>No</option>");
                                        }
                                    }
                                }
                                else print("<option>Yes</option>\n<option>No</option>");
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <input <?php 
                            if(isset($_GET['id'])){
                                $productDB = simplexml_load_file("../../database/products.xml");
                                    foreach($productDB as $product){
                                        if ($product->id == $_GET['id']){
                                            if(strcasecmp($product->sale,"true")==0){ //enable or disable the saleprice input
                                                print("required");
                                        }
                                        else print("disabled");
                                    }
                                }
                            }
                            ?> type="number" step="0.01" class="form-control" name="saleprice" placeholder="Sale Price"
                            <?php
                            if(isset($_GET['id'])) {
                                $productDB = simplexml_load_file("../../database/products.xml");
                                foreach($productDB as $product){
                                    if ($product->id == $_GET['id']){
                                        if(!empty($product->saleprice)){
                                            print("value=\"".$product->saleprice."\"");
                                        }
                                    }
                                }
                            }
                            ?>
                            >
                        </div>
                        <div class="col">
                            <select required class="form-control" id="subcategory" name="subcategory"><?php
                                    $category = simplexml_load_file("../../database/categories.xml");
                                    if(isset($_GET['id'])){
                                        $productDB = simplexml_load_file("../../database/products.xml");
                                        foreach($productDB as $product){
                                            if ($product->id == $_GET['id']){
                                                $place = $product->category;
                                                $subplace = $product->subcategory;
                                            }
                                        }
                                        foreach($category as $isle){
                                            if (strcasecmp($isle['name'], $place)==0){
                                                foreach($isle as $sub){
                                                    if(strcasecmp($sub,$subplace)==0){
                                                        print("<option selected>".$sub."</option>");
                                                    }
                                                    else print("<option>".$sub."</option>");
                                                } 
                                            }
                                        }
                                    }
                                    else{
                                        print("<option>Enter a category...</option>");
                                    }
                                    
                                ?></select>
                        </div>
                    </div>
                    <div class="row g-1">
                        <textarea required class="form-control" rows="3" placeholder="Enter product description here" name="description"><?php
                        if(isset($_GET['id'])) {
                            $productDB = simplexml_load_file("../../database/products.xml");
                            foreach($productDB as $product){
                                if ($product->id == $_GET['id']){
                                    if(!empty($product->description)){
                                        print($product->description);
                                    }
                                }
                            }
                        }?></textarea>
                    </div>
                    <div class="form-row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-info mb-2" name="productAdded">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    <script src="../../javascript/backstore-functions.js"></script>
    <script type="text/javascript">
    
    var categoryList = document.productForm.category;
    var subcategoryList = document.productForm.subcategory;

    var subcategory = new Array();
    subcategory[0]=["Select a category first"];
    subcategory[1]=["Fruits","Vegetables"];
    subcategory[2]=["Milk, Cream & Butter","Eggs & Yogurt","Cheese & Dips","Desserts"];
    subcategory[3]=["Cereal","Oils & vinegar","World cuisine","Pasta & rice"];
    subcategory[4]=["Coffee","Hot Drinks","Juices","Soft Drinks"];
    subcategory[5]=["Pork","Chicken","Beef","Fish & Seafood"];
    subcategory[6]=["Salty snacks","Sweets"];
    subcategory[7]=["Deli meals","Dips & Pates","Ready meals"];
    subcategory[8]=["Freshly Baked Bread","Buns & Rolls","Tortillas & flat breads","Muffins, bagels & baked goods"];
    subcategory[9]=["Beverages & Ice","Fish & Seafood","Pizza & pasta","Frozen vegetables"]

    function updateCategory(selectedCategoryIndex){
    subcategoryList.length=0;
    for(var i= 0; i <subcategory[selectedCategoryIndex].length; i++){
    subcategoryList.options[subcategoryList.options.length]=new Option(subcategory[selectedCategoryIndex][i])
    }
    }

    var saleList = document.productForm.sale;
    var salePrice = document.productForm.saleprice;

    function saleEnable(index){
        if(index!=1){
            salePrice.disabled=true;
            salePrice.required=false;
        }
        else{
            salePrice.disabled=false;
            salePrice.required=true;
        }
    }

    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>