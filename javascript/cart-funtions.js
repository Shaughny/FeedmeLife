let goBack = document.getElementById("back");
let cartDelete = document.getElementsByClassName("item-delete");
let quantitySubmit = document.getElementsByClassName("quantity-save");
let cart = document.getElementsByClassName("cart-items")[0];
let items = cart.getElementsByClassName("cart-row");
let placeOrder = document.getElementById("order");
let sales = document.getElementById('sales');
//dynamically create the html template for each product in the cart
function renderCart(p){
    //outer row
    let row = document.createElement('div');
    row.className = "cart-row";

    //the left section with the name and product image
    let imgPart = document.createElement('div');

    imgPart.classList.add("item-product","cart-column");
    let productImg = document.createElement('img');
    let productName = document.createElement('span');
    productImg.className = "item-image";
    productImg.width = "100";
    productImg.height = "100";
    productImg.src =p['image'];
    productName.className = "item-title";
    productName.innerHTML = p["name"];
    imgPart.appendChild(productImg);
    imgPart.appendChild(productName);
    row.appendChild(imgPart);

    //the price section
    let productPrice = document.createElement('span');

    productPrice.classList.add('item-price','cart-column');

    if(p['sale'] == "false"){
        productPrice.innerHTML = '$'+(p['price']*p['amount']).toFixed(2);
    }
    else{
        productPrice.innerHTML = "$" +(p['saleprice']*p['amount']).toFixed(2);
    }
    row.appendChild(productPrice);

    //the buttons
    let qtyPart = document.createElement('div');

    qtyPart.classList.add('item-quantity','cart-column');
    let saveForm = document.createElement('form');
    // let col1 = document.createElement('div');
    // let col2 = document.createElement('div');
    // let col3 = document.createElement('div');
    let btnDec = document.createElement('div');
    let IdDelete = document.createElement('input');
    let numInput = document.createElement('input');
    let btnInc = document.createElement('div');
    let btnSave = document.createElement('button');
    let deleteForm = document.createElement('form');
    let idInput = document.createElement('input');
    let btnDelete = document.createElement('button');
    saveForm.method = "post";
    saveForm.classList.add("save-form");
    // col1.classList.add('qty-column');
    // col2.classList.add('qty-column');
    // col3.classList.add('qty-column');
    btnDec.classList.add('dec','button');
    btnDec.innerHTML = '-';
    numInput.type = "number";
    numInput.className = "item-quantity-input";
    numInput.value = p['amount'];
    numInput.min = "1";
    numInput.name = "qty";
    IdDelete.value = p['id']-1;
    IdDelete.type = 'hidden';
    IdDelete.name = "idDelete";
    btnInc.classList.add("inc","button");
    btnInc.innerHTML = "+";
    btnSave.className = "quantity-save";
    btnSave.type = "submit";
    btnSave.innerHTML = "Save";
    deleteForm.method = "post";
    idInput.value = p['id'] - 1;
    idInput.type='hidden';
    idInput.name = "id";
    btnDelete.className = "item-delete";
    btnDelete.type = "submit";
    btnDelete.innerHTML = "Delete";
    // col1.appendChild(btnDec);
    // col2.appendChild(numInput);
    // col3.appendChild(btnInc);

    
    
    saveForm.appendChild(btnDec);
    
    saveForm.appendChild(numInput);
    saveForm.appendChild(btnInc);
    
    saveForm.appendChild(btnSave);
    saveForm.appendChild(IdDelete);
    qtyPart.appendChild(saveForm);
    deleteForm.appendChild(idInput);
    deleteForm.appendChild(btnDelete);
    qtyPart.appendChild(deleteForm);
    row.appendChild(qtyPart);
   
    let Divider = document.createElement('div');
    let seperate = document.createElement('hr');
    Divider.appendChild(seperate);


    cart.appendChild(row);
    cart.appendChild(Divider);

}

