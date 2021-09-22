<?php require('config.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>SONIDOS|Search result</title>
		<link rel = "stylesheet" href= "css/search.css">
	

		<?php require('header.html'); ?>

		<h1>SEARCH RESULT...</h1>
		<form method="post" action="search.php">
			<h3><i>Search Your Requirement Here </i></h3>
			
			<input type="text" name="result" placeholder="search">
			<input type="submit" value="Submit" name="btnSubmit">
			<input type="reset" value="Reset">
		</form>

		<div class="full">
			<div class=" product_style">
				<div class="row">



					<?php
							
					if((isset($_POST["btnSubmit"])) || isset($_POST["result"])) {
						$Name = $_POST["result"];
						global $con;
						$sql= "SELECT * FROM product where P_Category LIKE '%$Name%'";
						if($result=$con->query($sql)){
							if($result->num_rows > 0){
								echo ("<table border='1'>");
								while($row = $result->fetch_assoc()){

									$product = <<<DELIMETER
									
										<div class="full product">
											<div class="product_img">
												<div class="center"> 
													<img src="{$row['P_Pic1']}" alt="1232"/>
													<div class="buy_it_now">
														<a class="add-bt" href="product_detail3.html">+ Buy It Now</a> 
													</div>
												</div>
											</div>
											<a href="productDetails.php?id= {$row['P_ID']}">
												<div class="product_detail text_align_center">
													<p class="product_price">RS. {$row['P_Price']} <span class="old_price">Rs.38,000.00</span></p>
													<p class="product_dis">{$row['P_NameShort']}</p>
												</div>
											</a>
										</div>
									

									DELIMETER;

									echo $product;

								}
							}else{
									echo "no results";
							}
						}
					}
					?>



				</div>
			</div>
		</div>

		

	</body>
</html>
