<?php 
session_start(); 

$con = mysql_connect("localhost","root","");

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

$onoma = mb_convert_encoding($_POST[username], "utf-8", "auto");
mysql_select_db("edelivery", $con);
 mysql_query("set character set 'utf8'",$con); 
mysql_query("SET NAMES 'utf8'",$con);



$result=mysql_query("SELECT * FROM customer WHERE username='$onoma' and password='$_POST[password]'");
$count=mysql_num_rows($result);

if($count==1){
$_SESSION['id']=session_id();
$_SESSION['login']=1;
$_SESSION['username']=$_POST[username];
$_SESSION['password']=$_POST[password];
echo('<meta http-equiv="Refresh" content="1;url=index.php">');
}
else{
echo('<meta http-equiv="Refresh" content="1;url=index.php?1">');

}
mysql_close($con);
?>

