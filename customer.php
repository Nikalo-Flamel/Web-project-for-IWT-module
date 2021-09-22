<?php
require 'session.php';
require('db.php');
?>

<!-- <!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/userprofile.css">
    <link rel="stylesheet" href="css/header.css">
  </head> -->
 

    
    
  <?php

  //print_r($_SESSION['customer']['C_ID']);
  $sql = "SELECT * FROM customer WHERE C_ID='".$_SESSION['customer']['C_ID']."'";
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $C_ID=$row["C_ID"];
            $C_Name=$row["C_Name"];
      $C_Email=$row["C_Email"];
      $C_Username=$row["C_Username"];
      $C_Password=$row["C_Password"];
    }
  }

  ?>


<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/userprofile.css">
  </head>
  <body>
    <div class="navbar">
      <img class="profilepic" src="imgs/profile.png" alt="users">
                  <h4><?php echo $C_Name;?></h4>
      <div class="bar">
        <ul>
          <li><a href="../user/user_profile.html"><img src="imgs/picon.png"> Profile</a></li>
          <li><a href="wishlist.asp"><img src="imgs/wicon.png"> Wishlist</a></li>
          <li><a href="recent.asp"><img src="imgs/ricon.png"> Recent orders</a></li>
          <li><a href="cart.asp"><img src="imgs/cart.png"> Cart</a></li>
        </ul>
      </div>
    </div>
    <div class="contain">
      <h3><img src="imgs/edit.png"> Update Account</h3>
      <hr>
      <form>
        <div class="input_field">
          <label for="fname" >Full Name</label><br>
        <input type="text" name="fname" id="cfname" value="<?php echo $C_Name;?>"><br><br>
        </div>
        
        <div class="input_field">
          <label for="cnum">Contact Number</label><br>
        <input type="text" name="Cnum" id="ccnum"><br><br>
        </div>
        
        <div class="input_field">
          <label for="addr">Address</label><br>
        <textarea  id="caddress" name="addr" rows="4" cols="40"></textarea><br><br>
        </div>
        
        <div class="input_field">

          <label for="email" >Email Address</label><br>
        <input type="text" name="email" id="cemail" value="<?php echo $C_Email;?>"><br><br>
        </div>
        
        <div class="input_field">
          <label for="password">Password</label><br>
        <input type="password" name="password" id="cpassword" value="<?php echo $C_Password;?>" ><br><br><br><br>
        </div>
        

        <button type="submit" value="Update" name="updatebtn">Update</button>
        <button type="reset" value="Reset" name="cancelbtn">Reset</button><br><br>

        <?php
        if ($C_Email == "kamal@manager.com") {
          echo "<a href='admin page.php' id='adminpage'>Admin Page</a>";
        }
        ?>


      </form>
     

    </div>
    
    <!-- <?php require('footer.html'); ?> -->

  </body>
</html>