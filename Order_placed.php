<?php require('config.php'); ?>

<?php 
if (isset($_POST['submit'])) {
    $paymentOption = $_POST['paymentOption'];
    if ($paymentOption == 'Credit/Debit Card') {
        $cardType = $_POST['cardType'];
        $cardnumber = $_POST['cardnumber'];
        $exdate = $_POST['exdate'];
        $securitycode = $_POST['securitycode'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $S_ID = $_SESSION['S_ID'];

        global $con;
        $sql = "INSERT INTO payment (Shipping_ID, Pay_Method, Pay_CardType, Pay_CardNumber, Pay_CardExp, Pay_CardSCode, Pay_CardFName, Pay_CardLName) 
        VALUES ('$S_ID', '$paymentOption', '$cardType', '$cardnumber', '$exdate', '$securitycode', '$firstname', '$lastname')";
        if(!($con->query($sql))){
            echo "Error:". $con->error;
        }
    } else {

        $S_ID = $_SESSION['S_ID'];
    
        global $con;
        $sql = "INSERT INTO payment (Shipping_ID, Pay_Method) 
        VALUES ('$S_ID', '$paymentOption')";
        if(!($con->query($sql))){
            echo "Error:". $con->error;
        }
    }

    foreach ($_SESSION as $name => $value) {
        unset ($_SESSION[$name]);
    }
}

?>

<?php

global $con;
$sql = "SELECT * FROM shiping WHERE S_ID=" . "'" . $S_ID . "'";
$result = $con->query($sql);
if ($result !== false && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $FName = $row['F_Name'];
        (isset($row['L_Name'])) ? $LName = $row['L_Name'] : $LName = "";
        $Email = $row['Email'];
        $Country = $row['Country'];
        $Province = $row['Province'];
        $City = $row['City'];
        $Adrress_Line_1 = $row['Adrress_Line_1'];
        (isset($row['Adrress_Line_2'])) ? $Adrress_Line_2 = $row['Adrress_Line_2'] : $Adrress_Line_2 = "";
        //$Adrress_Line_2 = $row['Adrress_Line_2'];
        $Contact_number = $row['Contact_number'];
        $Amount = $row['Amount'];
    }
}

// $sql = "SELECT * FROM payment WHERE S_ID=" . "'" . $S_ID . "'";
// $result = $con->query($sql);
// if ($result !== false && $result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $Pay_Method = $row['Pay_Method'];
//         $Pay_CardType = $row['Pay_CardType'];
        
