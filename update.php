<html>
<head>
<img src="images/11.jpg" width=1350px height=100px/>
<hr>
<h3><b><center> DATABASE </center></b></h3><hr>
<br>
		
</head>
<body>
<?php
$dbh=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('csas') or die(mysql_error());

echo '<h2>SERVICE DATABASE</h2>';
echo "custmer details before update";
$var="SELECT * FROM date_details";
$result=mysql_query($var) or  die(mysql_error());
//$row=mysql_fetch_array($result);

echo"<table border size=1 align=center width=1000px height=500px>";
echo "<tr><th>CUSTOMER NO</th><th>submission date</th><th>return date</th></tr>";
while($arr=mysql_fetch_row($result))
{
	echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td></tr>";
}
echo"</table>";
echo"<br>";
echo"<br>";


$c_no=$_REQUEST['cust_no'];
$ret_date=$_REQUEST['ret_date'];

$que="UPDATE date_details SET ret_date='$ret_date' where cust_no='$c_no'";
$RESULT=mysql_query($que) or die(mysql_error());
echo "customer details after update";

echo '<h2>SERVICE DATABASE</h2>';
$var="SELECT * FROM date_details";
$result=mysql_query($var) or  die(mysql_error());
//$row=mysql_fetch_array($result);

echo"<table border size=1 align=center width=1000px height=500px>";
echo "<tr><th>CUSTOMER NO</th><th>submission date</th><th>return date</th></tr>";
while($arr=mysql_fetch_row($result))
{
	echo"<tr><td>$arr[0]</td><td>$arr[1]</td><td>$arr[2]</td></tr>";
}
echo"</table>";
echo"<br>";
echo"<br>";

?>
<br>
<br>
<br>

</body>
</html>