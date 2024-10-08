<!-- <div class="nav">

</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<div class="card">
    <div class="card-top border-bottom text-center">
        <a href="/"> Back to shop</a>
        
    </div>
    <div class="card-body">
        <div class="row upper">
            <span><i class="fa fa-check-circle-o"></i> Shopping bag</span>
            <span><i class="fa fa-check-circle-o"></i> Order details</span>
            <span id="payment"><span id="three">3</span>Payment</span>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="left border">
                    <div class="row">
                        <span class="header">Payment</span>
                        <div class="icons">
                            <img src="https://img.icons8.com/color/48/000000/visa.png" />
                            <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" />
                            <img src="https://img.icons8.com/color/48/000000/maestro.png" />
                        </div>
                    </div>
                    <form>
                        <span>Cardholder's name:</span>
                        <input placeholder="Linda Williams">
                        <span>Card Number:</span>
                        <input placeholder="0125 6780 4567 9909">
                        <div class="row">
                            <div class="col-4"><span>Expiry date:</span>
                                <input placeholder="YY/MM">
                            </div>
                            <div class="col-4"><span>CVV:</span>
                                <input id="cvv">
                            </div>
                        </div>
                        <input type="checkbox" id="save_card" class="align-left">
                        <label for="save_card">Save card details to wallet</label>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="right border">
                    <div class="header">Order Summary</div>
                    <p>2 items</p>
                    <div class="row item">
                        <div class="col-4 align-self-center"><img class="img-fluid"
                                src="https://i.imgur.com/79M6pU0.png"></div>
                        <div class="col-8">
                            <div class="row"><b>$ 26.99</b></div>
                            <div class="row text-muted">Be Legandary Lipstick-Nude rose</div>
                            <div class="row">Qty:1</div>
                        </div>
                    </div>
                    <div class="row item">
                        <div class="col-4 align-self-center"><img class="img-fluid"
                                src="https://i.imgur.com/Ew8NzKr.jpg"></div>
                        <div class="col-8">
                            <div class="row"><b>$ 19.99</b></div>
                            <div class="row text-muted">Be Legandary Lipstick-Sheer Navy Cream</div>
                            <div class="row">Qty:1</div>
                        </div>
                    </div>
                    <hr>
                    <div class="row lower">
                        <div class="col text-left">Subtotal</div>
                        <div class="col text-right">$ 46.98</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left">Delivery</div>
                        <div class="col text-right">Free</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><b>Total to pay</b></div>
                        <div class="col text-right"><b>$ 46.98</b></div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><a href="#"><u>Add promo code</u></a></div>
                    </div>
                    <button class="btn">Place order</button>
                    <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                </div>
            </div>
        </div>
    </div>

    <div>
    </div>
</div>
<style>
    body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(255, 255, 255);
    font-size: 0.8rem;
}
.card{
    max-width: 1000px;
    margin: 2vh;
}
.card-top{
    padding: 0.7rem 5rem;
}
.card-top a{
    float: left;
    margin-top: 0.7rem;
}
#logo{
    font-family: 'Dancing Script';
    font-weight: bold;
    font-size: 1.6rem;
}
.card-body{
    padding: 0 5rem 5rem 5rem;
    background-image: url("https://i.imgur.com/4bg1e6u.jpg");
    background-size: cover;
    background-repeat: no-repeat;
}
@media(max-width:768px){
    .card-body{
        padding: 0 1rem 1rem 1rem;
        background-image: url("https://i.imgur.com/4bg1e6u.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    }  
    .card-top{
        padding: 0.7rem 1rem;
    }
}
.row{
    margin: 0;
}
.upper{
    padding: 1rem 0;
    justify-content: space-evenly;
}
#three{
    border-radius: 1rem;
        width: 22px;
    height: 22px;
    margin-right:3px;
    border: 1px solid blue;
    text-align: center;
    display: inline-block;
}
#payment{
    margin:0;
    color: blue;
}
.icons{
    margin-left: auto;
}
form span{
    color: rgb(179, 179, 179);
}
form{
    padding: 2vh 0;
}
input{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247);
}
input:focus::-webkit-input-placeholder
{
      color:transparent;
}
.header{
    font-size: 1.5rem;
}
.left{
    background-color: #ffffff;
    padding: 2vh;   
}
.left img{
    width: 2rem;
}
.left .col-4{
    padding-left: 0;
}
.right .item{
    padding: 0.3rem 0;
}
.right{
    background-color: #ffffff;
    padding: 2vh;
}
.col-8{
    padding: 0 1vh;
}
.lower{
    line-height: 2;
}
.btn{
    background-color: rgb(23, 4, 189);
    border-color: rgb(23, 4, 189);
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin: 4vh 0 1.5vh 0;
    padding: 1.5vh;
    border-radius: 0;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
a{
    color: black;
}
a:hover{
    color: black;
    text-decoration: none;
}
input[type=checkbox]{
    width: unset;
    margin-bottom: unset;
}
#cvv{
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.575) , rgba(255, 255, 255, 0.541)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center;
} 
#cvv:hover{

}
</style> -->
