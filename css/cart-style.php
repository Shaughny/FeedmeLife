<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");


?>



html, body {
  margin: 0;
  padding: 0;
  min-height: 100%;
  position: relative;
}
body{
  background-image: url(../images/mWallpaper.png);
  
}
hr{
  height: 1px;
  background: black;
 
}
main{
  padding-bottom: 300px;
  margin-bottom: 10%;
}
.section-header{
  padding: 1%;
  margin-top: 0.0%;
  background-image: url(../images/greenback.jpg);
  margin-bottom: 1%;;
  width: 100%;
}
h1{
  text-align: center;
  color: rgb(248, 247, 247);
  font-size: 2.8vw;
   font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.cart{
  font-weight: bold;
  font-size: 1.25em;
  color: #333;
   width: 65%;
   padding: 0;
    margin-top: 1%;
    margin-bottom: 1%;
    border: 4px solid #212529;
    background-color: rgba(250, 250, 250, 0.972);
}
.cart-head{
    font-weight: bold;
    font-size: 1.2vw;
    color: #333;
    text-align: center !important;
    display: block;
    border-bottom: 1px solid black;
    margin-right: 1.5em;
    padding-bottom: 10px;
    margin-top: 10px;
    margin-bottom: 20px;
    
}
.item-price-head{
  width: 20%;
}
.cart-row{
  display: flex;
}
.cart-column{
  display: flex;
  
  margin-right: 1.5em;
  padding-bottom: 10px;
  margin-top: 10px;
  align-items: center;

}
.item-title{
  margin-left: 15%;
  font-size: 1.5vw;
  font-weight: lighter;
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
}
.item-image{
    width: 25%;
    height: auto;
    border-radius: 5px;
    margin-left: 1%;
}
.item-product{
  width: 45%;
}
.item-price{
  width: 25%;
  font-size: 1.3vw;
  margin-left: 15%;
  font-weight: lighter;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.item-quantity{
  width: 35%;
}
.item-quantity-input{
  height: auto;
  width: 18%;
  border-radius: 5px;
  border: 1px solid #041c24;
  background-color: #eee;
  color: #333;
  padding: 0;
  text-align: center;
  font-size: 0.8em;
  margin-left: 1%;
  margin-right: 1%;
  display: flex;
}
.quantity-save{
  background: none;
  border: none;
  color: #0f285e;
  margin-right: 15%;
  font-size: 1vw;
}
.item-delete{
  background: none;
  border: none;
  color: #960a0a;
  font-size: 1vw;
}
@media screen and (max-width: 768px) {
  .quantity-save{    
    font-size: 12px;
    margin: 0;
  }
  .item-delete{
    font-size: 12px;
    margin: 0;
  }
  .item-quantity-input{
    font-size: 2.3vw;
    width: 30%;
    
  }
.item-price{
  font-size: 1.3vw;
}
.item-title{
  margin-left: 8%;
  font-size: 2vw;
  font-weight: lighter;
}
}
@media screen and (max-width: 1000px) {
  .quantity-save{    
    font-size: 12px;
    margin-right: 0;
  }
  .item-delete{
    font-size: 12px;
  }
  .item-quantity-input{
    font-size: 2.3vw;
    width: 30%;
    
  }
}
@media screen 
  and (device-width: 320px) 
  and (device-height: 640px) {
    img{
      display: none;
    }
  }

.sidebar {
  height: auto;
  width: 17vw;
  position: absolute;
  margin-top: 3%;
  right: 0;
  margin-bottom: 10%;
  text-align: left;
  background-color: rgb(248, 248, 248);
  border-radius: 2px;
  border: 4px solid #212529;
  font-size: 1.6rem;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
#total-price {
  text-align: center;
  background-color: #ece7e5;
  border: 1px solid #212529;
  border-radius: 5px 5px 0px 0px;
  color: #212529;
  
  text-decoration: none;
}
#total-head{
  font-size: 2vw;
  font-weight:bold;
  color: #03290a;
  text-decoration: none;
  margin-bottom: 4vh;
  
}
.order-button{
  position: relative;
  justify-content: center;
  display: flex;
}
#order{
margin-left: 4vw;
font-size: 1.5vw;
margin-top: 1%;
margin-right: 2vw;
background-color: #212529;
color: rgb(255, 255, 255);
margin-bottom: 10%;

}
#order:hover{
  background-color: #3b434b;;
  transition: 0.3s;
}


