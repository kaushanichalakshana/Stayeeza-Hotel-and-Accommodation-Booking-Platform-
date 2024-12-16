function decrementValue() {
      const inputElement = document.getElementById("numberInput");
      if (inputElement.value > 1) {
        inputElement.value = parseInt(inputElement.value) - 1;
      }
    }

    // Function to increment the input value
    function incrementValue() {
      const inputElement = document.getElementById("numberInput");
      if (inputElement.value < 2) {
        inputElement.value = parseInt(inputElement.value) + 1;
      }
    }
    
    
    function decrementValue1() {
      const inputElement = document.getElementById("numberInput1");
      if (inputElement.value > 1) {
        inputElement.value = parseInt(inputElement.value) - 1;
      }
    }

    // Function to increment the input value
    function incrementValue1() {
      const inputElement = document.getElementById("numberInput1");
      if (inputElement.value < 4) {
        inputElement.value = parseInt(inputElement.value) + 1;
      }
    }
    
    
    
    $(document).ready(function(){
    	// Get value on keyup funtion
    	$("#roomSelect, #nights").keyup(function(){

    	var total=0;    	
    	var x = Number($("#roomSelect").val());
    	var y = Number($("#nights").val());
    	var total=x * y;  

    	$('#nightprice').val(total);

    });
});

function showDropInfo() {
         
         var room = document.getElementById('roomSelect').value;
         
        document.getElementById("nightprice").value=room;
        document.getElementById("fullprice").value=room;
         }

function paymentGateway(){
    var xhttp = new XMLHttpRequest();
    var fprice = document.getElementById("price");
    xhttp.onreadystatechange= ()=>{
        if(xhttp.readyState == 4 && xhttp.status == 200){
            alert(xhttp.responseText);
            var obj = JSON.parse(xhttp.responseText);
            // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        window.location.href = "http://localhost/Project-1/process/afterBooking.php";
        // Note: validate the payment and show success or failure page to the customer

    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
         window.location.href = "http://localhost/Project-1/process/index.php";
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": obj["merchant_id"],    // Replace your Merchant ID
        "return_url": "http://localhost/Project-1/Confirm.php",     // Important
        "cancel_url": "http://localhost/Project-1/Confirm.php",     // Important
        "notify_url": "http://localhost/Project-1/test2.php",
        "order_id": obj["order_id"],
        "items": obj["hotelName"],
        "amount": obj["amount"],
        "currency": obj["currency"],
        "hash": obj["hash"], // *Replace with generated hash retrieved from backend
        "first_name": obj["fname"],
        "last_name": obj["lname"],
        "email": obj["email"],
        "phone": obj["phoneNo"],
        "address": obj["address"],
        "city": obj["city"],
        "country": obj["country"],
        "delivery_address": "",
        "delivery_city": "",
        "delivery_country": "",
        "custom_1": "",
        "custom_2": ""
    };
    payhere.startPayment(payment);
    
        }
    }
    xhttp.open("POST","../process/payhere.php",true);
    xhttp.send();
    
    
};

function contactUs(){

  Swal.fire("Send And Email : stayeeza@gmail.com");
}