<?php require('config.php'); ?>

<?php 
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = (isset($_POST['lastname']) ? $_POST['lastname'] : ' ');
    $email = $_POST['email'];
    $country = $_POST['country'];
    $postalcode = (isset($_POST['postalcode']) ? $_POST['postalcode'] : ' ');
    $adress1 = $_POST['adress1'];
    $adress2 = (isset($_POST['adress2']) ? $_POST['adress2'] : ' ');
    $city = $_POST['city'];
    $countryCode = $_POST['countryCode'];
    $number = $_POST['number'];

    if ($countryCode == +94) {
        $province = $_POST['province'];
    } else {
        $province = $_POST['province2'];
    }

    $contactnumber = $countryCode . $number;


    $S_ID = uniqid();
    $_SESSION['S_ID'] = $S_ID;

    $S_Total = $_SESSION['item_total'];

    global $con;
    $sql = "INSERT INTO shiping (S_ID, F_Name, L_Name, Email, Country, Postal_Code, Province, City, Adrress_Line_1, Adrress_Line_2, Contact_number, Amount) 
    VALUES ('$S_ID', '$firstname', '$lastname', '$email', '$country', '$postalcode', '$province', '$city', '$adress1', '$adress2', '$contactnumber', '$S_Total')";
    if(!($con->query($sql))){
        echo "Error:". $con->error;
    }

}
?>

<?php
function summary_product() {
    $item_name = 0;
    $item_qty = 0;
    $item_price = 0;
    $item_img = "";
    foreach ($_SESSION as $name => $value) {
        if($value > 0) {
            if (substr($name, 0, 8) == "product_") {
                $length = strlen($name) - 8;
                $id = substr($name, 8, $length);
    
                global $con;
                $sql = "SELECT * FROM product WHERE P_ID=" . $id . "";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $item_name = $row['P_NameShort'];
                        $item_img = $row['P_Pic1'];
                        $item_price = $row['P_Price'] * $value;
                        $item_qty += $value;

                        $product = <<<DELIMETER
                        <div class="summaryRow">
                            <div class="summaryProduct">
                                <div class="summaryProductImage">
                                    <img src="{$item_img}" alt="" class="summaryProductImageFile">
                                </div>
                                <div class="summaryProductDetails">
                                    <h5 class="summaryProductDetailsH5">{$item_name}</h5>
                                    <p class="summaryProductDetailsPrice">Rs {$item_price}.00</p>
                                </div>
                            </div>
                        </div>

                        DELIMETER;

                        echo $product;
                    }
                }
            }
        }
    }
}

// function summary_total() {
//     foreach ($_SESSION as $name => $value) {
//         if($value > 0) {
//             if (substr($name, 0, 10) == "item_total") {
//                 $total = $value;
//                 echo $total;
//             } 
//         }
//     }
// }

