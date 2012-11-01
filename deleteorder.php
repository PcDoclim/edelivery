<?php 
session_start();
$tot=$_SESSION['total'];
$paragkelia=$_SESSION['paragkelia'];
$timh=$_SESSION['timh'];
$i=$_GET['i'];
$_SESSION['totp']=$_SESSION['totp']-$timh[$i];
for($j=$i;$j<$tot;$j++)
{
	$timh[$j]=$timh[$j+1];
	$paragkelia[$j]=$paragkelia[$j+1];
}
$tot=$tot-1;
$_SESSION['paragkelia']=$paragkelia;
$_SESSION['timh']=$timh;

$_SESSION['total']=$tot;
echo '<script type="text/javascript">';
echo "window.location=\"".$_SESSION['url']."&1\"";
echo '</script>';
?>
