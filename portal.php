<?php
session_start();
$servername="localhost";
$username="";
$password="";
$dbname="test";
$tbl_name="portal";
$conn=mysqli_connect($servername,$username,$password,$dbname)or die(Mysqli_error());
$select_db=mysqli_select_db($conn,$dbname)or die(mysqli_error($conn));
$sql="SELECT * FROM $tbl_name";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
if(isset($_POST['Submit']))
{
	$portal_name=$_POST['portal_name'];
	$year_of_est=$_POST['year_of_est'];
	
	$q="SELECT portal_name FROM portal WHERE portal_name='$portal_name'";
	$cq=mysqli_query($conn,$q)or die(mysqli_error($conn));
	$ret=mysqli_num_rows($cq);
	if($ret==true)
	{
		echo "<center><h2 style='color:red'>PORTAL_NAME already exists</h2></center>";
	}
	else
	{
		$query="INSERT INTO portal VALUES('$portal_name','$year_of_est')";
		mysqli_query($conn,$query) or die(mysqli_error($conn));
		echo "<center><h2 style='color:green'>Details Saved!</h2></center>";
	}
}
Mysqli_close($conn);
?>
<html>
<head>
<body style="background-color:#E5E5E5">
<title>insertion form</title>
</head>
<h1 ALIGN="CENTER">Insertion form</h2>
<form action="" method="post">
<table border="0" align="center">
<tbody>
<tr>
<td><label for="portal_name">PORTAL NAME:</label></td>
<td><input id="portal_name" maxlength="50" name="portal_name" type="varchar" /></td>
</tr>
<tr>
<td><label for="year_of_est">YEAR OF ESTABLISHMENT:</label></td>
<td><input id="year_of_est" maxlength="50" name="year_of_est" type="date_create" /></td>
</tr>
<tr>
<td align="right"><input name="Submit" type="Submit" value="Add" />&nbsp;<input type="reset" onClick="refresh()"></p></td>
</tr>
</tbody>
</table>
</form>
</html>