#details,#total{
  margin-left: 3%;
  margin-top: 3vh;
  font-size: 1.5vw;
}
.details{
  display: flex;
  width: 100%;
  font-size: 1vw;;
}


.subtotal,.qst,.gst,.items{
  text-align: justify;
  text-align-last: justify;
  margin-left: 1%;
  margin-right: 2%;
  margin-bottom: 2%;
}
.items{
  margin-top: 5vh;
  font-size: 1.8vw;
}
#item-label{
  color: #000;

}
#items{
  border: 1px solid #212529;
  padding: 3%;
}

.sidebar div {
    
  display: block;
}
.calc-total{
  margin-left: 2%;
  margin-right: 2%;
  margin-top: 0.3rem;
  text-align: center;
  font-size: 2vw;
  color: #212529;
  border: 1px solid #212529;
  position: relative;


}
.sale-item{
  text-align: left;
  font-size: 1rem;
  margin-left: 1%;
}

.body-text {
  font-size: 2vw;
}


.side-img {
  width: 50%;
  height: 5%;

  align-self: center;
}

#back{
  
  align-self: start;  
  color: rgb(255, 255, 255);
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #212529;
  border: 2px solid #fafafa;
  transition: 0.3s;
}
.sale-price-title{
  font-size: 1.1vw;
  margin-left: 5%;
}
.sale-item-name{
  font-size: 1.3vw;
  margin-right: 2%;
  margin-left: 0.2%;
  margin-top:2%;
  margin-bottom: -2%;
  text-decoration: underline;
}
.old-price{
  text-decoration: line-through;
  font-size: 1vw;
  margin-right: 5%;
}
.new-price{
  font-size: 1.2vw;
  color: red;
  margin-right: 8%;
}
#deals-head{
  font-size: 2vw;
  font-weight:bold;
  color: #03290a;
  text-decoration: none;
  margin-bottom: 0.8vh;
  
}

.deal-button{
  font-size: 1vw;
  background: #03290a;
  color: white;
  float: right;
  margin-right: 1%;
  border-radius: 10%;
}
.deal-button:hover{
  background-color: #0da839;
  color: black;
  transition: 0.3s;

}


#deals-title{
  color: blue;
}


#deals-bar{
  width: 15vw;
  height: auto;
  min-height: 10px;
  position: absolute;
  margin-top: 10%;
  left: 0;
  margin-left: 2%;
  text-align: center;
  border-radius: 2px;
  font-size: 1vw;
  padding-bottom: 1%;
}

#back-bar{
  
  
  width: 15vw;
  height: 4vw;
  min-height: 10px;
  position: absolute;
  margin-top: 3%;
  left: 0;
  margin-left: 2%;
  text-align: center;
  border-radius: 2px;
  font-size: 1vw;
  
}
#back:hover{
  opacity: 1;
  align-self: start;  
  left: 0;
  width: 100%;
  height: 100%;
  transition: 0.3s;
  border: 4px solid #090f1a;
  transform: scale(1.01);

}

#back-bar:hover{
  width: 15vw;
  height: 4vw;
  position: absolute;
  margin-top: 3%;
  left: 0;
  margin-left: 2%;  
  text-align: center;
  font-size: 1.1vw;
}

.footer {
  background: #303036;
  color: #d3d3d3;
  height: 300px;
  position: absolute;
  
}

.footer .footer-content {
  height: 350px;
  position: fixed;
}

.footer .footer-content .footer-section {
  flex: 1;
  border: 1px solid white;
  padding: 25px;
}

.footer .footer-bottom {
  background: #343a40;
  color: #686868;
  height: 50px;
  text-align: center;
  left: 0px;
  bottom: 0px;
  padding-top: 10px;
  width: 100%;
}

.button{
    width: 35px;
    height: 35px;
    border: 1px solid #c6c6c6;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;

}

input::-webkit-inner-spin-button,
input::-webkit-outer-spin-button {
    -webkit-appearance: none;
}

input[type="number"] {
    -moz-appearance: textfield;
}

.save-form{
  display: flex;
 margin-left: 4%;
  
}
.qty-column{

}
