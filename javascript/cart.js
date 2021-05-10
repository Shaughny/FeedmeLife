

let cartProducts = [];
cartJSON = JSON.stringify(cartData);
cartObject = JSON.parse(cartJSON);

for(let i =0;i<cartObject.length;i++){
    if(cartObject[i]['amount']>0){
       renderCart(cartObject[i]);
    }
    if(toString(cartObject[i]['sale'])  === "true"){
        renderDeals(cartObject[i]);
    }
}
updateTotalPrice();

// if (getProducts().length > 0) {

//     updateSummary();
// }
// else {
//     updateProducts();
//     updateTotalPrice();
//     updateCartItems();
// }



goBack.addEventListener("click", () => {
    window.location.href = "https://feedmelife.herokuapp.com/index.php";
});

placeOrder.addEventListener("click", () => {
   
    window.confirm("Thanks for ordering \n \tStay Fresh!");

})

for (let i = 0; i < cartDelete.length; i++) {
    let btn = cartDelete[i];
    btn.addEventListener("click", (e) => {
        selectedButton = e.target;
        selectedButton.parentElement.parentElement.nextElementSibling.remove();
        selectedButton.parentElement.parentElement.remove();
         updateTotalPrice();
        // updateCartItems();
        // updateProducts();
        // for(let i =0;i<cartObject.length;i++){
        //     if(cartObject[i]['amount']>0){
        //        renderCart(cartObject[i]);
        //     }
        // }
    })
}

// for (let i = 0; i < quantitySubmit.length; i++) {
//     let btn = quantitySubmit[i];
//     btn.addEventListener("click", (e) => {
//         selectedButton = e.target;
//         let qty = parseInt(selectedButton.parentElement.getElementsByClassName("item-quantity-input")[0].value);
//         updateTotalPrice();
//         updateCartItems();
//         updateProducts();
//     })
// }

var incrementButton = document.getElementsByClassName('inc');
var decrementButton = document.getElementsByClassName('dec');

for (var i = 0; i < incrementButton.length; i++) {
    var button = incrementButton[i];
    button.addEventListener('click', function (event) {
        var buttonClicked = event.target;
        
        var input = buttonClicked.parentElement.children[1];
        
        var inputValue = input.value;
        
        var newValue = parseInt(inputValue) + 1;
        
        input.value = newValue;
    })
}

for (var i = 0; i < decrementButton.length; i++) {
    var button = decrementButton[i];
    button.addEventListener('click',function(event){
        var buttonClicked = event.target;
        var input = buttonClicked.parentElement.children[1];
        
        var inputValue = input.value;
        
        var newValue = parseInt(inputValue) - 1;
        
        if (newValue >= 0) {
            input.value = newValue;
        }
     
    })

}





