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
$c_no=$_REQUEST['cust_no'];

$que="DELETE FROM customer where cust_no='$c_no'";
$RESULT=mysql_query($que) or die(mysql_error());
echo "data deleted successfully";

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

?>
<br>
<br>
<br>

</body>
</html>