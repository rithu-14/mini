<?php
session_start();
$servername="localhost";
$username="";
$password="";
$dbname="test";
$tbl_name="customer";
$conn=mysqli_connect($servername,$username,$password,$dbname)or die(Mysqli_error());
$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));
$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
if(isset($_POST['Submit']))
{

	$portal_name=$_POST['portal_name'];
	$cus_name=$_POST['cus_name'];
	$address=$_POST['address'];
	
	$q="SELECT cus_id FROM customer WHERE cus_id='$cus_id'";
	$cq=mysqli_query($conn,$q)or die(mysqli_error($conn));
	$ret=mysqli_num_rows($cq);
	if($ret==true)
	{
		echo "<center><h2 style='color:red'>CUS_ID already exists</h2></center>";
	}
	else
	{
		$query="INSERT INTO customer VALUES('$cus_id','$portal_name','$cus_name','$address')";
		mysqli_query($conn,$query) or die(mysqli_error($conn));
		echo "<center><h2 style='color:green'>Details Saved!</h2></center>";
	}
}
Mysqli_close($conn);
?>
<html>
<head>
<body style="background-color:#E5E5E5">
<title>registration form</title>
</head>
<h1 ALIGN="CENTER">Registration form</h2>
<form action="" method="post">
<table border="0" align="center">
<tbody>
<tr>
<td><label for="portal_name">PORTAL NAME:</label></td>
<td><input id="portal_name" maxlength="50" name="portal_name" type="varchar" /></td>
</tr>
<tr>
<td><label for="cus_name">CUSTOMER NAME:</label></td>
<td><input id="cus_name" maxlength="50" name="cus_name" type="text" /></td>
</tr>
<tr>
<td><label for="address">ADDRESS:</label></td>
<td><input id="address" maxlength="50" name="address" type="text" /></td>
</tr>
<tr>
<td align="right"><input name="Submit" type="Submit" value="Add" />&nbsp;
<input type="reset" onClick="refresh()"></p></td>
<td align="right">
</td>
</td>
<div class="media col-sm-4">
<td align="right">
<input name="Submit" type="Submit" value="next"/>&nbsp;
    <a class="pull-left" href="policy.php?page=<?php echo $name; ?>">
		 
</a>
</td>
</div>
<div>
</tbody>
</table>
</form>
</html>
