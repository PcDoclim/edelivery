<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel='stylesheet' type='text/css' href='menu_style.css' />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Form</title>
<script language="javascript">
<!---------------------------------------------------------------------------------------------------------------------------
function getValue()
{
 var url=window.location.href;
  var qparts = url.split("?");
  if(qparts[1]==1)
{document.getElementById("6").style.display="block";}
else
{document.getElementById("6").style.display="none";}
}
<!---------------------------------------------------------------------------------------------------------------------------

    function isNumeric(elem){	
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		return false;
	}
}
<!---------------------------------------------------------------------------------------------------------------------------

function emailValidator(elem){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		return false;
	}
}
<!---------------------------------------------------------------------------------------------------------------------------
function lengthRestriction(elem){
	var uInput = elem.value;
	if(uInput.length >= 3 && uInput.length <= 10){
		return true;
	}else{
		return false;
	}
}
<!---------------------------------------------------------------------------------------------------------------------------
function check(){
	
	var errors=0;

	
	document.getElementById("1").style.display="none";
	document.getElementById("2").style.display="none";
	document.getElementById("3").style.display="none";
	document.getElementById("4").style.display="none";
	document.getElementById("5").style.display="none";
	document.getElementById("6").style.display="none";
	document.getElementById("7").style.display="none";
	document.getElementById("8").style.display="none";
	document.getElementById("9").style.display="none";
	document.getElementById("10").style.display="none";




			
				if(!isNumeric(document.getElementById('phone_num')))
  			   {
				   if(document.getElementById('phone_num').value!="")
				   {
				   errors=errors+1;
				   document.getElementById("3").style.display='block';
				   }
				   
 			   }

				if(!emailValidator(document.getElementById("email")))
					{
						if(document.getElementById("email").value!="")
						{
						errors=errors+1;
						document.getElementById("5").style.display='block';
						}
					
					}

					if(!lengthRestriction(document.getElementById("password")))
							{
								if(document.getElementById("password").value!="")
								{
								errors=errors+1;
								document.getElementById("7").style.display='block';
								}
							
							}
							
							if(document.getElementById("password").value!="")
								{
									if(document.getElementById("newpass").value="")
									{
										errors=errors+1
										document.getElementById("8").style.display='block';
									}
								}


							if(!lengthRestriction(document.getElementById("newpass")))
								{
									if(document.getElementById("newpass").value!="")
									{
									errors=errors+1;
									document.getElementById("9").style.display='block';
									}
								
								}
								  
								  


									if(document.getElementById("newpass").value!=document.getElementById("newpass2").value)
							  		{
										if(document.getElementById("newpass").value!="")
										{
								  		errors=errors+1;
										document.getElementById("10").style.display='block';
										}
							   		
							  		}
		
		
								
if(errors==0)
{
document.getElementById("form").submit();
}
}

</script>





</head>

<body class="homeBack" onLoad="getValue()">
<div style="position: fixed; top: 0px; right: 0px; left:0px; background-image:'images/back.jpg' ">
<div align="left" style="background:url(images/back.jpg)"><table width="100%"><tr><td width="73%"><img src="images/039-pizza-delivery.png" width="100" height="90">
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
<br><br /><br><br /><br><br />
<form method="post" id="form" name="form" action="update.php">
 <br><br><br><br>
  <table width="689" border="0" align="center" cellspacing="0" cellpadding="2" >
     <tr>
      <td><div align="right"><b><font color="#ffffff">Διεύθυνση</font></b></div></td>
      <td><input name="address" type="text" class="textfield" id="address" /></td>
      <td width="301"><div id="1" style="display:none;color:#F00">*Δεν πρέπει να είναι κένο</div></td>
    </tr>
    <tr>
      <td><div align="right"><b><font color="#ffffff">Αριθμός τηλεφώνου</font></b></div></td>
      <td><input name="phone_num" type="text" class="textfield" id="phone_num" /></td>
      <td width="301"><div id="2" style="display:none ;color:#F00">*Δεν πρέπει να είναι κένο </div><div id="3" style="display:none ;color:#F00">*Πρέπει να περιέχει μόνο αριθμούς</div></td>
    </tr>
   <tr>
      <td><div align="right"><b><font color="#ffffff">eMail</font></b></div></td>
      <td><input name="email" type="text" class="textfield" id="email" /></td>
      <td width="301"><div id="4" style="display:none;color:#F00">*Δεν πρέπει να είναι κένο</div><div id="5" style="display:none;color:#F00">*Πρέπει να έχει την μορφή ***@localhost.com</div></td>
    </tr>
        <tr>
      <td><div align="right"><b><font color="#ffffff">Κωδικός</font></b></div></td>
      <td><input name="password" type="password" class="textfield" id="password" /></td>
      <td width="301"><div id="6" style="display:none;color:#F00">*Λάθος κωδικός</div><div id="7" style="display:none;color:#F00">*επιτρέπονται 3-10 χαρακτήρες</div></td>
    </tr>
    <tr>
      <td><div align="right"><b><font color="#ffffff">Νέος κωδικός</font></b></div></td>
      <td><input name="newpass" type="password" class="textfield" id="newpass" /></td>
      <td width="301"><div id="8" style="display:none;color:#F00">*Δεν πρέπει να είναι κένο</div><div id="9" style="display:none;color:#F00">*επιτρέπονται 3-10 χαρακτήρες</div></td>
    </tr>
    <tr>
      <td><div align="right"><b><font color="#ffffff">Επαναπληκτρολόγηση νέου κωδικόυ</font></b></div></td>
      <td><input name="newpass2" type="password" class="textfield" id="newpass2" /></td>
      <td width="301"><div id="10" style="display:none;color:#F00">*οι κωδικοί που δώσατε δεν συμφώνουν</div></td>   
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td> <div align="center">
        <input type="button" name="button" value="Καταχώρηση"  onClick="check()" />
      </div></td>   
    </tr>
  </table>
 </form>
</body>
</html>