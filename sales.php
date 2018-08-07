<html>
<head>
<img src="images/11.jpg" width=1350px height=100px/>
<hr>
<h3><b><center> SERVICE ACKNOWLEDGMENT </center></b></h3><hr>
<br>
</head>
<body>
<?php
$dbh=mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('csas') or die(mysql_error());

// insert the data

$c_no=$_REQUEST['cust_no'];
$c_name=$_REQUEST['cust_name'];
$c_phn=$_REQUEST['cust_phn'];
$c_addr=$_REQUEST['cust_addr'];
$c_email=$_REQUEST['cust_email'];
$query="INSERT INTO scustomer VALUES('$c_no','$c_name','$c_phn','$c_addr','$c_email')";
$result=mysql_query($query) or die(mysql_error());

$d_type=$_REQUEST['dev_type'];
$c_name=$_REQUEST['cmp_name'];
$d_ver=$_REQUEST['dev_ver'];
$clr=$_REQUEST['color'];
$query="INSERT INTO sdevice VALUES('$c_no','$d_type','$c_name','$d_ver','$clr')";
$result=mysql_query($query) or die(mysql_error());

$p_cost=$_REQUEST['ser_amt'];
$pay_type=$_REQUEST['pay_type'];
$total=null;
$query="INSERT INTO spayment VALUES('$c_no','$p_cost','$pay_type','$total')";
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

$que1="SELECT * FROM sdevice where cust_no='$c_no'";
$result1=mysql_query($que1) or  die(mysql_error());
$row1=mysql_fetch_array($result1);

$c_no=$row1[0];
$d_type=$row1[1];
$c_name=$row1[2];
$d_ver=$row1[3];
$clr=$row1[4];
echo "<h3>"."device details"."</h3>";
echo "<b>"."device type:"."</b>".$d_type."<br>"."<br>";
echo "<b>"."company name:"."</b>".$c_name."<br>"."<br>";
echo "<b>"."device version:"."</b>".$d_ver."<br>"."<br>";
echo "<b>"."color:"."</b>".$clr."<br>"."<br>";

$que4="SELECT * FROM spayment where cust_no='$c_no'";
$result4=mysql_query($que4) or die(mysql_error());
$row4=mysql_fetch_array($result4);
$c_no=$row4[0];
$p_cost=$row4[1];
$pay_type=$row4[2];
$total=$row4[3];
echo"<table align=center border size=1 width=1000px length=1000px >";
echo "<tr><th>CUST_NO</th><th>PRODUCT COST</th><th>PAYMENT TYPE</th><th>TOTAL</th></tr>";
 


echo "<tr><td>$row4[0]</td><td>$row4[1]</td><td>$row4[2]</td><td>$row4[3]</td></tr>";

echo "</table>";