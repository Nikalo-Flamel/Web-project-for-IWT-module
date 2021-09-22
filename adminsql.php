<?php
require_once ("config.php");

if(isset($_POST["btnsubmit"])){
    $Product_Name=$_POST["Product_Name"];
    $Brand=$_POST["Brand"];
    $Weight=$_POST["Weight"];
    $Warranty_Type=$_POST["Warranty_Type"];
	$Quantity=$_POST["Quantity"];
    $color=$_POST["color"];
	$specificetion=$_POST["specificetion"];
    $Description=$_POST["Description"];
	$image1=$_POST["image1"];
	$image2=$_POST["image2"];
	$image3=$_POST["image3"];
    $Price=$_POST["Price"];
	$Material=$_POST["Material"];
	$box=$_POST["box"];
    $Free=$_POST["Free"];

    $sql="INSERT INTO product(P_NameShort,P_Color,P_Discription,P_Discription_Short,P_Price,P_Pic1,P_Pic2,P_Pic3,P_Qty,P_BrandName,P_Weight,P_WarrentyType,P_BodyMaterial,P_InTheBox,P_FreeItems) VALUES('$Product_Name','$color','$Description','$specificetion','$Price','$image1','$image2','$image3','$Quantity','$Brand','$Weight','$Warranty_Type','$Material','$box','$Free')";
    $result=$con->query($sql);
  
  
if($result){
    echo "inserted successfully"."<br>";
}else{
    echo "erro: ". $con->error;
}
}





$con->close();

header("Location: index.html");
?>