//     }
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed</title>
    <link rel="stylesheet" href="css/order_placed.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <?php require('header.html'); ?>

    <!-- Nav bar -->
    <div class="nav">
        <div class="navItem" id="shoppingCart">
            <img src="imgs/right.png" alt="" class="nav_img">
            <p>Shopping Cart</p>
        </div>
        <div class="navItem" id="shippingDetails">
            <img src="imgs/right.png" alt="" class="nav_img">
            <p>Shipping Details</p>
        </div>
        <div class="navItem" id="payement">
            <img src="imgs/right.png" alt="" class="nav_img">
            <p>Payement Details</p>
        </div>
    </div>
    <!-- End of nav bar -->

    <div class="root">
        <div class="main">
            <div class="heading">
                <div class="headingRow">
                    <div class="headingRowImg">
                        <img src="imgs/orderRight.png" alt="" class="heading_img">
                    </div>
                    <div class="headingRowTitle">
                        <h2><span class="Customer_Name"><?php echo $FName; ?></span> Your Order is on the Way.</h2>
                    </div>
                </div>
                <div class="headingDis">
                    <div class="headingDisPara">
                        <p>Thank you for shopping with Sonicas Music. We have received your order.</p>
                    </div>
                    <div class="headingDisPara">
                        <p>Install our Android or IOS app for get instant shipping notifications</p>
                    </div>
                </div>
            </div>
            <div class="invoieMain">
                <div class="invoiceHeadingRow">
                    <div class="invoiceHeading">
                        <h3 class="invoiveHeaddingH5">INVOICE</h5>
                    </div>
                    <div class="invoiveNumber">
                        <p class="invoiveNumberPar">
                            <span class="invoiceNumberOrder">order #</span>
                            <span class="invoiceNumberOrderNum"><?php echo $S_ID; ?></span>
                        </p>
                    </div>
                </div>
                <div class="invoiceDisRow">
                    <div class="invoiceShipping">
                        <div class="invoiceShippingRow">
                            <div class="invoiceShippingHeading">
                                <h5 class="invoiveShippingHeadingH5">SHIP TO: </h5>
                            </div>
                            <div class="invoiceShippingDetails">
                                <p class="invoiceShippingDetailsPara">
                                    <span class="ShippingName"><?php echo $FName . " " . $LName ; ?></span>
                                    <br>
                                    <span class="ShippingAddressLine1"><?php echo $Adrress_Line_1; ?></span>
                                    <br>
                                    <?php if ($Adrress_Line_2 != "") { 
                                        echo '<span class="ShippingAddressLine2">' . $Adrress_Line_2 . '</span>';
                                        echo '<br>';
                                    }
                                    ?>
                                    <!-- <span class="ShippingAddressLine2"><?php echo $Adrress_Line_2; ?></span>
                                    <br> -->
                                    <span class="ShippingProvince"><?php echo $Province; ?></span>
                                    <br>
                                    <span class="ShippingCountry"><?php echo $Country; ?></span>
                                    <br>
                                    <span class="ShippingPhone">Contact Number: <?php echo $Contact_number; ?></span>
                                    <br>
                                    <span class="Shippingemail">Email: <?php echo $Email; ?></span>
                                    <br>
                                </p>
                            </div>
                        </div>
                        <div class="invoiceShippingRow">
                            <div class="invoiceShippingHeading">
                                <h5 class="invoiveShippingHeadingH5">PAYMENT: </h5>
                            </div>
                            <div class="invoiceShippingDetails">
                                <p class="invoiceShippingDetailsPara">
                                    <span class="PaymentType">Payment Type: <?php echo $paymentOption; ?></span>
                                    <br>
                                    <?php if ($paymentOption == 'Credit/Debit Card') { 
                                        echo '<span class="CardType">Card Type:' .  $cardType . '</span>';
                                        echo '<br>';
                                    }
                                    ?>
                                    <!-- <span class="CardType">Card Type: <?php echo $cardType; ?></span>
                                    <br> -->
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="invoiceOrder">
                        <div class="invoiceShippingRow">
                            <div class="invoiceShippingHeading">
                                <h5 class="invoiveShippingHeadingH5">ORDER TOTAL: </h5>
                            </div>
                        </div>
                        <div class="invoiceShippingRow">
                            <table class="invoiceOrderTable">
                                <tr class="invoiceOrderTableRow TableSubTotal">
                                    <td class="invoiceOrderTableData">
                                        Subtotal
                                    </td>
                                    <td class="invoiceOrderTableData">
                                        Rs. <?php echo $Amount; ?>
                                    </td>
                                </tr>
                                <tr class="invoiceOrderTableRow">
                                    <td class="invoiceOrderTableData">
                                        Shipping Cost
                                    </td>
                                    <td class="invoiceOrderTableData">
                                        Rs. 0.00
                                    </td>
                                </tr>
                                <tr class="invoiceOrderTableRow">
                                    <td class="invoiceOrderTableData">
                                        Taxes
                                    </td>
                                    <td class="invoiceOrderTableData">
                                        Rs. 0.00
                                    </td>
                                </tr>
                                <tr class="invoiceOrderTableRow TableTotal">
                                    <td class="invoiceOrderTableData">
                                        You Payed
                                    </td>
                                    <td class="invoiceOrderTableData">
                                        Rs. <?php echo $Amount; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="invoiceGifRow">
                <div class="invoiceGif">
                    <img src="imgs/bike.gif" alt="" class="invoiceGifImg">
                </div>
            </div>
        </div>
    </div>

    <?php require('footer.html'); ?>

</body>
</html>