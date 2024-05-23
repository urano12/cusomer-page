
function subForm(){
    var name = document.getElementById("nameID").value;
    var kana = document.getElementById("kanaID").value;
    var email = document.getElementById("emailID").value;
    var email_pattern =  /^[a-zA-Z0-9_+-]+(\.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
    var phone = document.getElementById("phoneID").value;
    var phone_pattern = /^\d{9,11}$/;;
    var gender = document.getElementsByName("gender");
    var birthday = document.getElementById("birthdayID").value;
    var company = document.getElementById("companyID").value;
    
    var isRight = true;


    // 名前のチェック
    // nameIDすなわち名前の入力が空だった場合
    if (name == ''){
        document.getElementById("name_error_Id").innerHTML = "※必須です";
        isRight = false;
    // 名前の文字の長さが3未満だったらエラー文を出す
        } else if (name.length < 3) {
        document.getElementById("name_error_Id").innerHTML = "※3文字以上入力してください";
        isRight = false;
    // そのほか（正常だったら何も入力しない？
        } else {
        document.getElementById("name_error_Id").innerHTML = "";
        }
    // フリガナのチェック
    if (kana == ''){
        document.getElementById("kana_error_Id").innerHTML = "※必須です";
        isRight = false;
        } else if (kana.length < 3) {
        document.getElementById("kana_error_Id").innerHTML = "※3文字以上入力してください";
        isRight = false;
         } else {
        document.getElementById("kana_error_Id").innerHTML = "";
        }
    
     // メールアドレスのチェック
    if (email == ''){
        document.getElementById("email_error_Id").innerHTML = "※必須です";
        isRight = false;
        } else if (!email_pattern.test(email)) {
        document.getElementById("email_error_Id").innerHTML = "※xxx@xxx.xxxの形式で入力してください";
        isRight = false;
        } else {
        document.getElementById("email_error_Id").innerHTML = "";
        }

    // // 電話番号のチェック
    if (phone == "") {
        document.getElementById("phone_error_Id").innerHTML = "※必須です";
        isRight = false;
        } else if (!phone_pattern.test(phone)) {
        document.getElementById("phone_error_Id").innerHTML ="※-なしの9桁または10桁の数字を入力してください"
        isRight = false;
        } else {
        document.getElementById("phone_error_Id").innerHTML ="";
        }

    //    性別のチェック
    var flag = false;

    for (var i =0; i < gender.length; i++) {
        if (gender[i].checked) {
            flag = true;
            document.getElementById("gender_error_Id").innerHTML = "";
        }
    }

    if (!flag) {
        document.getElementById("gender_error_Id").innerHTML = "※選択が必要です";
        isRight = false;
    }
    
    // 生年月日のチェック
    if (birthday == '') {
        document.getElementById("birth_error_Id").innerHTML = "※入力が必要です";
        isRight = false;
    } else {
        document.getElementById("birth_error_Id").innerHTML = "";
    }

    // 所属会社のチェック

    if (company == '') {
        document.getElementById("company_error_Id").innerHTML = "※選択が必要です";
        isRight = false;
    } else {
        document.getElementById("company_error_Id").innerHTML = "";
    }

    if (isRight){
        document.getElementById("signupForm").submit();
    }

    
};

