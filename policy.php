<?php
session_start();
$servername="localhost";
$username="";
$password="";
$dbname="test";
$tbl_name="policy";
$conn=mysqli_connect($servername,$username,$password,$dbname)or die(Mysqli_error());
$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));
$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
if(isset($_POST['Submit']))
{

	$cus_id=$_POST['cus_id'];
	$policy_name=$_POST['policy_name'];
    $nominee=$_POST['nominee'];
	$term=$_POST['term'];
	
	$q="SELECT policy_no FROM policy WHERE policy_no='$policy_no'";
	$cq=mysqli_query($conn,$q)or die(mysqli_error($conn));
	$ret=mysqli_num_rows($cq);
	if($ret==true)
	{
		echo "<center><h2 style='color:red'>POLICY_NO already exists</h2></center>";
	}
	else
	{
		$query="INSERT INTO policy VALUES('$policy_no','$cus_id','$policy_name','$nominee','$term')";
		mysqli_query($conn,$query) or die(mysqli_error($conn));
		echo "<center><h2 style='color:green'>Details Saved!</h2></center>";
	}
}
Mysqli_close($conn);
?>
<html>
<head>
<body style="background-color:#E5E5E5">
<title>policy details</title>
</head>
<h1 ALIGN="CENTER">policy details</h2>
<form action="" method="post">
<table border="0" align="center">
<tbody>
<tr>
<td><label for="policy_no">POLICY NUMBER:</label></td>
<td><input id="policy_no" maxlength="50" name="policy_no" type="number_format" /></td>
</tr>
<tr>
<td><label for="cus_id">CUSTOMER ID:</label></td>
<td><input id="cus_id" maxlength="50" name="cus_id" type="number_format" /></td>
</tr>
<tr>
<td><label for="policy_name">POLICY NAME:</label></td>
<td><input id="policy_name" maxlength="50" name="policy_name" type="text" /></td>
</tr>

<tr>
<td><label for="nominee">NOMINEE:</label></td>
<td><input id="nominee" maxlength="50" name="nominee" type="text" /></td>
</tr><tr>
<td><label for="term">TERM:</label></td>
<td><input id="term" maxlength="50" name="term" type="varchar" /></td>
</tr>
<tr>
<td align="right"><input name="Submit" type="Submit" value="Add" />&nbsp;<input type="reset" onClick="refresh()"></p></td>
</tr>
</tbody>
</table>
</form>
</html>
