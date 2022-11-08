<style>
* {
    box-sizing: border-box;
}

body {
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(background.jpg);
    background-position: center;
    background-size: cover;
    margin: 0;
    height: 100vh;
    width: 100vw;
    overflow: hidden;
    font-family: "Lato", sans-serif;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #555;
    background-color: #ecf0f3;
}
.container{
     background-image: url(unnamed.jpg)!important;
    background-position: center;
    background-size: cover;
    width: 430px;
    height: 500px;
    padding: 60px 35px 35px 35px;
    border-radius: 30px;
    background-color: #ecf0f3;
}
.logo{
    background: url(logo.png);
    border-radius: 5%;
    width: 210px;
    height: 97px;
    margin: 0 auto;
    box-shadow: 0px 0px 2px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 1px 1px 1px #a7aaaf, -1px -1px 1px #fff;

}
.tittle {
    text-align: center;
    font-size: 20px;
    padding-top: 20px;
    padding-bottom: 10px;
    letter-spacing: 0.5px;
}

.fields {
    width: 100%;
    
}

.fields input {
    border: none;
    outline: none;
    background: none;
    font-size: 18px;
    color:black;
    /* padding: 10px 10px 10px 5px; */
    padding-top:14px;
    padding-right:10px;
    padding-bottom:10px;
    /* padding-left:5px; */
}

.username,
.amount {
    margin-bottom: 20px;
    border-radius: 25px;
    box-shadow: inset 8px 8px 8px 8px #cbced1,inset -8px -8px 8px #fff;
    padding-left: 5%;
}

.paynow {
    outline: none;
    border: none;
    cursor: pointer;
    width: 100%;
    height: 60px;
    border-radius: 30px;
    font-size: 20px;
    font-weight: 700;
    font-family: "Lato", sans-serif;
    color: #fff;
    text-align: center;
    background-color: #02c8db;
    box-shadow: 3px 3px 8px #b1b1b1, -3px -3px 8px #fff;
    transition: all 0.5s;
}

.paynow:hover {
    background-color: #50e5b9;
}

.paynow:active {
    background-color: #88ef9e;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<div class="container">
<div class="logo"></div>
<div class="tittle">Payment Gateway</div>
    <div class="username">
    <div class="fields">
        <input type="textbox" name="name" id="name" placeholder="Enter your name"/><br/><br/>
    </div>
        </div>
    <div class="amount">
    <div class="fields">
    <input type="textbox" name="amt" id="amt" placeholder="Enter amt"/><br/><br/>
    </div>
</div>
    <input type="button" class='paynow' name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
    </div>
</div>
<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Hope Ngo",
                        "description": "Test Transaction",
                        "image": "https://www.freepik.com/free-vector/origami-symbolic-paper-folded-crane-doodle_3886831.htmS",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>