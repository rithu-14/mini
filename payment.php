<?php
session_start();
$servername="localhost";
$username="";
$password="";
$dbname="test";
$tbl_name="payment";
$conn=mysqli_connect($servername,$username,$password,$dbname)or die(Mysqli_error());
$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));
$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
if(isset($_POST['Submit']))
{
	$trans_no=$_POST['trans_no'];
	$policy_no=$_POST['policy_no'];
	$cus_id=$_POST['cus_id'];
	$amount=$_POST['amount'];
	$date=$_POST['date'];
	
	
	
	$q="SELECT trans_no FROM payment WHERE trans_no='$trans_no'";
	$cq=mysqli_query($conn,$q)or die(mysqli_error($conn));
	$ret=mysqli_num_rows($cq);
	if($ret==true)
	{
		echo "<center><h2 style='color:red'>TRANS_NO already exists</h2></center>";
	}
	else
	{
		$query="INSERT INTO payment VALUES('$trans_no','$policy_no','$cus_id','$amount','$date')";
		mysqli_query($conn,$query) or die(mysqli_error($conn));
		echo "<center><h2 style='color:green'>Details Saved!</h2></center>";
	}
}
Mysqli_close($conn);
?>
<html>
<head>
<body style="background-color:#E5E5E5">
<title>payment details</title>
</head>
<h1 ALIGN="CENTER">payment details</h2>
<form action="" method="post">
<table border="0" align="center">
<tbody>
<tr>
<td><label for="trans_no">TRANSACTION NO:</label></td>
<td><input id="trans_no" maxlength="50" name="trans_no" type="number_format" /></td>
</tr>
<tr>
<td><label for="policy_no">POLICY NUMBER:</label></td>
<td><input id="policy_no" maxlength="50" name="policy_no" type="number_format" /></td>
</tr>
<tr>
<td><label for="cus_id">CUSTOMER ID:</label></td>
<td><input id="cus_id" maxlength="50" name="cus_id" type="number_format" /></td>
</tr>
<tr>
<td><label for="amount">AMOUNT:</label></td>
<td><input id="amount" maxlength="100" name="amount" type="varchar" /></td>
</tr>
<tr>
<td><label for="date">DATE:</label></td>
<td><input id="date" maxlength="50" name="date" type="date_create" /></td>
</tr>
<tr>
<td align="right"><input name="Submit" type="Submit" value="Add" />&nbsp;<input type="reset" onClick="refresh()"></p></td>
</tr>
</tbody>
</table>
</form>
</html>
