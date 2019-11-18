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
$count=mysqli_num_rows($result);
?>
<table width="483" height="96" border="1">
<tr>
<td width="75">TRANSACTION NUMBER</td>
<td width="75">POLICY NUMBER</td>
<td width="75">CUSTOMER ID</td>
<td width="75">AMOUNT</td>
<td width="75">DATE</td>

</tr>
<?php if($count>0)
{
	while($row=mysqli_fetch_assoc($result))
	{?>
<tr>
<td>&nbsp;<?php echo $row['trans_no'];?></td>
<td>&nbsp;<?php echo $row['policy_no'];?></td>
<td>&nbsp;<?php echo $row['cus_id'];?></td>
<td>&nbsp;<?php echo $row['amount'];?></td>
<td>&nbsp;<?php echo $row['date'];?></td>

</tr>
	<?php }
}
else
{
	echo "0 results";
}mysqli_close($conn);?>