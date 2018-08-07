<html>
<head>
<img src="images/11.jpg" width=1350px height=100px/>
<hr>
<h3><b><center> CUSTOMER DETAILS </center></b></h3><hr>
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
	margin-left:0px;
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

// insert the data

$c_no=$_REQUEST['cust_no'];
$c_name=$_REQUEST['cust_name'];
$c_addr=$_REQUEST['cust_addr'];
$c_phn=$_REQUEST['cust_phn'];

$c_email=$_REQUEST['cust_email'];
$query="INSERT INTO scustomer VALUES('$c_no','$c_name','$c_addr','$c_phn','$c_email')";
$result=mysql_query($query) or die(mysql_error());

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
echo "<b>"."customer phone:"."</b>".$c_phn."<br>"."<br>";
echo "<b>"."customer email:"."</b>".$c_email."<br>"."<br>";

echo "<h3>"."REFFER TABLE GIVEN BELOW TO ENTER DEVICE NUMBER"."</h3>";

$var="SELECT * FROM dev_details";
$result=mysql_query($var) or  die(mysql_error());
//$row1=mysql_fetch_array($result);
echo"<table border size=1>";
echo "<tr><th>DEVICE NO</th><th>DEVICE TYPE</th>";

while($arr=mysql_fetch_row($result))
{
echo"<tr><td>$arr[0]</td><td>$arr[1]</td></tr>";
}
echo"</table>";

?>
<br>
<a href="sdevice.html" class="blue-button">device details</a>
<br>

</body>
</html>