<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了画面</title>
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php

    $dbCon =new mysqli("localhost","root","","customer_db");
    $dbCon->set_charset("utf8");

    if($dbCon->connect_error) {
        exit('接続に失敗しました');
    } 
    
    $sql = "INSERT INTO `customers`(`name`,`kana`, `email`,`tell`,`gender`,`birth`,`company_id`,`entry_date`,`last_date`)  
    VALUES ('". $_POST['japan_name']."','".$_POST['kana_name']."','".$_POST['mail_addres']."','".$_POST['phone_number']."','".$_POST['gender']."',
    '".$_POST['sign-birthday']."','".$_POST['company']."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."');";

    $result = $dbCon->query($sql);

    if (!$result) {
        exit('登録に失敗しました' . $dbCon->error);
    }

    $dbCon->close();

    header('Location: index.php');


    

    // echo $_REQUEST['japan_name'];
    // echo $_REQUEST['kana_name'];
    // echo $_REQUEST['mail_addres'];
    // echo $_REQUEST['phone_number'];
    // echo $_REQUEST['gender'];
    // echo $_REQUEST['sign-birthday'];
    // echo $_REQUEST['company'];








    // シンプルなインサート分でしっかりデータベースに登録されているか確認する、データベースに登録されるかを確認
    // まずは一個一個bindなどして、ユーザーが登録したようになるかを確認する

    // if ($sql -> execute([$_REQUEST['japan_name'], $_REQUEST['kana_name'], $_REQUEST['mail_addres'], $_REQUEST['phone_number'], $_REQUEST['gender'],
    //     $_REQUEST['sign-birthday'], $_REQUEST['company']])) {
    //     echo '登録が完了しました。';
    // } else {
    //     echo'登録できませんでした。';

// }

// INSERT INTO `customers` (`name`, `kana`, `email`, `tell`, `gender`, `birth`, `company_id`, `entry_date`, `last_date`) VALUES ('佐藤一郎', 'さとういちろう', 'satou@gmail.com', '07034445666', '1', '2024-05-01', '1', current_timestamp(), current_timestamp());

?>
</body>
</html>
