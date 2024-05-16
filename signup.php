<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="顧客登録画面ページです">
    <title>顧客登録画面ページ</title>
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
            <h2>顧客登録画面</h2>

            <div class="content-box content-sign">
                <form action="signup_submit.php" method="post" id="signupForm">
                    
                    <div class="contact-form__sign">
                        <p>お名前:</p>
                        <input type="text" id="nameID" placeholder="例）山田太郎" name="japan_name">
                    </div>
                    <!-- エラーの為のボックス -->
                    <div id="name_error_Id" class="error-box"></div>


                    <div class="contact-form__sign">
                        <p>フリガナ:</p>
                        <input type="text" id="kanaID" placeholder="例）ヤマダタロウ" name="kana_name">
                    </div>
                    <!-- エラーの為のボックス -->
                    <div id="kana_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>メールアドレス:</p>
                        <input type="text" id="emailID" placeholder="例)xxx@xxx.xxx" name="mail_addres">

                    </div>
                    <div id="email_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>電話番号:</p>
                        <input type="text" id="phoneID" placeholder="例）07012345678" name="phone_number">
                    </div>
                    <div id="phone_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>性別:</p>
                        <input type="radio" name="gender" value="0">男性
                        <input type="radio" name="gender" value="1">女性
                        <input type="radio" name="gender" value="2">その他



                    </div>
                    <div id="gender_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>生年月日:</p>
                        <input type="text" id="birthdayID" name="sign-birthday" placeholder="2024/05/09">

                    </div>
                    <div id="birth_error_Id" class="error-box"></div>

                    <div class="contact-form__sign">
                        <p>所属会社:</p>
                        <select name="company" id="companyID">
                            <option value="">選択</option>
                            <option value="1">○○証券株式会社</option>
                            <option value="2">○○株式会社</option>
                            <option value="3">○○有限会社</option>
                        </select>
                    </div>
                    <div id="company_error_Id" class="error-box"></div>

                    <button class="sign-page" type="submit" onclick="subForm()">
                        <p>登録</p>
                    </button>


                    <button class="cancel" type="button" onclick="location.href='./search-list.php'">
                        <p>キャンセル</p>
                    </button>
                    
                </form>
            </div>
            <!-- CSSを当てる時差別化のためにクラスを設定した方がいいのか -->
            

            <!-- <button class="sign-page" type="button" onclick="subForm()">
                <p>登録</p>
            </button>


            <button class="cancel" type="button" onclick="location.href='./search-list.html'">
                <p>キャンセル</p>
            </button> -->
        </main>
    </div>
    <script src="./js/app.js" ></script>
</body>

</html>