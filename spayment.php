<html>
<head>
<img src="images/11.jpg" width=1350px height=100px/>
<hr>
<h3><b><center> CUSTOMER BILL </center></b></h3><hr>
<br>
<style>

.blue-button {
	text-decoration:none;
	font-family:arial;
	font-size:24px;
	border-radius:9px;
	padding:15px 20px;
	background-color:#03a9f4;
	color:#ffffff;
	margin-left:px;
}
.blue-button:hover {
	text-decoration:none;
	background-color:#015798;
	color:#ffffff;
	transition:0.5s;
}
body {
	padding:0px;
}
</style>
</head>
<body>
<?php
$dbh=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('csas') or die(mysql_error());

$c_no=$_REQUEST['cust_no'];
$d_no=$_REQUEST['dev_no'];
$p_cost=$_REQUEST['ser_amt'];
$pay_type=$_REQUEST['pay_type'];
$total=null;
$query="INSERT INTO spayment VALUES('$c_no','$d_no','$p_cost','$pay_type','$total')";
$result=mysql_query($query) or die(mysql_error());

$que="SELECT * FROM scustomer where cust_no='$c_no'";
$result=mysql_query($que) or  die(mysql_error());
$row=mysql_fetch_array($result);

$c_no=$row[0];
$c_name=$row[1];
$c_phn=$row[2];
$c_addr=$row[3];
$c_email=$row[4];
echo "<h3>"."customer details"."</h3>";
echo "<b>"."customer no:"."</b>".$c_no."<br>"."<br>";
echo "<b>"."customer name:"."</b>".$c_name."<br>"."<br>";
echo "<b>"."customer phone no:"."</b>".$c_phn."<br>"."<br>";
echo "<b>"."customer address:"."</b>".$c_addr."<br>"."<br>";
echo "<b>"."customer email:"."</b>".$c_email."<br>"."<br>";

$var="SELECT * FROM sdevice where cust_no='$c_no'";
$result=mysql_query($var) or  die(mysql_error());
//$row1=mysql_fetch_array($result);
echo"<table align=center border size=1 width=1000px height=500px>";
echo "<tr><th>CUSTOMER NO</th><th>DEVICE NO</th><th>COMPANY NAME</th><th>MODEL NO</th><th>COLOR</th>";

while($arr=mysql_fetch_row($result))
{
echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
}
echo"</table>";
echo"<br>";
echo"<br>";

$que4="SELECT * FROM spayment where cust_no='$c_no'";
$result4=mysql_query($que4) or die(mysql_error());
//$row4=mysql_fetch_array($result4);

echo"<table align=center border size=1 width=1000px height=500px>";
echo "<tr><th>CUSTOMER NO</th><th>DEVICE NO</th><th>AMOUNT</th><th>PAYMENT TYPE</th><th>TOTAL(5%discount)</th>";

while($arr=mysql_fetch_row($result4))
{
echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
}
echo"</table>";
echo"<br>";
echo"<br>";
//$c_no=$row4[0];
//$d_no=$row4[1];
//$p_cost=$row4[2];
//$pay_type=$row4[3];
//$total=$row4[4];
//echo"<table align=center border size=1 width=1000px length=1000px >";
//echo "<tr><th>CUST_NO</th><th>DEV_NO</th><th>PRODUCT COST</th><th>PAYMENT TYPE</th><th>TOTAL</th></tr>";
 


//echo "<tr><td>$row4[0]</td><td>$row4[1]</td><td>$row4[2]</td><td>$row4[3]</td><td>$row4[4]</td></tr>";

//echo "</table>";
?>
<br>
<a href="spayment.html" class="blue-button">ADD</a>
<br><br><br>
<a href="index.html" class="blue-button">HOME</a>
</body>
</html>