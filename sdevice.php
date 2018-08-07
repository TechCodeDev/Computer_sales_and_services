<html>
<head>
<img src="images/11.jpg" width=1350px height=100px/>
<hr>
<h3><b><center> DEVICE DETAILS </center></b></h3><hr>
<br>
<style>

.blue-button {
	text-decoration:none;
	font-family:arial;
	font-size:24px;
	border-radius:9px;
	padding:24px 30px;
	background-color:#03a9f4;
	color:#ffffff;
	margin-left:100px;
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

$que="SELECT * FROM scustomer where cust_no='$c_no'";
$result=mysql_query($que) or  die(mysql_error());
$row=mysql_fetch_array($result);

$c_no=$row[0];
$c_name=$row[1];
$c_addr=$row[2];
$c_phn=$row[3];
$c_email=$row[4];
echo "<h3>"."customer details"."</h3>";
echo "<b>"."customer no:"."</b>".$c_no."<br>"."<br>";
echo "<b>"."customer name:"."</b>".$c_name."<br>"."<br>";
echo "<b>"."customer address:"."</b>".$c_addr."<br>"."<br>";
echo "<b>"."customer phone no:"."</b>".$c_phn."<br>"."<br>";
echo "<b>"."customer email:"."</b>".$c_email."<br>"."<br>";


$d_no=$_REQUEST['dev_no'];
$c_name=$_REQUEST['cmp_name'];
$m_no=$_REQUEST['model_no'];
$clr=$_REQUEST['color'];
$query="INSERT INTO sdevice VALUES('$c_no','$d_no','$c_name','$m_no','$clr')";
$result=mysql_query($query) or die(mysql_error());



$var="SELECT * FROM sdevice where cust_no='$c_no'";
$result=mysql_query($var) or  die(mysql_error());
//$row1=mysql_fetch_array($result);
echo"<table border size=1>";
echo "<tr><th>CUSTOMER NO</th><th>DEVICE NO</th><th>COMPANY NAME</th><th>MODEL NO</th><th>COLOR</th>";

while($arr=mysql_fetch_row($result))
{
echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
}
echo"</table>";

?>
<br>
<br>
<br>
<a href="sdevice.html" class="blue-button">ADD</a>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="spayment.html" class="blue-button">payment details</a>
</body>
</html>