<!-- <?php


           $cart = file_get_contents('../database/products.xml');
             $cart2 = simplexml_load_string($cart);
            $object = json_encode($cart2);
            $final = json_decode($object,true)['product'];

        session_start();

        $_SESSION['cart'] = $final;
       
    
 
    ?> -->

<!-- <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
        </head>
        <body>
          <?php print_r($_SESSION['cart']); ?>
        </body>
        </html> -->