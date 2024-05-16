<?php
		// DBに接続します。DB接続用パッケージ mysqliを使用します。
		$dbCon = new mysqli("localhost", "root", "", "customer_db");

		// 日本語記事の文字化け対応の為、utf-8を指定します。
		$dbCon->set_charset('utf8');

		// DB接続確認をします。接続に失敗したらエラーを出力し、終了します。
		if ($dbCon->connect_error) {
			exit('データベースの接続に失敗しました。');
        }

        
		// // 新規登録用のSQL文を作成します。
        // テーブルのカラム名detail
        // WHEREは条件の指定
		// SET `name`のnameはカラム名、$_POST[この中はキーの名前]
		
	    $sql = "UPDATE `customers` SET `name` = '".$_POST['japan_name']."', `kana` = '".$_POST['kana_name']."', `email` = '".$_POST['mail_addres']."',
                 `tell` = '".$_POST['phone_number']."', `gender` = '".$_POST['gender']."', `birth` = '".$_POST['sign-birthday']."', `company_id` = '".$_POST['company']."',`last_date` = '".date('Y-m-d H:i:s')."'
				  WHERE `customers`.`id` =  " . $_POST['customers_id'] . ";";

				  var_dump($sql);

        // UPDATE `customers` SET `name` = '山田一郎', `kana` = 'ヤマダイチロウ', `email` = 'aaa@gmail.com', `tell` = '070341111', `gender` = '1', `birth` = '2024-05-01', `company_id` = '2', `last_date` = '2024-05-16 08:15:07' WHERE `customers`.`id` = 17;

    

		// SQL文の実行
		$result = $dbCon->query($sql);

		// 登録に失敗したらエラーを出力し、終了します。
		if(!$result) {
		 	exit('取得に失敗しました。' . $dbCon->error);
	     }


		//DBの接続を切る。
		$dbCon->close();

        header("Location: index.php");
	?>