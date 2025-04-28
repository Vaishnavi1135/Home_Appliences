<!-- 


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><link href="../css/drl.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" media="all" href="../css/PGWay.css" />
        <script type="text/javascript" src="../JQuery/jquery.js"></script> 
        <script type="text/javascript" language="javascript" src="/js/main.js"> </script>
       <script language="javascript" type="text/javascript">



        </script>
        <title>

</title>


    <script>
        function fnFormSubmit() {
            if ($("#txtFirstName").val() == "") {
                alert("please enter First Name ..");
                $("#txtFirstName").focus();
                return false;
            }
            if ($("#txtLastName").val() == "") {
                $("#txtLastName").focus();
                alert("please enter LastName ..");
                return false;
            }
            if ($("#txtEmailID").val() == "") {
                $("#txtEmailID").focus();
                alert("please enter EmailID ..");
                return false;
            }
            if ($("#txtContactNO").val() == "") {
                $("#txtContactNO").focus();
                alert("please enter ContactNO ..");
                return false;
            }
            if ($("#txtAddress").val() == "") {
                $("#txtAddress").focus();
                alert("please enter Address ..");
                return false;
            }
            if ($("#txtAmount").val() == "") {
                $("#txtAmount").focus();
                alert("please enter Amount ..");
                return false;
            }
            if ($("#txtLRNO").val() == "") {
                $("#txtLRNO").focus();
                alert("please enter LR no ..");
                return false;
            }
        }

        function fnCheckContactnoLength(id) {   //for javascript call 
            if (id.value.length > 10) {
                alert("contact number not more than ten digit no");
                id.value = "";
                return false;
            }
        }
    </script>
</head>
<body>
  <div id="wdfd" align="center">
    <div id="content" align="center">
      <h1>Welcome to Online Payment</h1>

      <center><p>Just click the Submit link below to pay payment online. please enter all required details </p></center>
         <form name="form1" method="post" action="./PaytmMain.aspx" id="form1">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTkyMDk1OTQ5MGRkfrhs/K35W7MHE/9/kAl7I/tMJk1IgLmKvryUI1tUVtY=" />
</div>

<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="437DF511" />
	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEdAA48z/uKuMBQthogRrhfP6xLkPsZTbO5ndg/S9ACCzNsdNjxR4vJTRup/e3nrnbcrQWB0GAUtYjKjsLPn8q/s2V1TNr8+Dx/H+2fNfPhxgyex+tZBdiRon5d1qE03oo5TvMZRjiqyEZP34kvXGESGWks8w86ETF6ormA3gjtz7/GK5qPnR1JXGHWscSP1P0vWV0fcRfNzpAmcbmdbysoE+5vy11p5DZakpmDi3Dr+wGEOpaa+wU/+SagfX3LFLKb8ft4NzHLNSB7WEC3y0l58VaMPOaW1pQztoQA36D1w/+bXZEYOiJ2G/Loi8L1JHmlhBC+nKYLWqxGLDKy4ApRgVST" />
</div>
        
                <input name="hdntoken" type="hidden" id="hdntoken" />
                <input name="hdnId" type="hidden" id="hdnId" />
                <input name="hdnamount" type="hidden" id="hdnamount" />

                
           <table>
                  <tr>
                      <td colspan="2" align="center"> 
                      </td>
                  </tr>
                  <tr>
                      <td> 
                          <span id="lblFName" class="text_style">First Name:</span></td>
                      <td>
                          <input name="txtFirstName" type="text" id="txtFirstName" class="txtfield" />    </td>
                  </tr>
                  <tr>
                      <td>
                          <span id="lblLName" class="text_style">Last Name:</span></td>          
                      <td> 
                          <input name="txtLastName" type="text" id="txtLastName" class="txtfield" />   </td>
                  </tr>
                  <tr>
                      <td>
                          <span id="lblEmailID" class="text_style">Email ID:</span></td>          
                      <td> 
                          <input name="txtEmailID" type="text" id="txtEmailID" class="txtfield" onblur="validate(this)" />   </td>
                  </tr>
                  <tr>
                      <td>
                          <span id="lblContactNO" class="text_style">Contact No:</span>:</td>
                      <td>  
                          <input name="txtContactNO" type="text" maxlength="10" id="txtContactNO" class="txtfield" onkeypress="return fnCheckOnlynums(this)" onblur="fnCheckContactnoLength(this)" />  </td>
                  </tr>
                  <tr>
                      <td>
                          <span id="lblAddress" class="text_style">Address:</span>:</td>
                      <td> 
                          <textarea name="txtAddress" rows="2" cols="20" id="txtAddress" class="txtfield">
