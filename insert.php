<html>
<head>
</head>
<body>

<?php
$con = mysql_connect("localhost","root","");

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
$username=$onoma = mb_convert_encoding($_POST[username], "utf-8", "auto");
mysql_select_db("edelivery", $con);
 mysql_query("set character set 'utf8'",$con); 
mysql_query("SET NAMES 'utf8'",$con);


$result=mysql_query("SELECT * FROM customer WHERE username='$username'");
$count=mysql_num_rows($result);

if($count==0)
{
	mysql_query ("INSERT INTO customer (name,surname,address,phone_num,email,username,password)
				  VALUES ('$_POST[name]','$_POST[surname]','$_POST[address]','$_POST[phone_num]',
						 '$_POST[email]','$_POST[username]','$_POST[password]')");
	echo('<meta http-equiv="Refresh" content="1;url=index.php">');
	
}
else
{
	echo('<meta http-equiv="Refresh" content="1;url=registration_form.php?1">');
}

	
mysql_close($con);	
?>
</body>
</html>
