
<!-- Bug 1 - Total does not goes to zero even if there are no products in the cart -->


<?php require('config.php'); ?>

<?php 

if (isset($_GET['add'])) {
    global $con;
    $sql = "SELECT * FROM product WHERE P_ID=" . $_GET['add'] . "";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['P_Qty'] != $_SESSION['product_' . $_GET['add']]) {
                $_SESSION['product_' . $_GET['add']]++;
                unset($_SESSION['item_total']);
                unset($_SESSION['item_qty']);
                header("Location: index.html");

            } else {
                // set_message("We only have " . $row['P_Qty'] . " {$row['P_NameLong']}s available");
                // redirect("Cart.php");
            }
        }
    // $_SESSION['product_' . $_GET['add']] += 1;
    // redirect("index.php");
    }
}

if (isset($_GET['remove'])) {
    $_SESSION['product_' . $_GET['remove']]-=1;
    if ($_SESSION['product_' . $_GET['remove']] < 1) {
        $location = "Cart.php";
        header("Location: $location");
        unset($_SESSION['item_total']);
        unset($_SESSION['item_qty']);
    } else {
        $location = "Cart.php";
        header("Location: $location");
    }
}

if (isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_qty']);
    $location = "Cart.php";
    header("Location: $location");
}


function cart() {
    $total = 0;
    $item_qty = 0;
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;
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
                        $sub = $row['P_Price'] * $value;
                        $item_qty += $value;

                        $discriptionLong = $row['P_Discription'];
                        $discription = substr($discriptionLong, 0, 200) . "...";

                        $product = <<<DELIMETER
                        <div class="product">
                            <div class="picture">
                                <img class="productImage" src="{$row['P_Pic1']}" alt="picture of a {$row['P_NameShort']}">
                            </div>
                            <div class="details">
                                <h3 id="title">{$row['P_NameShort']}</h3>
                                <h5 id="color">Color: {$row['P_Color']}</h5>
                                <p id="caption">{$discription}</p>
                                <h4 id="price">Rs. {$sub}</h4>
                            </div>
                            <div class="qty">
                                <div class="btn-group">
                                    <a href="Cart.php?add={$row['P_ID']}"><button class="btn" id="rightsidebtn">+</button></a><button class="btn">
                                        $value</button><a href="Cart.php?remove={$row['P_ID']}"><button class="btn" id="leftsidebtn">
                                        -</button></a>
                                </div>
                            </div>
                            <div class="closediv">
                                <div class="close">
                                    <a href="Cart.php?delete={$row['P_ID']}"><button class="closebutton"><img src="imgs/close.png" alt="" id="closeimage"></button></a>
                                </div>
                            </div>
                        </div>

                        
                        <input type="hidden" name="item_name_{$item_name}" value="{$row['P_NameShort']}">
                        <input type="hidden" name="item_number_{$item_number}" value="{$row['P_ID']}">
                        <input type="hidden" name="amount_{$amount}" value="{$row['P_Price']}">
                        <input type="hidden" name="quantity{$quantity}" value="{$value}">

                        DELIMETER;

                        echo $product;

                        $item_name++;
                        $item_number++;
                        $amount++;
                        $quantity++;

                        $_SESSION['item_total'] = $total += $sub;
                        $_SESSION['item_qty'] = $item_qty;
                    }
                } 
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
    <title>Sonicas Shopping Cart</title>
    <link rel="stylesheet" href="css/cart.css">
