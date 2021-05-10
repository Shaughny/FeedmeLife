<?php



    function updateCart($id,$quantity){

        $_SESSION['cart'][$id]['amount'] = $quantity;


    }

    function removeCart($id){

    $_SESSION['cart'][$id]['amount'] = 0;

    }


    function addDeal($id){
        $_SESSION['cart'][$id]['amount'] = $_SESSION['cart'][$id]['amount'] + 1;
    }
?>
