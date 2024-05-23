<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="顧客管理システムトップページです">
    <title>顧客管理システムトップ</title>
    <link href="./CSS/reset.css" rel="stylesheet" type="text/css" />
    <link href="./CSS/style.css" rel="stylesheet" type="text/css" />
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
        <main class="main-content content-top__bg">
            <div class="content-top">
                <h1>ManagementSystemへようこそ</h1>
                <p><span>M</span>anagement<span>S</span>ystem</p>
                <button onclick="location.href='./search-list.php'">
                    <h3>HOME</h3>
                </button>
            </div>
        </main>
    </div>
    <script src="./js/app.js" ></script>
</body>

</html>