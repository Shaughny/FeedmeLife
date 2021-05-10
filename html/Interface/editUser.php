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

$userDB = simplexml_load_file("../../database/users.xml");

$edit = isset($_GET['email']); //check if editing or not

$email = "";
$password = "";
$firstName = "";
$lastName = "";
$zip = "";
$address1 = "";
$address2 = "";
$city = "";
$cardName = "";
$cardNum = "";
$expDate = "";
$cvv = "";
$role = "client";

$index = 0; //to know at which index in xml file we are

$isEmailTaken = false;


//extract user info if editing user
if($edit){
    foreach($userDB as $user){
        if($user->email == $_GET['email']){
            $email = $user->email;
            $password = $user->password;
            $firstName = $user->firstName;
            $lastName = $user->lastName;
            $zip = $user->zip;
            $address1 = $user->address1;
            $address2 = $user->address2;
            $city = $user->city;
            $cardName = $user->cardName;
            $cardNum = $user->cardNum;
            $expDate = $user->expDate;
            $cvv = $user->cvv;
            $role = $user->role;

            break;
        }
        $index += 1;
    }
}

//edit/add user

if (isset($_POST['submit'])){
    $email = $_POST['email'];         
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $zip = $_POST['zip'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $cardName = $_POST['cardName'];
    $cardNum = $_POST['cardNum'];
    $expDate = $_POST['expDate'];
    $cvv = $_POST['cvv'];

    if(isset($_POST['role'])){
        $role = 'admin';
    }
    else{
        $role = 'client';
    }

    //check if email is already taken
    foreach($userDB as $user){
        if($user->email == $email && $email!=$_GET['email']){
            $isEmailTaken = true;
        }
    }
    
    if(!$isEmailTaken){
        //edit
        if($edit){
            $userDB->user[$index]->firstName = $firstName;
            $userDB->user[$index]->lastName = $lastName;
            $userDB->user[$index]->email = $email;
            $userDB->user[$index]->password = $password;
            $userDB->user[$index]->role = $role;
            $userDB->user[$index]->address1 = $address1;
            $userDB->user[$index]->address2 = $address2;
            $userDB->user[$index]->city = $city;
            $userDB->user[$index]->zip = $zip;
            $userDB->user[$index]->cardName = $cardName;
            $userDB->user[$index]->cardNum = $cardNum;
            $userDB->user[$index]->expDate = $expDate;
            $userDB->user[$index]->cvv = $cvv;

            $userDB->asXML('../../database/users.xml');
        }
        //add user 
        else{

                //input data into xml file
                $xmldoc = new DomDocument( '1.0' );
                $xmldoc->preserveWhiteSpace = false;
                $xmldoc->formatOutput = true;
                if($xmlNew = file_get_contents( '../../database/users.xml')) {
                    $xmldoc->loadXML( $xmlNew, LIBXML_NOBLANKS );
                
                    // find the headercontent tag
                    $root = $xmldoc->getElementsByTagName('root')->item(0);
                
                    // create the <user> tag
                    $user = $xmldoc->createElement('user');
                    //$numAttribute = $xmldoc->createAttribute("num");
                    //$numAttribute->value = $userNum;
                    //$user->appendChild($numAttribute);
                
                    // add the user tag before the first element in the <headercontent> tag
                    $root->insertBefore( $user, $root->firstChild );
                
                    // create other elements and add it to the <user> tag.
                    $firstNameElement = $xmldoc->createElement('firstName');
                    $user->appendChild($firstNameElement);
                    $firstNameText = $xmldoc->createTextNode($firstName);
                    $firstNameElement->appendChild($firstNameText);
                
                    $lastNameElement = $xmldoc->createElement('lastName');
                    $user->appendChild($lastNameElement);
                    $lastNameText = $xmldoc->createTextNode($lastName);
                    $lastNameElement->appendChild($lastNameText);
                
                    $emailElement = $xmldoc->createElement('email');
                    $user->appendChild($emailElement);
                    $emailText = $xmldoc->createTextNode($email);
                    $emailElement->appendChild($emailText);
                
                    $passwordElement = $xmldoc->createElement('password');
                    $user->appendChild($passwordElement);
                    $passwordText = $xmldoc->createTextNode(md5($password));
                    $passwordElement->appendChild($passwordText);
                
                    $roleElement = $xmldoc->createElement('role');
                    $user->appendChild($roleElement);
                    $roleText = $xmldoc->createTextNode('client');
                    $roleElement->appendChild($roleText);
                
                    $address1Element = $xmldoc->createElement('address1');
                    $user->appendChild($address1Element);
                    $address1Text = $xmldoc->createTextNode('');
                    $address1Element->appendChild($address1Text);

                    $address2Element = $xmldoc->createElement('address2');
                    $user->appendChild($address2Element);
                    $address2Text = $xmldoc->createTextNode('');
                    $address2Element->appendChild($address2Text);
                
                    $cityElement = $xmldoc->createElement('city');
                    $user->appendChild($cityElement);
                    $cityText = $xmldoc->createTextNode('');
                    $cityElement->appendChild($cityText);
                
                    $zipElement = $xmldoc->createElement('zip');
                    $user->appendChild($zipElement);
                    $zipText = $xmldoc->createTextNode($zip);
                    $zipElement->appendChild($zipText);
                
                    $cityElement = $xmldoc->createElement('city');
                    $user->appendChild($cityElement);
                    $cityText = $xmldoc->createTextNode('');
                    $cityElement->appendChild($cityText);
                
                    $cardNameElement = $xmldoc->createElement('cardName');
                    $user->appendChild($cardNameElement);
                    $cardNameText = $xmldoc->createTextNode('');
                    $cardNameElement->appendChild($cardNameText);
                
                    $cardNumElement = $xmldoc->createElement('cardNum');
                    $user->appendChild($cardNumElement);
                    $cardNumText = $xmldoc->createTextNode('');
                    $cardNumElement->appendChild($cardNumText);
                
                    $expDateElement = $xmldoc->createElement('expDate');
                    $user->appendChild($expDateElement);
                    $expDateText = $xmldoc->createTextNode('');
                    $expDateElement->appendChild($expDateText);
                
                    $cvvElement = $xmldoc->createElement('cvv');
                    $user->appendChild($cvvElement);
                    $cvvText = $xmldoc->createTextNode('');
                    $cvvElement->appendChild($cvvText);


                    $xmldoc->save('../../database/users.xml');
                
                }
        }

        header('Location: userList.php');
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
    <title><?php if($edit) print("Edit User");
                else print("Add User");?></title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/userBackstore.css">
        <link rel="stylesheet" href="../../css/backStore.css">
    </head>
    <body>
    <?php include("../../php/backStoreNavSide.php") ?>
        <div class="content"><h4><?php if($edit) print("Edit User");
                else print("Add User");?></title></h4>
            <div class="contain" style="margin: 1in;">

            <?php
                if($isEmailTaken){
                    echo '<ul style = "padding-left:2rem;"><li style = "color: red;">Email is already taken</li></ul>';
                }
            ?>

                <form method="POST" action ="" style="padding-left:2rem;padding-right:2rem;">
                    <div class="row g-1">

                        <div class="col px-md-3"><h1>Login & Security</h1>
                            <label for="usrnum"><h2>First name:</h2></label>
                            <input type="text" class="form-control" id="firstName" name="firstName" <?php
                                print("value= '$firstName'")
                            ?>>
                        </div>
                        <div class="col px-md-3"><h1>Address</h1>
                            <label for="addr1"><h2>Address Line 1:</h2></label>
                            <input type="text" class="form-control" id="address1" name="address1" <?php
                                print("value= '$address1'")
                            ?>>
                        </div>
                        <div class="col px-md-3"><h1>Payment Method</h1>
                            <label for="cardname"><h2>Name on Card:</h2></label>
                            <input type="text" class="form-control" id="cardName" name="cardName" <?php
                                print("value= '$cardName'")
                            ?>>
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col px-md-3">
                            <label for="usrname"><h2>Last name:</h2></label>
                            <input type="text" class="form-control" id="lastName" name="lastName" <?php
                                print("value= '$lastName'")
                            ?>>
                        </div>
                        <div class="col px-md-3">
                            <label for="addr2"><h2>Address Line 2:</h2></label>
                            <input type="text" class="form-control" id="address2" name="address2" <?php
                                print("value= '$address2'")
                            ?>>
                        </div>
                        <div class="col px-md-3">
                            <label for="cardnum"><h2>Card Number:</h2></label>
                            <input type="number" class="form-control" id="cardNum" name="cardNum" <?php
                                print("value= '$cardName'")
                            ?>>
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col px-md-3">
                            <label for="usremail"><h2>Email Address:</h2></label>
                            <input type="email" class="form-control" id="email" name="email" <?php
                                print("value= '$email'")
                            ?>>
                        </div>
                        <div class="col px-md-3">
                            <label for="town"><h2>Town/City:</h2></label>
                            <input type="text" class="form-control" id="city" name="city" <?php
                                print("value= '$city'")
                            ?>>
                        </div>
                        <div class="col px-md-3">
                            <label for="exp"><h2>Expiration date:</h2></label>
                            <input type="text" class="form-control" id="expDate" name="expDate" <?php
                                print("value= '$expDate'")
                            ?>>
                        </div>
                    </div>
                    <div class="row g-1">
                        <div class="col px-md-3">
                            <label for="pass"><h2>Password:</h2></label>
                            <input type="text" class="form-control" id="password" name="password" <?php
                                print("value= '$password'")
                            ?>>
                        </div>
                        <div class="col px-md-3">
                            <label for="postal"><h2>Zip Code:</h2></label>
                            <input type="text" class="form-control" id="zip" name="zip" <?php
                                print("value= '$zip'")
                            ?>>
                        </div>
                        <div class="col px-md-3">
                            <label for="cvv"><h2>CVV:</h2></label>
                            <input type="number" max="999" class="form-control"  id="cvv" name="cvv" <?php
                                print("value= '$cvv'")
                            ?>>
                        </div>
                    </div>

                    <div class="form-check" style = "padding-left:2rem;">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="role" <?php 
                            if($role == "admin"){
                                echo(" checked");
                            }
                        ?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Make Admin
                        </label>
                    </div>

                    <div class="form-row">
                        <div class="col px-md-3 auto" style="margin-top: 2.5rem;">
                            <button type="submit" class="btn btn-info mb-2 mx-auto" style="display:block" name="submit">Save Changes</button>
                        </div>
                    </div>
                </form>
        </div>