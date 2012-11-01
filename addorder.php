<?php 
session_start();
$tot=$_SESSION['total'];
$paragkelia=$_SESSION['paragkelia'];
$timh=$_SESSION['timh'];
$tot=$tot+1;
$paragkelia[$tot]=$_GET['paragkelia'];
$timh[$tot]=$_GET['timh'];
$_SESSION['totp']=$_SESSION['totp']+$_GET['timh'];

$_SESSION['paragkelia']=$paragkelia;
$_SESSION['timh']=$timh;
$_SESSION['total']=$tot;
echo '<script type="text/javascript">';
echo "window.location=\"".$_SESSION['url']."&1\"";
echo '</script>'
?>