<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json;charset=utf-8'); //return json string
(!isset($_SESSION))? session_start() :""; //開啟session功能
require_once('connections/conn_db.php');

if(isset($_POST['inputAccount']) && isset($_POST['inputPassword'])){
    $inputAccount = $_POST['inputAccount'];
    $inputPassword=$_POST['inputPassword'];
    $query = sprintf("SELECT * FROM member WHERE email='%s' AND pw1='%s' ;",$inputAccount,$inputPassword);
    $result = mysqli_query($link,$query) ;
    if($result){
        if($result->num_rows==1){
            $data=mysqli_fetch_array($result);
            if($data['active']){
                $_SESSION['login']=true;
                $_SESSION['emailid']=$data['emailid'];
                $_SESSION['email']=$data['email'];
                $_SESSION['cname']=$data['cname'];
                $retcode = array("c" => "1","m" => '會員驗証成功。'); //登入成功
            }else {
                $retcode = array("c" => "2","m" => '會員帳號被鎖定，請連絡管理人員。');  //member的active值改成0
            }
        }else{
            $retcode = array("c" => "2","m" => '帳號或密碼錯誤，需重新輸入。');   //帳號錯誤、密碼錯誤
        }
        
    }else {
        $retcode = array("c" => "0","m" => '抱歉!會員驗証失敗，請連絡管理人員。');  //查詢SELECT資料庫SQL語言錯誤
    }
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
}
return;
?>