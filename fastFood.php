<?php session_start();
$_SESSION['total']=0;
$_SESSION['totp']=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
<link rel='stylesheet' type='text/css' href='menu_style.css' />
<title>Fast Food</title>


<script type="text/javascript">
function wellcheck()
{
	if(<?php if(!$_SESSION['id']){ echo "0";} ?>==0)
{
	document.getElementById("user").style.display="none";
	document.getElementById("update").style.display="none";
}
else
{
document.getElementById("user").style.display="block";
document.getElementById("update").style.display="block";
}
}
</script>

</head>

<body class="homeBack" onload="wellcheck()">
<div style="position: fixed; top: 0px; right: 0px; left:0px; background-image:'images/back.jpg' " >
<div align="left" style="background:url(images/back.jpg)"><table width="100%"><tr><td width="73%"><img src="images/039-pizza-delivery.png" width="100" height="90" />
<img src="images/logo.png" width="600" height="100" align="top" /></td><td width="27%" valign="bottom" align="right"/>
<div align="right" id="user" ><font color="#FFFFFF">Καλως ήλθατε <?php echo $_SESSION['username'] ?><br />
Πατήστε <a href="logout.php" >εδώ για αποσύνδεση</a></font></div></td></tr></table>
</div>

<ul class="menu orange" style="font-size:12px">
	<li class="current"><a href="index.php" title="">Αρχική</a></li>
	<li><a href="fastFood.php"  title="">Καταστήματα</a></li>
	<li><a href="contact.php" title="">Επικοίνωνια</a></li>
	<li><a href="info.php" title="">Πληροφορίες</a></li>
    <li id="update"><a href="update_form.php" title="">Επεξεργασία λογαριασμού</a></li>
</ul></div>
<p><br/>
<img  id="myImage" style="position:absolute;top:0px;left:-500px;display:none"  />
<br /></p>   
<p></p>
<p></p>
<p>&nbsp;</p>
<p>
<p>&nbsp;</p>
<p>&nbsp;</p>



<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die("Could not connect: " . mysql_error());
  }


mysql_select_db("edelivery");

  mysql_query("set character set 'utf8'",$con); 
mysql_query("SET NAMES 'utf8'",$con);

$rv=mysql_query("SELECT * FROM Shop ORDER BY Name_Shop");
echo "<table align='center' width='90%' border='0'>";
echo "<tr>";
$count=0;



while ($property = mysql_fetch_array($rv))
  {
	$count=$count+1;
  echo "<td width='30%' align=center height='200' id='" . $property['Name_Shop'] . "'>\n";
  echo "<a href=\"main.php?shop=" . $property['Name_Shop'] . "\"><img  width='90%' height='90%' src='" . $property['image'] . "' onmouseover=\"document.getElementById('myImage').src='".$property['image2']."';document.getElementById('myImage').style.display='block'\" onmouseout=\"document.getElementById('myImage').style.display='none'\" /></a>\n";
  echo "<p align=center>" . $property['Name_Shop'] . "</p></td>";
  if($count%3==0)
  {
	  echo "</tr><tr>";
  }
  }
mysql_close($con);
?>


</body>

<SCRIPT>
//version 1.0 -Troy III- progresive art enterprise
var h = myImage.height/2;
var w = myImage.width/2
function mousefollower(){
           	x=event.x
	y=event.y
	   myImage.style.posLeft= x-h+30
	   myImage.style.posTop = y-w+20 }
document.onmousemove=mousefollower
</SCRIPT>

</html>
