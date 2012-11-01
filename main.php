<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' type='text/css' href='menu_style.css' />

<style type="text/css">
.buttons {
	font-family: arial;
	font-size: 8pt;
	border-bottom:1px solid #282828; border-right:1px solid #282828; border-top:1px solid #8794A0; border-left:1px solid #8794A0;
	background-color: #E4E4E4;
}	
	
</style>


<script type="text/javascript">
function finishorder()
{
	document.getElementById("order1").value="";
	for(i=1;i<=<?php if($_SESSION['login']==1) {echo $_SESSION['total'];} else { echo "0";} ?>;i++)
	{
		var rows="row"+i;
		document.getElementById("order1").value+="|"+document.getElementById(rows).firstChild.innerHTML;
	}
	
document.getElementById("forma1").submit();
}

function wellcheck()
{
	if(<?php if($_SESSION['login']==1){ echo "1";} else { echo "0";} ?>==0)
{
	document.getElementById("user").style.display="none";
	document.getElementById("update").style.display="none";
   document.getElementById("orbutton").style.display="none";   
}
else
{document.getElementById("orbutton").style.display="block";
document.getElementById("update").style.display="block";
document.getElementById("user").style.display="block";}
}

function getValue()
{
 var url=window.location.href;
  var qparts = url.split("&");
  if(qparts[1]=="1")
{document.getElementById("container").style.display="block";
document.getElementById("contain").style.display="block"}
}


</script>





</head>

<body class="homeBack" onload="wellcheck();getValue()" >
<div style="position: fixed; top: 0px; right: 0px; left:0px; background-image:'images/back.jpg'; z-index:15 ">
<div class="menuBackground"><table width="100%"><tr><td width="73%"><img src="images/039-pizza-delivery.png" class="menuImage1" >
<img src="images/logo.png" width="600" height="100" align="top"></td><td width="27%" valign="bottom" align="right">
<div align="right" id="user" ><font color="#FFFFFF">Καλως ήλθατε <?php echo $_SESSION['username'] ?><br />
Πατήστε <a href=logout.php >εδώ για αποσύνδεση</a></font></div></td></tr></table>
</div>

<ul class="menu orange" style="font-size:12px">
	<li class="current"><a href="index.php" title="">Αρχική</a></li>
	<li><a href="fastFood.php"  title="">Καταστήματα</a></li>
	<li><a href="contact.php" title="">Επικοίνωνια</a></li>
	<li><a href="info.php" title="">Πληροφορίες</a></li>
    <li id="update"><a href="update_form.php" title="">Επεξεργασία λογαριασμού</a></li>
</ul></div>
<?php
# Using QUERY_STRING

$queryString = $_SERVER['QUERY_STRING'];
parse_str($queryString);
$_SESSION['shop']=$shop;
$con = mysql_connect("localhost","root","");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("edelivery", $con);

  mysql_query("set character set 'utf8'",$con); 
  mysql_query("SET NAMES 'utf8'",$con);

$result=mysql_query("SELECT menu FROM shop WHERE name_Shop='$shop'");
$property=mysql_fetch_array($result);
echo $property['menu'] ;

?>  
<?php

if(isset($_SESSION['total'])&&$_SESSION['total']>=1)
{
	echo "<div style=\"position:absolute; top:125px; right:10px ;width:100%\" align='right'><br><br><br><br><br><br><br><br><table border=\"2\" bordercolor=\"#993333\"; style=\"max-width:23%\"><tr><td align=\"center\" colspan=\"3\">Τρέχουσα Παραγγελια</td></tr>";
	$paragkelia=$_SESSION['paragkelia'];
	$timh=$_SESSION['timh'];
	for($i=1;$i<=$_SESSION['total'];$i++)
	{
	echo "<tr id=\"row".$i."\" ><td>" . $paragkelia[$i] . "</td><td>" . $timh[$i] . "</td><td><a href=\"deleteorder.php?i=" . $i . "\"><img src='images/close.png' width='20' ></a></td></tr>";
	}
	echo "<tr><td align=\"center\" colspan=\"3\">Σύνολο:<input type=\"text\" value=\"".$_SESSION['totp']."\" size=\"10\" readonly ><input  type=\"button\" onclick=\"finishorder()\" value=\"ok\" /></td></tr></table></div>";
}
else
{
	echo "<br /><br /><br /><br /><br /><br /><br /><br />";
}


?>

<?php

 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 $_SESSION['url']=$pageURL;

?>
<form id="forma1" action="sendorder.php" method="post" style="display:none">
<input id="order1" name="order">
</form>
</body>
</html>
