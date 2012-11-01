<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$con = mysql_connect("localhost","root","");
$count=0;
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
$username=mb_convert_encoding($_SESSION[username], "utf-8", "auto");
mysql_select_db("edelivery", $con);
 mysql_query("set character set 'utf8'",$con); 
mysql_query("SET NAMES 'utf8'",$con);

$rv=mysql_query("SELECT * FROM customer where username='$username'");
$property = mysql_fetch_array($rv);
$password=$property['password'];


	if($_POST[address]!=""){
	mysql_query("update customer set address='$_POST[address]' where username='$username'");}
	
		if($_POST[phone_num]!=""){
		mysql_query("update customer set phone_num='$_POST[phone_num]' where username='$username'");}

			if($_POST[email]!=""){
			mysql_query("update customer set email='$_POST[email]' where username='$username'");}

				if($_POST[password]!=""){
					if($_POST[password]==$password){
						mysql_query("update customer set password='$_POST[newpass2]' where username='$username'");}
						else { $count=1;}}
						
						
if($count==0)
{
echo('<meta http-equiv="Refresh" content="1;url=index.php">');
}
else
{
echo('<meta http-equiv="Refresh" content="1;url=update_form.php?1">');
}
mysql_close($con);	
?>




</body>
</html>