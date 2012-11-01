<?php 
	session_start();
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<link rel='stylesheet' type='text/css' href='menu_style.css' />

<title>Home</title>
<script type="text/javascript">


function check(){
	
	var errors=0;

	document.getElementById("1").style.display="none";
	document.getElementById("2").style.display="none";
    
	
	if(document.getElementById("username").value=="")
		{
		errors=errors+1;
		document.getElementById("1").style.display='block';
		}

			if(document.getElementById("password").value=="")
			{
			errors=errors+1;
			document.getElementById("2").style.display='block';
			}

if(errors==0)
{
document.getElementById("loginForm").submit();
}
}




function getValue()
{
 var url=window.location.href;
  var qparts = url.split("?");
  if(qparts[1]==1)
{document.getElementById("3").style.display="block";}
else
{document.getElementById("3").style.display="none";}
}


function wellcheck()
{
	if(<?php if(!$_SESSION['id']){ echo "0";} ?>==0)
{
	document.getElementById("user").style.display="none";
	document.getElementById("update").style.display="none";
   document.getElementById("forma").style.display="block";   
}
else
{document.getElementById("forma").style.display="none";
document.getElementById("update").style.display="block";
document.getElementById("user").style.display="block";}
}
</script>
</head>

<body class="homeBack"  onLoad="getValue();wellcheck()">
<SCRIPT>
if (window != top) top.location.href = location.href;
// End -->
</SCRIPT type="text/javascript">
<div style="position: fixed; top: 0px; right: 0px; left:0px; background-image:'images/back.jpg' ">
<div class="menuBackground"><table width="100%"><tr><td width="73%"><img src="images/039-pizza-delivery.png" class="menuImage1" />
<img src="images/logo.png" width="600" height="100" align="top"/></td><td width="27%" valign="bottom" align="right">
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
<p><br />
  <br /> <br /> <br /> <br /> <br />  
  
</p> 
<table width=100%>
  <tr><td>
<img src="images/homelog.png " class="homeLogo1"/></td>
<td align="left"><img src="images/hometext.png"  class="homeLogo2"/> </td>
<td valign="top">
  <form id="loginForm" name="loginForm" method="post" action="login.php"  >
  <table width="364" border="0" align="right" cellspacing="0" cellpadding="2" id="forma" style="display:none">
    <tr>
      <td width="213">&nbsp;</td>
      <td width="143"><b><font color="#FFFFFF">User Name</font></b></td>
      </tr>
      <tr>
      <td><div id="1" style="display:none;color:#F00">*Κένο User Name</div><div id="3" style="display:none;color:#F00">*Λάθος UserName ή κωδικός</div></td>
      <td width="143"><input name="username" type="text" class="textfield" id="username" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><b><font color="#FFFFFF">Κωδικός</font></b></td>
      </tr>
      <tr>
      <td><div id="2" style="display:none;color:#F00">*Κένο πεδίο κωδικού</div></td>
      <td><input name="password" type="password" class="textfield" id="password" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
     <td><input type="button" name="Submit" value="Σύνδεση" onClick="check();"/><a href="registration_form.php"> <font color="#FFFFFF">Εγγραφή</font></a></td>
     	     
    </tr>
  </table>
  </form>
</td></tr></table>
<p>&nbsp;</p>
</body>
</html>
