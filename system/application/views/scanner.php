


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>

</title>
          <script >
              function onScriptLoad() {



                var OrderID = "73287";
                var Token = "f1ec700d1c6f4acd89aea55e8718d8041740562483200";
                var amount = "500";
                var id = "73287";
                var config = {
                    "root": "",
                    "flow": "DEFAULT",
                    "data": {
                        "orderId": OrderID,
                        "token": Token,
                        "tokenType": "TXN_TOKEN",
                        "amount": amount//,
                        //"userDetail": {                         
                        //  "custLRNumber": id 
                        // }
                    },
                    "handler": {
                        "notifyMerchant": function (eventName, data) {
                            debugger
                            console.log("notifyMerchant handler function called");
                            console.log("eventName => ", eventName);
                            console.log("data => ", data);
                            if(eventName==='APP_CLOSED')
                            window.location.href = "../Payment/PaytmTransactnFail.aspx";
                        }
                    }
                };

                if (window.Paytm && window.Paytm.CheckoutJS) {
                    window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
                        // initialze configuration using init method 
                        window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                            // after successfully updating configuration, invoke JS Checkout
                            window.Paytm.CheckoutJS.invoke();
                        }).catch(function onError(error) {
                            console.log("error => ", error);
                        });
                    });
                }
            }
    </script>
    <script type="application/javascript" crossorigin="anonymous" src="https://securegw.paytm.in/merchantpgpui/checkoutjs/merchants/AGARWA00747756706311.js" onload="onScriptLoad();"></script>

</head>
<body>
 
  <div id="wdfd" align="center">
    <div id="content" align="center">
     </div>
      </div>
  </body>
</html>
