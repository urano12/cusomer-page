<?php



    $dbCon =new mysqli("localhost","root","","customer_db");
    $dbCon->set_charset("utf8");

    if($dbCon->connect_error) {
        exit('接続に失敗しました');
} 
    
    $sql = "DELETE FROM `customers` WHERE `id` = " . $_POST['customers_id'] . ";";

    // var_dump($_POST['customers_id']);

    $result = $dbCon->query($sql);

    if (!$result) {
        exit('削除に失敗しました' . $dbCon->error);
}

    $dbCon->close();

    header('Location: index.php');

?>