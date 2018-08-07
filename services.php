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
$query="INSERT INTO customer VALUES('$c_no','$c_name','$c_phn','$c_addr','$c_email')";
$result=mysql_query($query) or die(mysql_error());


$d_type=$_REQUEST['dev_type'];
$c_name=$_REQUEST['cmp_name'];
$d_ver=$_REQUEST['dev_ver'];
$clr=$_REQUEST['color'];
$query="INSERT INTO device VALUES('$c_no','$d_type','$c_name','$d_ver','$clr')";
$result=mysql_query($query) or die(mysql_error());

$p_type=$_REQUEST['prob_type'];
$p_det=$_REQUEST['prob_det'];
$query="INSERT INTO problem VALUES('$c_no','$p_type','$p_det')";
$result=mysql_query($query) or die(mysql_error());

$s_date=$_REQUEST['sub_date'];
$r_date=$_REQUEST['ret_date'];
$query="INSERT INTO date_details VALUES('$c_no','$s_date','$r_date')";
$result=mysql_query($query) or die(mysql_error());

$s_amt=$_REQUEST['ser_amt'];
$pay_type=$_REQUEST['pay_type'];
$ser_tax=null;
$query="INSERT INTO payment VALUES('$c_no','$s_amt','$pay_type','$ser_tax')";
$result=mysql_query($query) or die(mysql_error());

//fetch and display the data data

$que="SELECT * FROM customer where cust_no='$c_no'";
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

$que1="SELECT * FROM device where cust_no='$c_no'";
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

$que2="SELECT * FROM problem where cust_no='$c_no'";
$result2=mysql_query($que2) or  die(mysql_error());
$row2=mysql_fetch_array($result2);

$c_no=$row2[0];
$p_type=$row2[1];
$p_det=$row2[2];

echo "<h3>"."problem details"."</h3>";
echo "<b>"."problem type:"."</b>".$p_type."<br>"."<br>";
echo "<b>"."problem details"."</b>".$p_det."<br>"."<br>";

$que3="SELECT * FROM date_details where cust_no='$c_no'";
$result3=mysql_query($que3) or  die(mysql_error());
$row3=mysql_fetch_array($result3);

$c_no=$row3[0];
$sub_date=$row3[1];
$ret_date=$row3[2];

echo "<h3>"."date details"."</h3>";
echo "<b>"."submission date:"."</b>".$sub_date."<br>"."<br>";
echo "<b>"."return date"."</b>".$ret_date."<br>"."<br>";

$que4="SELECT * FROM payment where cust_no='$c_no'";
$result4=mysql_query($que4) or die(mysql_error());
$row4=mysql_fetch_array($result4);
$c_no=$row4[0];
$ser_amt=$row4[1];
$pay_type=$row4[2];
$ser_tax=$row[3];

echo"<table align=center border size=1 width=1000px length=1000px >";
echo "<tr><th>CUST_NO</th><th>SERVICE_CHARGE</th><th>PAYMENT TYPE</th><th>TOTAL(10% tax includes)</th></tr>";
 


echo "<tr><td>$row4[0]</td><td>$row4[1]</td><td>$row4[2]</td><td>$row4[3]</td></tr>";

echo "</table>";



?>
</body>
</html>