</textarea>   </td>
                  </tr>
                  <tr>
                      <td>
                          <span id="lblAmount" class="text_style">Amount:</span>:</td>
                      <td>   
                          <input name="txtAmount" type="text" id="txtAmount" class="txtfield" onkeypress="return fnCheckOnlynums(this);" onblur="fnCheckValue()" /> </td>
                  </tr>
                  <tr>
                      <td>
                          <span id="lblLRNO" class="text_style">LR NO:</span></td>
                      <td>   
                          <input name="txtLRNO" type="text" id="txtLRNO" class="txtfield" /></td>
                  </tr>
                  <tr>
                      <td>
                          <span id="lblFrom" class="text_style">From</span></td>
                      <td>   
                          <input name="txtFrom" type="text" id="txtFrom" class="txtfield" /></td>
                  </tr>      
                  <tr>
                      <td>
                          <span id="lblTo" class="text_style">To</span></td>
                      <td>   
                          <input name="txtTo" type="text" id="txtTo" class="txtfield" /></td>
                  </tr>
                  <tr>
                      <td align="center" colspan="2"> 
                          <input type="submit" name="btnSubmit" value="Submit"  href="<?php echo base_url('pages/scanner');?>" onclick="return fnFormSubmit();" id="btnSubmit" class="flatbtn" style="font-weight:bold;" />
                              <span id="lblResultMsg"></span>
                      </td>                  
                  </tr>
                  <tr>
                    <td>
                        <span style="color: #ff3333">
                        </span>
                    </td>
                  </tr>
             </table>
         </form>


      </div>
    </div>
</body>
</body>
</html> -->

 






<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminnew"; // Change DB name accordingly

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all items grouped by category
$sql = "SELECT * FROM household_items ORDER BY category";
$result = $conn->query($sql);

$items_by_category = [];
while ($row = $result->fetch_assoc()) {
    $items_by_category[$row['category']][] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Items for Moving & Packing</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { width: 70%; margin: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: center; }
        th { background-color: #f4f4f4; }
        .btn-submit { margin-top: 20px; padding: 10px; background: blue; color: white; border: none; cursor: pointer; }
        .category-title { background: #ddd; font-weight: bold; padding: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Select Items for Moving & Packing</h2>
    <form action="receipt.php" method="GET">
        
        <?php foreach ($items_by_category as $category => $items): ?>
            <h3 class="category-title"><?php echo htmlspecialchars($category); ?></h3>
            <table>
                <tr>
                    <th>Item Name</th>
                    <th>Moving (₹)</th>
                    <th>Packing (₹)</th>
                    <th>Move?</th>
                    <th>Pack?</th>
                </tr>
                
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item['item_name']; ?></td>
                        <td>₹ <?php echo number_format($item['moving_cost'], 2); ?></td>
                        <td>₹ <?php echo number_format($item['packing_cost'], 2); ?></td>
                        <td><input type="checkbox" name="move_items[]" value="<?php echo $item['id']; ?>"></td>
                        <td><input type="checkbox" name="pack_items[]" value="<?php echo $item['id']; ?>"></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endforeach; ?>

        <button type="submit" class="btn-submit">Generate Receipt</button>
    </form>
</div>

</body>
</html>
