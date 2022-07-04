<?php (!isset($_SESSION))? session_start() :""; //開啟session功能 ?>
<?php
//建立登出功能
$_SESSION['login']=null;
$_SESSION['emailid']=null;
$_SESSION['email']=null;
$_SESSION['cname']=null;
unset($_SESSION['login']);
unset($_SESSION['emailid']);
unset($_SESSION['email']);
unset($_SESSION['cname']);
$sPath="index.php";
header(sprintf("Location: %s", $sPath));
?>