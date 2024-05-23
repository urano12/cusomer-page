<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="顧客編集画面ページです">
    <title>顧客編集画面ページ</title>
    <link href="./CSS/reset.css" rel="stylesheet" type="text/css" />
    <link href="./CSS/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
		$sql = "SELECT * FROM `customers` WHERE `id` = ".$_GET['id'].";";
        $companysql = "SELECT * FROM `companies`;";
    

		// // SQL文の実行
		$result = $dbCon->query($sql);
        $company = $dbCon->query($companysql);

		// // 登録に失敗したらエラーを出力し、終了します。
		if(!$result) {
			exit('取得に失敗しました。' . $dbCon->error);
		}
// リザルトの中のデータを一軒だけ取ってきている
		$data = $result->fetch_assoc();

    

		//DBの接続を切る。
		$dbCon->close();
	?>

    <div class="main-wrapper">
        <header class="main-header">
            <div class="logo">
                <p><span>M</span>anagement<span>S</span>ystem</p>
            </div>
            <nav>
                <ul id="header_menu">
                    <li><a href="./index.php">TOP</a></li>
                    <li><a href="./search-list.php">List</a></li>
                    <li><a href="./signup.php">Sign</a></li>
                </ul>
            </nav>
        </header>
        <main class="main-content content-sign__bg">
            <h2>顧客編集画面</h2>

            <div class="content-box content-sign">
                <form name="submit-form" action="update_submit.php" method="post" id="signupForm">

                <input type="hidden" name="customers_id" value="<?=$data['id'];?>">
                    <!-- input typeはhiddenでIDを持ってきている -->
                    
                    <div class="contact-form__sign">
                        <p>お名前:</p>
                        <!-- キーの名前がjapan_name、値がvalue -->
                        <input type="text" id="nameID" placeholder="例）山田太郎" name="japan_name" value="<?=$data['name'];?>">
                    </div>
                    <!-- エラーの為のボックス -->
                    <div id="name_error_Id" class="error-box"></div>


                    <div class="contact-form__sign">
                        <p>フリガナ:</p>
                        <input type="text" id="kanaID" placeholder="例）ヤマダタロウ" name="kana_name" value="<?=$data['kana'];?>">
                    </div>
                    <!-- エラーの為のボックス -->
                    <div id="kana_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>メールアドレス:</p>
                        <input type="text" id="emailID" placeholder="例）xxx@xxx.xxx" name="mail_addres" value="<?=$data['email'];?>">

                    </div>
                    <div id="email_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>電話番号:</p>
                        <input type="text" id="phoneID" placeholder="例）09091111111" name="phone_number" value="<?=$data['tell'];?>">
                    </div>
                    <div id="phone_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>性別:</p>
                        
                        <input type="radio" name="gender" value="0"<?php if ($data['gender']=== '0') {echo 'checked';}?>>男性
                        <input type="radio" name="gender" value="1"<?php if ($data['gender']=== '1') {echo 'checked';}?>>女性
                        <input type="radio" name="gender" value="2"<?php if ($data['gender']=== '2') {echo 'checked';}?>>その他

                    </div>
                    <div id="gender_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>生年月日:</p>
                        <input type="text" id="birthdayID" name="sign-birthday" placeholder="2024/05/09" value="<?=$data['birth'];?>">

                    </div>
                    <div id="birth_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>所属会社:</p>
                        
                        
                        <!-- ループ処理をする -->
                        <select name="company" id="companyID">
                            <?php
                                while ($row = $company->fetch_assoc()){
                                    
                            ?>
                                    <option value="<?= $row['id'] ?>"><?=$row['name'] ?></option>
                            <?php
                                    }
                            ?>

                        

                        </select>
                    </div>
                    <div id="company_error_Id" class="error-box"></div>

                    <button class="sign-page" type="submit" name="action">
                        <p>更新</p>
                    </button>


                    <button class="cancel" type="button" onclick="location.href='./search-list.php'">
                        <p>戻る</p>
                    </button>
                    
                </form>
            </div>
        </main>
    </div>
    <script src="./js/app.js" ></script>
</body>

</html>