<!-- </head>
<body> -->

    <?php require('header.html'); ?>

    <!-- Nav bar -->

    <div class="nav">
        <div class="navItem" id="shoppingCart">
            <img src="imgs/writing.png" alt="" class="nav_img">
            <p>Shopping Cart</p>
        </div>
        <div class="navItem" id="shippingDetails">
            <img src="imgs/num2.png" alt="" class="nav_img">
            <p>Shipping Details</p>
        </div>
        <div class="navItem" id="payement">
            <img src="imgs/num3.png" alt="" class="nav_img">
            <p>Payement Details</p>
        </div>
    </div>

    <!-- body -->

    <div class="root">
        <div class="cartSection">
            <div class="productsSection">
                <h2 class="cartHead">Shopping Cart</h2>
                
  
                <?php echo cart(); ?>

                
                <div class="add_more">
                    <button id="add_more_btn">&#8853;   <span>Add more items</span></button>
                </div>
                <div class="more_to_love">
                    <h2 class="love">More to Love</h2>
                    <div class="moreToLove">
                        <div class="nextbtnSection nextbtnSectionRight">
                            <button class="nextbtn nextbtnLeft"><img src="imgs/previous.png" alt="" class="nextbtnimg"></button>
                        </div>
                        <div class="itemSet">
                            <div class="item">
                                <div class="itemImage">
                                    <img src="imgs/piano.jpg" class="itemImage1" alt="">
                                </div>
                                <div class="itemDetials">
                                    <p class="moretolove_title">Piano</p>
                                    <h4 class="moretolove_price">12000.00</h4>
                                    <p class="moretolove_sold">14 sold</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="itemImage">
                                    <img src="imgs/flute.jpg" class="itemImage1" alt="">
                                </div>
                                <div class="itemDetials">
                                    <p class="moretolove_title">Flute</p>
                                    <h4 class="moretolove_price" >5000.00</h4>
                                    <p class="moretolove_sold">14 sold</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="itemImage">
                                    <img src="imgs/sexo.jpg" class="itemImage1" alt="">
                                </div>
                                <div class="itemDetials">
                                    <p class="moretolove_title">Saxophone</p>
                                    <h4 class="moretolove_price">48000.00</h4>
                                    <p class="moretolove_sold">14 sold</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="itemImage">
                                    <img src="imgs/keyboard.jpg" class="itemImage1" alt="">
                                </div>
                                <div class="itemDetials">
                                    <p class="moretolove_title">Keyboard</p>
                                    <h4 class="moretolove_price">55000.00</h4>
                                    <p class="moretolove_sold">14 sold</p>
                                </div>
                            </div>
                        </div>


                        <div class="itemSet hide">
                            <div class="item">
                                <div class="itemImage">
                                    <img src="imgs/01.jpg" class="itemImage1" alt="">
                                </div>
                                <div class="itemDetials">
                                    <p class="moretolove_title">Piano X232</p>
                                    <h4 class="moretolove_price">73000.00</h4>
                                    <p class="moretolove_sold">14 sold</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="itemImage">
                                    <img src="imgs/9.png" class="itemImage1" alt="">
                                </div>
                                <div class="itemDetials">
                                    <p class="moretolove_title">Drum set</p>
                                    <h4 class="moretolove_price" >85000.00</h4>
                                    <p class="moretolove_sold">14 sold</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="itemImage">
                                    <img src="imgs/03.jpg" class="itemImage1" alt="">
                                </div>
                                <div class="itemDetials">
                                    <p class="moretolove_title">Headphones</p>
                                    <h4 class="moretolove_price">14000.00</h4>
                                    <p class="moretolove_sold">14 sold</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="itemImage">
                                    <img src="imgs/keyboard.jpg" class="itemImage1" alt="">
                                </div>
                                <div class="itemDetials">
                                    <p class="moretolove_title">Piano</p>
                                    <h4 class="moretolove_price">12000.00</h4>
                                    <p class="moretolove_sold">14 sold</p>
                                </div>
                            </div>
                        </div>



                        <div class="nextbtnSection nextbtnSectionLeft">
                            <button class="nextbtn nextbtnRight"><img src="imgs/next.png" alt="" class="nextbtnimg"></button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="summarySection">
                <h2 id="order_summary">Order Summary</h2>
                <div class="summary_details">
                    <dl>
                        <dt>Sub total</dt>
                        <dd><?php echo ( "Rs. " . (isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0") . ".00"); ?></dd>
                    </dl>
                    <dl>
                        <dt>Shipping</dt>
                        <dd>Rs. 0.00</dd>
                    </dl>
                    <dl>
                        <dt>Taxes</dt>
                        <dd>Rs. 0.00</dd>
                    </dl>
                </div>
                <hr>
                <div class="summary_total">
                    <h4>
                        <dl>
                            <dt>Estimated <br>Total</dt>
                            <dd id="totalPrice"><?php echo ( "Rs. " . (isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0") . ".00"); ?></dd>
                        </dl>
                    </h4>
                </div>
                <div class="summary_btn">
                    <a href="Shipping.php"> <button id="summary_button">Proceed to Checkout</button> </a>
                </div>

            </div>
        </div>

        <?php require('footer.html'); ?>

        <script type="text/javascript" src="js/cart.js"></script>
</body>
</html>