function renderDeals(p){
    let saleItem = document.createElement('div');
    saleItem.classList.add("sale-item");
    let saleForm = document.createElement('form');
    saleForm.method = 'post';

    

    let productName = document.createElement('h5');
    let priceTitle = document.createElement('span');
    let oldPrice = document.createElement('span');
    let newPrice = document.createElement('span');
    let dealButton = document.createElement('button');
    let inputId = document.createElement('input');

    productName.className = "sale-item-name";
    productName.innerHTML = p['name'];
    
    priceTitle.className = "sale-price-title";
    priceTitle.innerHTML = "Price: "

    oldPrice.className = "old-price";
    oldPrice.innerHTML = "$" + p['price'];

    newPrice.className = "new-price";
    newPrice.innerHTML = "$" + p['saleprice'];

    dealButton.className = "deal-button";
    dealButton.type = "submit";
    dealButton.innerHTML = "Add";
    dealButton.name = "dealbutton";

    inputId.type = "hidden";
    inputId.value = p['id'] -1 ;
    inputId.name = "saleid";

    saleForm.appendChild(productName);
    saleForm.appendChild(priceTitle);
    saleForm.appendChild(oldPrice);
    saleForm.appendChild(newPrice);
    saleForm.appendChild(dealButton);
    saleForm.appendChild(inputId);

    saleItem.appendChild(saleForm);

    sales.appendChild(saleItem);

    
}

function updateTotalPrice() {
    let subTotal = 0;
     let itemQuantity = 0;
    for (let i = 0; i < items.length; i++) {
        let item = items[i]
        let itemPrice = item.getElementsByClassName("item-price")[0];
        itemQuantity = parseInt(item.getElementsByClassName("item-quantity-input")[0].value)  + itemQuantity;
        let priceNumber = itemPrice.textContent;
        priceNumber = parseFloat(priceNumber.replace("$", ""));
        subTotal = subTotal + (priceNumber);
    }
    console.log(itemQuantity);
    let QST = (0.09975 * subTotal);
    let GST = (0.05 * subTotal);
    document.getElementById("subtotal").textContent = "$" + subTotal.toFixed(2);
    document.getElementById("qst").textContent = "$" + QST.toFixed(2);
    document.getElementById("gst").textContent = "$" + GST.toFixed(2);
    document.getElementById("final-price").textContent = "$" + (subTotal + GST + QST).toFixed(2);
    document.getElementById("items").textContent = itemQuantity;
}

// function updateSummary() {
//     let items = 0;
//     let subTotal = 0;
//     let JSONProducts = getProducts();

//     if (JSONProducts.length > 0) {
//         JSONProducts.forEach((product) => {
//             items = items + product.quantity;
//             subTotal = subTotal + (product.price * product.quantity);

//         })

//         let QST = (0.09975 * subTotal);
//         let GST = (0.05 * subTotal);

//         document.getElementById("subtotal").textContent = "$" + subTotal.toFixed(2);
//         document.getElementById("qst").textContent = "$" + QST.toFixed(2);
//         document.getElementById("gst").textContent = "$" + GST.toFixed(2);
//         document.getElementById("final-price").textContent = "$" + (subTotal + GST + QST).toFixed(2);
//         document.getElementById("items").textContent = items;
//         try {
//             saveInputs(JSONProducts);
//         }
//         catch (e) { }
//     }
//     else {
//         updateTotalPrice();
//         updateCartItems();
//     }



// }
// function updateCartItems() {
//     let totalCount = 0;
//     for (let i = 0; i < items.length; i++) {
//         let item = items[i];
//         let itemQuantity = item.getElementsByClassName("item-quantity-input")[0];
//         let quantityNumber = parseInt(itemQuantity.value);
//         totalCount = totalCount + quantityNumber;
//     }
//     document.getElementById("items").textContent = totalCount;
// }
// function saveInputs(products) {
//     for (let i = 0; i < items.length; i++) {
//         let item = items[i]
//         item.getElementsByClassName("item-quantity-input")[0].value = products[i].quantity;
//     }
// }