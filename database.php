<html>

<head>
<img src="images/11.jpg" width=1350px height=100px/>
<hr>
<h3><b><center> DATABASE </center></b></h3><hr>
<br>
</head>
<body ">
<?php
$dbh=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('csas') or die(mysql_error());

echo '<h2>SERVICE DATABASE</h2>';
$var="SELECT * FROM customer";
$result=mysql_query($var) or  die(mysql_error());
//$row=mysql_fetch_array($result);

echo"<table border size=1 align=center width=1000px height=500px>";
echo "<tr><th>CUSTOMER NO</th><th>CUSTOMER NAME</th><th>CUSTOMER ADDRESS</th><th>CUSTOMER PHONE</th><th>CUSTOMER EMAIL</th></tr>";
while($arr=mysql_fetch_row($result))
{
	echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
}
echo"</table>";
echo"<br>";
echo"<br>";

$var4="SELECT * FROM payment";
$result4=mysql_query($var4) or die(mysql_error());
//$row4=mysql_fetch_array($result4);

echo"<table border size=1 align=center width=1000px height=500px>";
echo "<tr><th>CUST_NO</th><th>SERVICE_CHARGE</th><th>PAYMENT TYPE</th><th>SERVICE TAX</th></tr>";
while($arr=mysql_fetch_row($result4))
{
	echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td></tr>";
}
echo"</table>";
echo"<br>";
echo"<br>";

$db_host="localhost";
$db_name="csas";
$db_user="root";
$db_pass="";
$con=mysql_connect("$db_host","$db_user","$db_pass") or die("could not connect");
mysql_select_db('csas') or die(mysql_error());
$po=mysql_query("call total(@out);");
$rs=mysql_query('select@out');
$row=mysql_fetch_row($rs);

echo 'TOTAL SERVICE REVENUE='.$row[0];



echo "<h2>SALES DATABASE</H2>";


$var1="SELECT * FROM scustomer";
$result1=mysql_query($var1) or  die(mysql_error());
$row=mysql_fetch_array($result1);

echo"<table border size=1 align=center width=1000px height=500px>";
echo "<tr><th>CUSTOMER NO</th><th>CUSTOMER NAME</th><th>CUSTOMER PHONE</th><th>CUSTOMER PHONE</th><th>CUSTOMER EMAIL</th></tr>";
while($arr=mysql_fetch_row($result1))
{
	echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
}
echo"</table>";
echo"<br>";
echo"<br>";

$que4="SELECT * FROM spayment ";
$result4=mysql_query($que4) or die(mysql_error());
//$row=mysql_fetch_array($result4);

echo"<table align=center border size=1 width=1000px height=500px>";
echo "<tr><th>CUSTOMER NO</th><th>DEVICE NO</th><th>AMOUNT</th><th>PAYMENT TYPE</th><th>TOTAL</th>";

while($arr=mysql_fetch_row($result4))
{
echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td><td>$arr[3]</td><td>$arr[4]</td></tr>";
}
echo"</table>";
$db_host="localhost";
$db_name="csas";
$db_user="root";
$db_pass="";
$con=mysql_connect("$db_host","$db_user","$db_pass") or die("could not connect");
mysql_select_db('csas') or die(mysql_error());
$po1=mysql_query("call totalrevenue(@out);");
$rs1=mysql_query('select@out');
$row=mysql_fetch_row($rs1);

echo'TOTAL SALES REVENUE='.$row[0];



?>
</body>
</html>

