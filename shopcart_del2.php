<?php require_once('Connections/conn_db.php'); ?>
<?php
if (isset($_GET['mode']) && $_GET['mode'] !=''){
    $mode = $_GET['mode'];

    switch ($mode){
        case 1:
            //使用站內信編號刪除內容
            $SQLstring = sprintf("DELETE FROM message WHERE messageid=%d",$_GET['messageid']);
            break;
        
    }
    $result = mysqli_query($link, $SQLstring);
}
$deleteGoTo = "message.php";
header(sprintf("Location: %s", $deleteGoTo));
?>