function summary_total() {
    $total = $_SESSION['item_total'];
    echo $total;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payement Details</title>
    <link rel="stylesheet" href="css/payment.css">


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
            <img src="imgs/writing.png" alt="" class="nav_img">
            <p>Payement Details</p>
        </div>
    </div>
    <!-- End of nav bar -->

    <!-- Body  -->

    <div class="root">
        <div class="cartSection">
            <div class="productsSection">
                <h2 class="cartHead">Payment Details</h2>
                <div class="product">
                    <form class = "form" method = "POST" action="Order_placed.php">

                        <div class="formRow formRowHeading">
                            <h4 class='formRowHeadingH'>Payment Method: </h4>
                        </div>
                        <div class="formRow paymentOptionRadio">
                            <div class="paymentOption">
                                <div class="paymentOptionInput">
                                    <input type="radio" id="cardOption" name="paymentOption" value="Credit/Debit Card">
                                </div>
                                <label for="cardOption" class="formLabel paymentOptionLabel">
                                    <div class="paymentOptionLabelImg">
                                        <img src="imgs/card.png" alt="Card Payment" class="paymentOptionImg">
                                    </div>
                                    <div class="paymentOptionLabelDis">
                                        <p class="paymentOptionLabelDisP">Card Payment</p>
                                    </div>
                                </label>
                            </div>
                            <div class="paymentOption">
                                <div class="paymentOptionInput">
                                    <input type="radio" id="cash" name="paymentOption" value="Cash on Delievery">
                                </div>
                                <label for="cash" class="formLabel paymentOptionLabel">
                                    <div class="paymentOptionLabelImg">
                                        <img src="imgs/cash.png" alt="Cash On Delievary" class="paymentOptionImg">
                                    </div>
                                    <div class="paymentOptionLabelDis">
                                        <p class="paymentOptionLabelDisP">Cash on Delievary</p>
                                    </div>
                                </label>
                            </div>
                            <div class="paymentOption">
                                <div class="paymentOptionInput">
                                    <input type="radio" id="paypal" name="paymentOption" value="PayPal">
                                </div>
                                <label for="paypal" class="formLabel paymentOptionLabel">
                                    <div class="paymentOptionLabelImg">
                                        <img src="imgs/paypal1.png" alt="Paypal" class="paymentOptionImg">
                                    </div>
                                    <div class="paymentOptionLabelDis">
                                        <p class="paymentOptionLabelDisP">Paypal</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <hr><hr>
                        <div class="formRow formRowHeading formEvent">
                            <h4 class='formRowHeadingH'>Card Details: </h4>
                        </div>

                        <div class="formRow paymentOptionRadio formEvent">
                            <div class="cartType">
                                <div class="paymentOptionInput cardTypeInput">
                                    <input type="radio" id="visa" name="cardType" value="Visa">
                                </div>
                                <label for="visa" class="formLabel paymentOptionLabel">
                                    <div class="paymentOptionLabelImg">
                                        <img src="imgs/visa.png" alt="Visa card" class="cardTypeImg">
                                    </div>
                                    <div class="paymentOptionLabelDis">
                                        <p class="paymentOptionLabelDisP">Visa</p>
                                    </div>
                                </label>
                            </div>
                            <div class="cartType">
                                <div class="paymentOptionInput">
                                    <input type="radio" id="american" name="cardType" value="American Express">
                                </div>
                                <label for="american" class="formLabel paymentOptionLabel">
                                    <div class="paymentOptionLabelImg">
                                        <img src="imgs/american.png" alt="American Express" class="cardTypeImg">
                                    </div>
                                    <div class="paymentOptionLabelDis">
                                        <p class="paymentOptionLabelDisP">American Express</p>
                                    </div>
                                </label>
                            </div>
                            <div class="cartType">
                                <div class="paymentOptionInput">
                                    <input type="radio" id="others" name="cardType" value="Other">
                                </div>
                                <label for="others" class="formLabel paymentOptionLabel">
                                    <div class="paymentOptionLabelImg">
                                        <img src="imgs/others.png" alt="Other cards" class="cardTypeImg">
                                    </div>
                                    <div class="paymentOptionLabelDis">
                                        <p class="paymentOptionLabelDisP">Others</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="formRow formEvent">
                            <div class="formItem">
                                <label for="cardnumber" class="formLabel">Card Number <sup>*</sup></label>
                                <input type="text" name="cardnumber" id="cardnumber" class="formData formDataEvent" required>
                            </div>
                            <div class="formItem">

                            </div>
                        </div>

                        <div class="formRow formEvent">
                            <div class="formItem">
                                <label for="exdate" class="formLabel">Expire Date <sup>*</sup></label>
                                <input type="text" name="exdate" id="exdate" class="formData formDataEvent" required>
                            </div>
                            <div class="formItem">
                                <label for="securitycode" class="formLabel">Security Code <sup>*</sup></label>
                                <input type="text" name="securitycode" id="securitycode" class="formData formDataEvent" required>
                            </div>
                        </div>
                        <div class="formRow formEvent">
                            <div class="formItem">
                                <label for="firstname" class="formLabel">First Name <sup>*</sup></label>
                                <input type="text" name="firstname" id="firstname" class="formData formDataEvent" required>
                            </div>
                            <div class="formItem">
                                <label for="lastname" class="formLabel">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="formData formDataEvent">
                            </div>
                        </div>
                
                        <div class="formRow">
                            <div class="formItem submitItem">
                                <input type="submit" value="Buy" class="formSubmit" id="ShippingFormSubmit" name="submit">
                            </div>          
                        </div>

                    </form>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="summarySection">
                <h2 id="order_summary">Order Summary</h2>
                <div class="summary_details">


                    <?php echo summary_product(); ?>

                    <!-- <div class="summaryRow">
                        <div class="summaryProduct">
                            <div class="summaryProductImage">
                                <img src="imgs/drum.jpg" alt="" class="summaryProductImageFile">
                            </div>
                            <div class="summaryProductDetails">
                                <h5 class="summaryProductDetailsH5">Drums</h5>
                                <p class="summaryProductDetailsPrice">Rs 2000.00</p>
                            </div>
                        </div>
                    </div> -->

                    

                </div>
                <hr>
                <div class="summary_total">
                    <h4>
                        <dl>
                            <dt>Estimated Total</dt>
                            <dd id="totalPrice">Rs. <?php echo summary_total(); ?></dd>
                        </dl>
                    </h4>
                </div>
                <!-- <div class="summary_btn">
                    <button id="summary_button">Proceed to Payement</button>
                </div> -->

            </div>
            <!-- End os summary section -->

        </div>

        <?php require('footer.html'); ?>

    <script type="text/javascript" src="js/payment.js"></script>
</body>  
</html>