<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="顧客検索・一覧ページ">
    <title>顧客検索・一覧画面ページ</title>
    <link href="./CSS/reset.css" rel="stylesheet" type="text/css" />
    <link href="./CSS/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php

$dbCon =new mysqli("localhost","root","","customer_db");
$dbCon->set_charset("utf8");

if($dbCon->connect_error) {
    exit('接続に失敗しました');
    } 

    $company_sql = "SELECT * FROM `companies`;";
    $company = $dbCon->query($company_sql);

// $join_sql = "SELECT *, customers.id AS id, customers.name AS name, companies.id AS company_id, companies.name AS company_name FROM `customers` JOIN `companies` ON customers.company_id = companies.id;";
// // // WHERE $condition ORDER BY `entry_date` DESC　これは下で定義する


// var_dump($_POST);

// var_dump('aaaaa');
// var_dump($join_result);


// 検索条件があった場合
// 検索条件がなかったら全件が表示されるだけ
// 下でWHEREを定義するなら上で描く必要はない
// $search_sql="";

//     if (isset($_POST['search_name'])) {
//         if($search_sql=""){
//             $search_sql.=" WHERE";
//         }
//             $search_sql.= " customers.name LIKE '%" . $_POST['search_name'] . "%'";
//          } 
    

//     if (search_kanaに値があったら) {

//     }
// } 
// $order_sql= "ORDER BY `entry_date` DESC;";
// $join_result = $dbCon->query($join_sql.$search_sql);




if (!$company) {
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

                <!-- 検索ボタンが押されたらsearch_list.phpに反映される、別ページに遷移するわけではない -->
                <form action="search-list.php" method="post">
                    
                    <div class="contact-form__label">
                        <p>顧客名</p>
                        <input type="text" name="search_name">
                    </div>
                    <div class="contact-form__label">
                        <p>顧客名(カナ)</p>
                        <input type="text" name="search_kana">
                    </div>
                    <div class="contact-form__label">
                        <p>性別</p>
                        <input type="radio" name="search_gender" value="0">男性
                        <input type="radio" name="search_gender" value="1">女性
                        <input type="radio" name="search_gender" value="2">その他

                    </div>
                    <div class="contact-form__label">
                        <p>生年月日</p>
                        <input type="date" name="search_birthday">
                    </div>
                    <div class="contact-form__label">
                        <p>所属会社</p>
                        <select name="search_company">
                            <?php
                                while($row = $company->fetch_assoc()){
                            ?>
                                <option value="<?= $row['id'] ?>"><?=$row['name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="contact-form__submit">
                        <input type='submit' name='search_button' value='検索'>
                    </div>
                </form>
            </div>

            <!-- この間にデータベース接続のSQL文を書かないといけない(検索用の) -->
        
            <?php

            $dbCon =new mysqli("localhost","root","","customer_db");
            $dbCon->set_charset("utf8");
            
            if ($dbCon->connect_error) {
                exit('接続に失敗しました');
                } 
            // WHERE句を確定させられる、WHERE1=1;必ず真である
            $condition="1";

            // 検索ボタンを押したときに発火する
            if (isset($_POST['search_button'])){

                $name = $_POST['search_name'];
                $kana = $_POST['search_kana'];
                $gender = $_POST['search_gender'];
                $birth =  $_POST['search_birthday'];
                // $company = $_POST['search_company'];
                // var_dump($company);

                // name
                if (isset($name)) {
                    $condition.=" AND customers.name LIKE '%" .$name. "%'";
                }

                // kana
                if (isset($kana)) {
                    $condition.=" AND kana LIKE '%" .$kana. "%'";
                }

                // gender
                if (isset($gender) && $gender !=""){
                    $condition.= " AND gender = $gender";
                }

                // // birth
                // if (isset($birth)){
                //     $condition.= " AND birth = '" . date('Y-m-d', strtotime($birth)) . "'";
                // }

                // company
                // if (isset($company) && $company !="") {
                //     $condition.= "AND company_id =". $company;
                // }
            
            }

            $join_sql = "SELECT *, customers.id AS id, customers.name AS name, companies.id AS company_id, companies.name AS company_name FROM `customers` JOIN `companies` ON customers.company_id = companies.id
                        WHERE $condition ORDER BY `entry_date` DESC;";

            
            $join_result = $dbCon->query($join_sql);

            if (!$join_result) {
                 exit('記事の取得に失敗しました' . $dbCon->error);
                }

            


            $dbCon->close();


            ?>
            


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
                        if($join_result->num_rows === 0) {
                    ?>
                        <div>
                            登録されているデータはありません。
                        </div>

                    <?php
                        } else {
                            while ($row = $join_result->fetch_assoc()) {

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
                                    <p><?=$row['company_name'];?></p>
                                </td>
                                <td>
                                    <p><?=$row['entry_date'];?></p>
                                </td>
                                <td>
                                    <p><?=$row['last_date'];?></p>
                                </td>
                                <td class="table-edit">
                                    <!-- 編集ボタンを押したらゲット通信で編集画面に飛ぶようにしている -->
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