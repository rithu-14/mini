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
$cus_id=$_POST['cus_id'];

$sel="select * from customer where cus_id='$cus_id'";

$cq=mysqli_query($conn,$sel) or die(mysqli_error($conn));
$ret=mysqli_num_rows($cq);
if($ret==false)
	{
		echo "<center><h2 style='color:red'>CUS_ID Does not exists</h2></center>";
		
	}
	else
	{
		$sel="delete from customer where cus_id='$cus_id'";
		$cq=mysqli_query($conn,$sel)or die(mysqli_error($conn));
		echo "<center><h2 style='color:red'>Customer details deleted</h2></center>";
}
}
Mysqli_close($conn);
?>
<html>
<head>
<body style="background-color:#E5E5E5">
<title>registration form</title>
</head>
<form action="" method="post">
<table border="0" align="center">
<tbody>
<tr>
<td><label for="cus_id">Enter CUS_ID to be deleted:</label></td>
<td><input id="cus_id" maxlength="50" name="cus_id" type="number_format"/></td>
</tr>
<tr>
<td align="right"><input name="Submit" type="Submit" value="Delete"/>&nbsp;<input type="reset" onClick="refresh()"></p></td>
</tr>
</tbody>
</table>
</form>
</html>
