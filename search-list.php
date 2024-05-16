<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="顧客検索・一覧ページ">
    <title>顧客検索・一覧画面ページ</title>
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

$sql = "SELECT * FROM `customers` ORDER BY `entry_date` DESC;";
$result = $dbCon->query($sql);

if (!$result) {
    exit('記事の取得に失敗しました' . $dbCon->error);
}

$dbCon->close();


?>

    <div class="main-wrapper search-wrapper">

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
        <main class="main-content content-search__bg">
            <h2>顧客検索・一覧画面</h2>
            <div class="content-box content-contact">
                <form>
                    <div class="contact-form__label">
                        <p>顧客名</p>
                        <input type="text" name="title">
                    </div>
                    <div class="contact-form__label">
                        <p>顧客名(カナ)</p>
                        <input type="text" name="name">
                    </div>
                    <div class="contact-form__label">
                        <p>性別</p>
                        <input type="radio" name="them">全て
                        <input type="radio" name="man">男性
                        <input type="radio" name="woman">女性

                    </div>
                    <div class="contact-form__label">
                        <p>生年月日</p>
                        <input type="date" name="birthday">
                    </div>
                    <div class="contact-form__label">
                        <p>所属会社</p>
                        <select name="company">
                            <option>選択</option>
                            <option>○○証券株式会社</option>
                            <option>○○株式会社</option>
                            <option>○○有限会社</option>
                        </select>
                    </div>
                    <div class="contact-form__submit">
                        <input type='button' value='検索'>
                    </div>
                </form>
            </div>
            <div class="table-box">
                <table class="table-child">
                    <thead>
                        <tr>
                            <th>顧客ID</th>
                            <th>顧客名</th>
                            <th>メールアドレス</th>
                            <th>電話番号</th>
                            <th>所属会社</th>
                            <th>新規日時</th>
                            <th>最終更新日時</th>
                            <th>編集</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        if($result->num_rows === 0) {
                    ?>
                        <div>
                            登録されているデータはありません。
                        </div>

                    <?php
                        } else {
                            while ($row = $result->fetch_assoc()) {

                    ?>

                    <form method="post" action="delete_submit.php" class="deleteForm">
                        <input type="hidden" name="customers_id" value="<?=$row['id'];?>">
                            <tr>
                                <td><?=$row['id'];?></td>
                                <td>
                                    <p><?=$row['name'];?></p>
                                    <p><?=$row['kana'];?></p>
                                </td>
                                <td>
                                    <p><?=$row['email'];?></p>
                                </td>
                                <td>
                                    <p><?=$row['tell'];?></p>
                                </td>
                                <td>
                                    <p><?=$row['company_id'];?></p>
                                </td>
                                <td>
                                    <p><?=$row['entry_date'];?></p>
                                </td>
                                <td>
                                    <p><?=$row['last_date'];?></p>
                                </td>
                                <td class="table-edit">
                                    <button class="button-edit" type="button" onclick="location.href='search-edit.php?id=<?=$row['id'];?>'">編集</button>
                                </td>
                                <td class="table-delete">
                                    <button class="button-delete" type="submit" name="action">削除</button>
                                </td>
                            </tr>
                    </form>
                    <?php
                            }
                        }
                    ?>

                    </tbody>
                </table>
            </div>

        </main>
    </div>
    <script src="./js/app.js" ></script>
</body>

</html>