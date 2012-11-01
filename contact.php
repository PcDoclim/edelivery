<html>
<head>
<title>contact</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel='stylesheet' type='text/css' href='menu_style.css' />
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
<body class="homeBack" onLoad="wellcheck()">
<div style="position: fixed; top: 0px; right: 0px; left:0px; background-image:'images/back.jpg' ">
<div align="left" style="background:url(images/back.jpg)"><table width="100%"><tr><td width="73%"><img src="images/039-pizza-delivery.png" width="100" height="90">
<img src="images/logo.png" width="600" height="100" align="top" ></td><td width="27%" valign="bottom" align="right">
<div align="right" id="user" ><font color="#FFFFFF">Καλως ήλθατε <?php echo $_SESSION['username'] ?><br />
Πατήστε <a href=logout.php >εδώ για αποσύνδεση</a></font></div></td></tr></table>
</div>

<ul class="menu orange" style="font-size:12px">
	<li class="current"><a href="index.php" title="">Αρχική</a></li>
	<li><a href="fastFood.php"  title="">Καταστήματα</a></li>
	<li><a href="#" title="">Επικοίνωνια</a></li>
	<li><a href="info.php" title="">Πληροφορίες</a></li>
    <li id="update"><a href="update_form.php" title="">Επεξεργασία λογαριασμού</a></li>
</ul></div>

<p>&nbsp;</p>
<p>&nbsp;</p>

<div align="left" style="font:Verdana, Arial, Helvetica, sans-serif; color:#FFFFFF">

<p>&nbsp;</p>
<p>&nbsp;</p>
<br><br> <br>
<table width="725" border="0">
<tr><td width="289" height="42">
	<h3>Αναστασιάδης Γιώργος</h3>
	</td>
	<td width="313">
	giorgos54@hotmail.com	</td>
	<td width="39"><a href="mailto:giorgos54@hotmail.com"><img src="images/mail.png" width="40" height="30"></a></td>
	
</tr>
	
<tr>
	<td height="46">
	  <h3>Τραμοντάνης Βασίλης</h3>	</td>
	<td>
		billyboy_lim@hotmail.com	</td>
	
	<td>
 		<a href="mailto:billyboy_lim@hotmail.com"><img src="images/mail.png" width="40" height="30"></a>	</td>
</tr>
	
<tr>
	<td height="54">
	  <h3>Ιορδανίδης Αλέξανδρος</h3>	</td>
	<td>
		 alexander_iordanidis@hotmail.com	</td>
		<td>
		 <a href="mailto:alexander_iordanidis@hotmail.com"><img src="images/mail.png" width="40" height="30"></a>	</td>
</tr>
</table>
</div>
</body>
</html>

