var quotes = [
    'The greatest glory in living lies not in never falling, but in rising every time we fall. -Nelson Mandela',
    'The way to get started is to quit talking and begin doing. -Walt Disney',
    'If life were predictable it would cease to be life, and be without flavor. - Eleanor Roosevelt',
    'If you look at what you have in life, youll always have more. If you look at what you dont have in life, youll never have enough. -Oprah Winfrey',
    'If you set your goals ridiculously high and its a failure, you will fail above everyone elses success. -James Cameron',
    'Life is what happens when youre busy making other plans. -John Lennon',
    'Spread love everywhere you go. Let no one ever come to you without leaving happier. -Mother Teresa',
    'When you reach the end of your rope, tie a knot in it and hang on. -Franklin D. Roosevelt',
    'Always remember that you are absolutely unique. Just like everyone else. -Margaret Mead'
]
function newQuote(){
        //attempt to get element by ID
        var element = document.getElementById("originalQuote");
    //if it isnt undefined and it isnt null, then it exists
    if(typeof(element) != 'undefined' && element != null){
        element.parentNode.removeChild(element);
    }
    var randomNumber = Math.floor(Math.random() * (quotes.length));
    document.getElementById('menuQuote').innerHTML = quotes[randomNumber];
}

function descToggle(){
    var descriptionButton = document.getElementsByClassName("descriptionButton")[0];
    var description = document.getElementsByClassName("description")[0];
    if (description.classList.contains("show"))
        descriptionButton.innerHTML="More Information >"; //the order is reversed because the function takes the
    else                                                  //class names before the toggle happens, so we need to 
        descriptionButton.innerHTML="Show Less <";        //take that into concideration
}

function descSubtotalCalc(){
    if (loadQty()!=null){//checks to see if the person reloaded the page
        let qty = document.getElementById("quant") 
        qty.value=loadQty(); //sets the quantity to what was saved
        let strprice = document.getElementById("product-price")
        let strsub = document.getElementById("subtotal");
        let price=parseFloat(strprice.innerText.match(/\d+\.\d*/));
        let sub=price*qty.value;
        strsub.innerHTML="Subtotal: $"+sub.toFixed(2)
    }
    else{
        let qty = document.getElementById("quant").value
        let strprice = document.getElementById("product-price")
        let strsub = document.getElementById("subtotal");
        let price=parseFloat(strprice.innerText.match(/\d+\.\d*/));
        let sub=price*qty;
        strsub.innerHTML="Subtotal: $"+sub.toFixed(2)
    }
    
}
function descSubtract1(){
    var qty = document.getElementById("quant");
    if (qty.value<=1){
        qty.value=1;
    }
    else{
        qty.value--;
    }
    saveQty(qty.value);
    descSubtotalCalc();
}
function descAdd1(){
    let qty = document.getElementById("quant"); 
    qty.value++;
    saveQty(qty.value);
    descSubtotalCalc();
}

function saveQty(_qty){
    sessionStorage.setItem("quantity",_qty)
    sessionStorage.setItem("URL", window.location.pathname) //we save the url because we want to discard the information if they 
}                                                           //visit another product page
function loadQty(){
    if (sessionStorage.getItem("quantity")==null||undefined){//if there is no stored value,
        return null
    }
    else if(sessionStorage.getItem("URL")!=window.location.pathname){//if the link is different from where is saved before,
        return null
    }
    else{
        let qty = document.getElementById("quant").value
        qty=sessionStorage.getItem("quantity")
        return qty
    }
}


