<html>
<head>
  <link rel="stylesheet" href="css/admin_page.css">
  <script src="js/myscripts.js"></script>

<?php require('header.html'); ?>

	<div class="contactus">
		<div class="row">
			<div class="cal">
				<div class="title">
                     <h1>Basic Information</h1>
					 <hr>
				</div>
			</div>
		</div>
	</div>
	<form class="form" method="post" action="adminsql.php">
		<div class="row1">
			<div class="basic">
				<h4>basic information</h4>
				<div class="group">
					<label class="group_label" for="Product_Name">Product Name <sup>*</sup></label>
					<div class="controls">
						<input type="text" class="input" id="Product_Name" name="Product_Name" cols="500" placeholder="Ex. d138 piano" required>
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="Brand">Brand <sup>*</sup></label>
					<div class="controls">
						<input type="text"class="input2" id="Brand" name="Brand" placeholder="input here" required>
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="Weight">Package Weight (kg) <sup>*</sup></label>
					<div class="controls">
						<input type="text" class="input2" id="Weight" name="Weight" placeholder="input here" required>
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="Warranty_Type ">Warranty Type </label>
					<div class="controls">
						<input type="text" class="input2" id="Warranty_Type" name="Warranty_Type" placeholder="input here">
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="Material">Body Material</label>
					<div class="controls">
						<input type="text" class="input2" id="Material" name="Material" placeholder="input here">
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="color">color</label>
					<div class="controls">
						<input type="text" class="input2" id="color" name="color" placeholder="input here">
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="box">What's in the box</label>
					<div class="controls">
						<input type="text" class="input2" id="box" name="box" placeholder="input here">
					</div>
				</div>
			
		</div>
		</div>
		<div class="row1">
			<div class="Description">
			
				<h4>Detailed Description</h4>
				<div class="group">
					<label class="group_label" for="specificetion">specificetion<sup>*</sup></label>
					<div class="controls">
					<input type="text" class="inputd" id="specificetion" name="specificetion" placeholder="input here" required>
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="Description">Description<sup>*</sup></label>
					<div class="controls">
						<input type="text" class="inputd" id="Description" name="Description" placeholder="input here" required>
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="image">Upload image <sup>*</sup></label>
					<div class="controls">
						<input type="file" class="input2" id="image" name="image1" placeholder="input here" required>
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="image2">Upload image</label>
					<div class="controls">
						<input type="file" class="input2" id="image2" name="image2" placeholder="input here">
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="image3">Upload image</label>
					<div class="controls">
						<input type="file" class="input2" id="image3" name="image3" placeholder="input here">
					</div>
				</div>
			
		</div>	
	</div>
	<div class="row1">
		<div class="Description">
			
				<h4>Price & Stock</h4>
				<div class="group">
					<label class="group_label" for="Price">Price<sup>*</sup></label>
					<div class="controls">
						<input type="text" class="input2" id="Price" name="Price" placeholder="input here" required>
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="Quantity">Quantity<sup>*</sup></label>
					<div class="controls">
						<input type="text" class="input2" id="Quantity" name="Quantity" placeholder="input here" required>
					</div>
				</div>
				<div class="group">
					<label class="group_label" for="Free">Free Items</label>
					<div class="controls">
						<input type="text" class="input2" id="Free" name="Free" placeholder="input here">
					</div>
				</div>
				<div class="group">
					<div class="controls">
						<input class="submitbuton" type="submit" name="btnsubmit" value="submit" />
					</div>
				</div>
			</form>
		</div>	
	</div>

	<?php require('footer.html'); ?>

</body>
