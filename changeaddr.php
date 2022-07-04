<?php
header('Access-Control-Allow-Origin:*');//更換收件人php程式
header('Content-Type: application/json;charset=utf-8'); //return json string

require_once('connections/conn_db.php'); //讀資料庫
(!isset($_SESSION)) ? session_start() : "";

if (isset($_SESSION['emailid']) && $_SESSION['emailid'] != "") {
    $emailid = $_SESSION['emailid'];
    $addressid = $_POST['addressid'];
    $query = sprintf("UPDATE addbook SET setdefault ='0' WHERE emailid='%d' AND setdefault ='1';", $emailid);
    $result = mysqli_query($link, $query);
    $query = sprintf("UPDATE addbook SET setdefault ='1' WHERE addressid='%d' ;", $addressid);
    $result = mysqli_query($link, $query);
    if ($result) {
        $retcode = array("c" => "1", "m" => '收件人已經變更。');
        
    } else {
        $retcode = array("c" => "0", "m" => '抱歉!資料無法寫入後台資料庫，請連絡管理人員。');
    }
    echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
}
return;
?>