<?php require('config.php'); ?>


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

function summary_total() {
    foreach ($_SESSION as $name => $value) {
        if($value > 0) {
            if (substr($name, 0, 10) == "item_total") {
                $total = $value;
                echo $total;
            } 
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonicas Shipping Details</title>
    <link rel="stylesheet" href="css/shipping.css">

    <?php require('header.html'); ?>

    <!-- Nav bar -->
    <div class="nav">
        <div class="navItem" id="shoppingCart">
            <img src="imgs/right.png" alt="" class="nav_img">
            <p>Shopping Cart</p>
        </div>
        <div class="navItem" id="shippingDetails">
            <img src="imgs/writing.png" alt="" class="nav_img">
            <p>Shipping Details</p>
        </div>
        <div class="navItem" id="payement">
            <img src="imgs/num3.png" alt="" class="nav_img">
            <p>Payement Details</p>
        </div>
    </div>
    <!-- End of nav bar -->

    <!-- Body  -->

    <div class="root">
        <div class="cartSection">
            <div class="productsSection">
                <h2 class="cartHead">Shipping Details</h2>
                <form class="product" action="payment.php" method="post">
                    <div class = "form">

                        <div class="formRow">
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
                            <div class="formItem">
                                <label for="email" class="formLabel">Email <sup>*</sup></label>
                                <input type="email" name="email" id="email" class="formData formDataEvent" required>
                            </div>
                            <div class="formItem">
                                <label for="confirmEmail" class="formLabel">Confirm Email <sup>*</sup></label>
                                <input type="email" name="confirmEmail" id="confirmEmail" class="formData formDataEvent" required>
                            </div>
                        </div>

                        <div class="formRow dropdownRow">
                            <div class="formItem dropdownItem">
                                <div class="formDropdown">
                                    <label for="country" class="formLabel formDropdownSelectLabel">Country <sup>*</sup></label>
                                    <select name="country" id="country" class="formData formDropdownSelectData">
                                        <!-- <option value="sl">Sri lanka</option> -->


                                    </select>
                                </div>
                            </div>
                            <div class="formItem">
                                <label for="postalcode" class="formLabel">Postel Code </label>
                                <input type="text" name="postalcode" id="postalcode" class="formData formDataEvent">
                            </div>
                        </div>

                        <div class="formRow">
                            <div class="formItem">
                                <label for="adress1" class="formLabel">Address Line 1 <sup>*</sup></label>
                                <input type="text" name="adress1" id="adress1" class="formData formDataEvent" required>
                            </div>
                            <div class="formItem">
                                <label for="adress2" class="formLabel">Address Line 2 (optional)</label>
                                <input type="text" name="adress2" id="adress2" class="formData formDataEvent">
                            </div>
                        </div>

                        <div class="formRow ">
                            <div class="formItem dropdownItem province" id="formItemProvinceSelect">
                                <div class="formDropdown">
                                    <label for="province" class="formLabel formDropdownSelectLabel">State/ Province/ Region <sup>*</sup></label>
                                    <select name="province" id="province" class="formData formDropdownSelectData">
                                        <option value="Western Province">Western Province </option>
                                        <option value="Central Province">Central Province</option>
                                        <option value="Southern Province">Southern Province</option>
                                        <option value="Uwa Province">Uva Province</option>
                                        <option value="Sabaragamu Province">Sabaragamuwa Province</option>
                                        <option value="North Western Province">North Western Province</option>
                                        <option value="North Central Province">North Central Province</option>
                                        <option value="Nothern Province">Nothern Province</option>
                                        <option value="Eastern Province">Eastern Province</option>
                                    </select>
                                </div>
                            </div>
                            <div class="formItem formItemtoogle displaynone" id="formItemProvinceText">
                                <label for="province2" class="formLabel">State/ Province/ Region <sup>*</sup></label>
                                <input type="text" name="province2" id="province2" class="formData formDataEvent">
                            </div>
                            <div class="formItem">
                                <label for="city" class="formLabel">City <sup>*</sup></label>
                                <input type="text" name="city" id="city" class="formData formDataEvent" required>
                            </div>
                        </div>

                        <div class="formRow dropdownRow">
                            <div class="formItem dropdownItem countryCodeItem">
                                <div class="formDropdown">
                                    <label for="countryCode" class="formLabel formDropdownSelectLabel">Country Code </label>
                                    <select name="countryCode" id="countryCode" class="formData formDropdownSelectData">
                                        <!-- <option value="sl">Sri lanka</option> -->
                        


                                    </select>
                                </div>
                            </div>
                            <div class="formItem">
                                <label for="number" class="formLabel">Phone Number <sup>*</sup></label>
                                <input type="text" name="number" id="number" class="formData formDataEvent" required>
                            </div>
                        </div>

                        <div class="formRow">
                            <div class="formItem submitItem">
                                <input type="submit" value="Proceed to the Payement" class="formSubmit" id="ShippingFormSubmit" name="submit">
                            </div>          
                        </div>

                    </div>
                </form>
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
    
    <script type="text/javascript" src="js/shipping.js"></script>
</body>  
</html>