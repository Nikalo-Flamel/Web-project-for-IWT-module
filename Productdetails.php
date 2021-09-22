<?php require('config.php'); ?>

<html>
  <head>
   <link rel="stylesheet" href="css/product view.css">
   <meta name="viewport" content="width=device-width, initial-scale=1">


   <?php require('header.html'); ?>

<?php
global $con;
$id = ($_GET['id']);
$sql = "SELECT * FROM product WHERE P_ID=" .($id). "";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {             
		$Product_Name=$row['P_NameShort'];
		$Brand=$row["P_BrandName"];
		$Weight=$row["P_Weight"];
		$Warranty_Type=$row["P_WarrentyType"];
		$Quantity=$row["P_Qty"];
		$color=$row["P_Color"];
		//$specificetion=$row["specificetion"];
		$Description=$row["P_Discription"];
		$image1=$row["P_Pic1"];
		$image2=$row["P_Pic2"];
		$image3=$row["P_Pic3"];
		$Price=$row["P_Price"];
		$Material=$row["P_BodyMaterial"];
		$box=$row["P_InTheBox"];
		$Free=$row["P_FreeItems"];
	}
}
?>
<div class="padding1">
	<div class="container" >
		<div class="row">
			<div class="cal">
				<div class = "mane_img" >
					<figure><img id=featured src="<?php echo $image1; ?>" alt="short_img" /></figure>
				</div>
				<div class="row short">
				<img id="slideLeft" class="arrow" src="imgs/arrow-left.png">

				<div id="slider">
					<img class="thumbnail active" src="<?php echo $image1; ?>">
					<img class="thumbnail" src="<?php echo $image2; ?>">
					<img class="thumbnail" src="<?php echo $image3; ?>">
				</div>

				<img id="slideRight" class="arrow" src="imgs/arrow-right.png">
				</div>
			</div>
			<div class ="cal product_side">
				<div>
					<div class ="product_heading" >
						<h2><?php echo $Product_Name; ?></h2>
					</div>
					<hr>
					<div class="product-detail-side">
					<span><del>Rs <?php echo $Price; ?>.00</del></span><span class="new-price">Rs. <?php echo $Price; ?></span>                      
					</div>
					<!-- <form class="cart" method="post" action="shop-cart.html"> -->
						<div class="quantity">
							<p><?php echo $Quantity; ?></p>
							<input step="1" min="1" max="5" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" type="number"></br>
						</div>
						</br>
							<a href="Cart.php?add=<?php echo $id; ?>"><button type="" class="addbutton">Add to cart</button></a>
							<a href="Cart.php?add=<?php echo $id; ?>"><button type="" class="buybutton">buy it now</button></a>
					<!-- </form> -->
					<div class="detail-contant">
					<ul class ="value">
						<li class ="value"> Excellent quality and brand.</li>
						<li class ="value"> 100% Original Product</li>
						<li class ="value"> High-Quality Material</li>
						<li class ="value">Ideal for all occasions </li>
					</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="cal row">
		<div class="product_desc">
			<hr>
			<h3><?php echo $Product_Name; ?></h3>
			<p><?php echo $Description; ?>
			</p>
			<p>What’s in the box	:   <?php echo $box; ?> </p>
		</div>
		</div>
	</div>	
</div>

<?php require('footer.html'); ?>

<script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				console.log(activeImages)
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}
				

				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})

	</script>
</body>
 </html>