<?php 
session_start();
	$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die("Could not connect: " . mysql_error());
  }


mysql_select_db("edelivery");
  mysql_query("set character set 'utf8'",$con); 
mysql_query("SET NAMES 'utf8'",$con);


$query="Select * from customer where username='$_SESSION[username]'";
echo $query;
$rv=mysql_query($query);
$property = mysql_fetch_array($rv);
$order=$_POST[order]." ".$property[name]." ".$property[surname]." ".$property[address]." ".$property[phone_num];
echo $order;

$query1="SELECT * FROM `shop` WHERE `Name_Shop`='$_SESSION[shop]'";
echo $query1;
$rw=mysql_query($query1) or die("Query failed with error: ".mysql_error());
$property = mysql_fetch_array($rw);



  mysql_query("set character set 'utf8'",$con); 
mysql_query("SET NAMES 'utf8'",$con);

if($con)
{
			$query="INSERT INTO `edelivery`.`istoriko` (`shop`, `order`) VALUES ('".$_SESSION['shop']."', '".$_POST[order]."');";
			
mysql_query($query);

			
			$url="https://www.smsn.gr/api/http/send.php?username=billyboylim&password=2254024052&from=edelivery&message=".$order."&to=".$property['Phone']."";
}
$_SESSION['order']=$url;
echo $_SESSION['order'];

echo('<meta http-equiv="Refresh" content="1;url=finishorder.html">');

 ?>


