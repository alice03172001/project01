<!-- 讀資料庫 -->
<?php require_once("Connections/conn_db.php"); ?>
<?php (!isset($_SESSION)) ? session_start() : ""; ?>

<!-- 加入分頁功能, 使用第三方套件php_lib.php -->
<?php require_once('php_lib.php'); ?>

<!doctype html>
<html lang="zh-TW">

<head>
    <!-- 將head內容分切出來為,headfile.php, index_s01的head使用引入檔 -->
    <!-- 引入網頁標頭head檔 -->
    <?php require_once("./headfile.php"); ?>
    <!-- 建立認證碼功能 -->
    <script type="text/javascript" src="commlib.js"></script>
    <style>
        /* 建立錯誤與成功驗證的css */
        span.error-tips,
        span.error-tips::before {
            font-family: "Font Awesome 5 Free";
            color: red;
            font-weight: 900;
            content: "\f071";
        }

        span.valid-tips,
        span.valid-tips::before {
            font-family: "Font Awesome 5 Free";
            color: greenyellow;
            font-weight: 900;
            content: "\f00c";
        }
    </style>
</head>
<script src="https://kit.fontawesome.com/8c4318e451.js" crossorigin="anonymous"></script>

<body>
    <section id="header">
        <!-- 將section header分切出來為navbar.php -->
        <!-- 引入導覽列檔 -->
        <?php require_once("./navbar.php"); ?>
    </section>
    <?php
    //送出表單將資料寫入資料庫
    if (isset($_POST['formctl']) and $_POST['formctl'] == 'reg') {
        $email = $_POST['email'];
        $pw1 = md5($_POST['pw1']);
        $cname = $_POST['cname'];
        $tssn = $_POST['tssn'];
        $birthday = $_POST['birthday'];
        $mobile = $_POST['mobile'];
        $myzip = $_POST['myZip'] == '' ? NULL : $_POST['myZip'];
        $address = $_POST['address'] == '' ? NULL : $_POST['address'];
        $imgname = $_POST['uploadname'] == '' ? NULL : $_POST['uploadname'];
        $insertsql = "INSERT INTO member (email,pw1,cname,tssn,birthday,imgname) VALUES ('" . $email . "','" . $pw1 . "','" . $cname . "','" . $tssn . "','" . $birthday . "','" . $imgname . "')";
        $Result = mysqli_query($link, $insertsql);
        if ($Result) {
            //讀取剛新增的會員編號
            $sqlString = sprintf("SELECT emailid FROM member WHERE email='%s'", $email);
            $Result1 = mysqli_query($link, $sqlString);
            $data = mysqli_fetch_array($Result1);
            //將會員的姓名、電話、郵遞區號、地址寫入addbook
            $insertsql = "INSERT INTO addbook (emailid, setdefault, cname, mobile, myzip, address) VALUES('" . $data['emailid'] . "','1','" . $cname . "','" . $mobile . "','" . $myzip . "','" . $address . "')";
            $Result = mysqli_query($link, $insertsql);
            //設定會員直接登入
            $_SESSION['login'] = true;
            $_SESSION['emailid'] = $data['emailid'];
            $_SESSION['email'] = $email;
            $_SESSION['cname'] = $cname;
            echo "<script language='javascript'>alert('謝謝您，會員資料已完成註冊');location.href ='index.php';</script>";
        }
    }
    ?>
    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-2">
                    <!-- 使用引入檔產品類別sidebar -->
                    <?php require_once("./sidebar.php"); ?>
                    <!-- 使用引入檔熱銷商品hot -->
                    <?php require_once("./hot.php"); ?>
                </div>

                <div class="col-md-12 col-lg-6">
                    <h5>
                        <marquee behavior="" direction="">會員註冊相關問題，請洽客服中心/聯絡我們Alice Poker Night 專業客服，請留下電話，立即為您服務，開啟您美好的賭場夜生活。</marquee>
                    </h5>
                    <!-- 會員註冊 -->
                    <div class="mycard mycard-container">
                        <div class="row">
                            <div class="col-lg-12 text-center product">
                                <img id="profile-img" class="profile-img-card" src="images/logo03.png" />
                                <P class="profile-name-card animated bounceInDown">會員註冊</P>
                                <p>請輸入相關資料，*為必需輸入欄位</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 col-lg-10 offset-1 text-left">
                                <form id="reg" name="reg" action="register.php" method="post">
                                    <div class="row form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="*請輸入email帳號">
                                    </div>
                                    <div class="row form-group">
                                        <input type="password" class="form-control" id="pw1" name="pw1" placeholder="*請輸入密碼">
                                    </div>
                                    <div class="row form-group">
                                        <input type="password" class="form-control" id="pw2" name="pw2" placeholder="*請再次確認密碼">
                                    </div>
                                    <div class="row form-group">
                                        <input type="text" class="form-control" id="cname" name="cname" placeholder="*請輸入姓名">
                                    </div>
                                    <div class="row form-group">
                                        <input type="text" class="form-control" id="tssn" name="tssn" placeholder="*請輸入身份證字號">
                                    </div>
                                    <div class="row form-group">
                                        <input type="text" class="form-control" id="birthday" name="birthday" onfocus="(this.type='date')" placeholder="*請選擇生日">
                                    </div>
                                    <div class="row form-group">
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="*請輸入手機號碼">
                                    </div>
                                    <div class="row form-group">
                                        <select name="myCity" id="myCity" class="form-control">
                                            <option value="">請選擇市區</option>
                                            <?php $city = "SELECT * FROM `city` WHERE State=0";
                                            $city_rs = mysqli_query($link, $city);
                                            while ($city_rows = mysqli_fetch_array($city_rs)) { ?>
                                                <option value="<?php echo $city_rows['AutoNo']; ?>">
                                                    <?php echo $city_rows['Name']; ?></option>
                                            <?php } ?>
                                        </select><br>
                                        <select name="myTown" id="myTown" class="form-control">
                                            <option value="">請選擇地區</option>
                                        </select>
                                    </div>
                                    <div class="row form-group">
                                        <p id="zipcode" name="zipcode" class="product">郵地區號：地址</p>
                                        <input type="hidden" id="myZip" name="myZip" value="" />
                                        <input type="text" class="form-control" name="address" id="address" placeholder="*請輸入後續地址">
                                    </div>
                                    <div class="row form-group">
                                        <p style="margin-bottom:0px;" class="product">上傳相片圖示</p>
                                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" title="請上傳相片圖示" accept="image/x-png,image/jpeg,image/gif,image/jpg">
                                        <p><button type="button" class="btn btn-danger" id="uploadForm" name="uploadForm" style="margin-top:5px;">開始上傳</button></p>
                                        <div id="progress-div01" class="progress" style="width: 100%; display:none;">
                                            <div id="progress-bar01" class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">0%</div>
                                            <!-- 插入progress-bar項目 -->
                                        </div>
                                        <input type="hidden" id="uploadname" name="uploadname" value="" />
                                        <img id="showimg" name="showimg" src="" class="img-fluid" alt="photo" style="display: none;">
                                    </div>
                                    <div class="row form-group">
                                        <input type="hidden" id="captcha" name="captcha" value=''>
                                        <!-- 建立認證碼功能 -->
                                        <a href="javascript:void(0);" title="按我更新認證碼" onclick="gencode01(60,35,10,8,'blue','white',5,250,5,'captcha','renew');">
                                            <script type="text/javascript">
                                                gencode01(60, 35, 10, 8, 'blue', 'white', 5, 250, 5, 'captcha', 'new');
                                            </script>
                                        </a>
                                        <input type="text" class="form-control" id="recaptcha" name="recaptcha" placeholder="*請輸入認證碼">
                                    </div>
                                    <input type="hidden" id="formctl" name="formctl" value="reg">
                                    <div class="row text-center">
                                        <button type="submit" class="btn btn-signin mt-4">送出</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-0 col-lg-4">
                    <!-- 使用引入檔：mp4影片main.php -->
                    <?php require_once("./main.php"); ?>
                </div>
            </div>
        </div>
    </section>
    <section id="scontent">
        <!-- 使用引入檔服務說明scontent -->
        <?php require_once("./scontent.php"); ?>
    </section>
    <section id="footer">
        <!-- 使用引入檔聯絡資訊footer -->
        <?php require_once("./footer.php"); ?>
    </section>
    <!-- 使用引入檔  javascript檔 -->
    <?php require_once("./jsfile.php"); ?>
    <!-- 引入jquery驗證程式 -->
    <script type="text/javascript" src="jquery.validate.js"></script>
    <!-- 建立查詢鄕鎮市名稱功能 -->
    <script type="text/javascript">
        //取得縣市碼後查詢鄕鎮市名稱放入#myTown
        $('#myCity').change(function() {
            var CNo = $('#myCity').val();
            $.ajax({
                url: 'Town_ajax.php',
                type: 'post',
                dataType: 'json',
                data: {
                    CNo: CNo
                },
                success: function(data) {
                    if (data.c == true) {
                        $('#myTown').html(data.m);
                        $('#myZip').val(""); //避免重新選擇縣市後郵地區號還存在，所以在重新選擇縣市後郵地區號欄位先清空
                    } else {
                        alert("Database reponse error:" + data.m);
                    }
                },
                error: function(data) {
                    alert("系統目前無法連接到後台資料庫");
                }
            });
        });
        //選鄕鎮市後，查詢郵遞區號放入#myZip,#zipcode
        $('#myTown').change(function() {
            var AutoNo = $('#myTown').val();
            $.ajax({
                url: 'Zip_ajax01.php',
                type: 'get',
                dataType: 'json',
                data: {
                    AutoNo: AutoNo
                },
                success: function(data) {
                    if (data.c == true) {
                        $('#myZip').val(data.Post);
                        $('#zipcode').html(data.Post + data.Cityname + data.Name);
                    } else {
                        alert("Database reponse error:" + data.m);
                    }
                },
                error: function(data) {
                    alert("系統目前無法連接到後台資料庫");
                }
            });
        });
        // 上傳jquery程式
        $(function() {
            $('#uploadForm').click(function(e) {
                var fileName = $('#fileToUpload').val();
                var idxDot = fileName.lastIndexOf(".") + 1;
                var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {
                    $("#progress-div01").css("display", "flex");
                    var file1 = getId("fileToUpload").files[0];
                    var formdata = new FormData();
                    formdata.append("file1", file1);
                    var ajax = new XMLHttpRequest();
                    ajax.upload.addEventListener("progress", progressHandler, false);
                    ajax.addEventListener("load", completeHandler, false);
                    ajax.addEventListener("error", errorHandler, false);
                    ajax.addEventListener("abort", abortHandler, false);
                    ajax.open("POST", "file_upload_parser.php");
                    ajax.send(formdata);
                    return false;
                } else {
                    alert("目前只支援jpg，jpeg，png，gif檔案格式上傳!");
                }
            });
            //驗證email欄位功能程式, form #reg表單
            $('#reg').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        remote: 'checkemail.php'
                    },
                    pw1: {
                        required: true,
                        maxlength: 20,
                        minlength: 4,
                    },
                    pw2: {
                        required: true,
                        equalTo: '#pw1'
                    },
                    cname: {
                        required: true,
                    },
                    tssn: {
                        required: true,
                        tssn: true
                    },
                    birthday: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                        checkphone: true,
                    },
                    address: {
                        required: true,
                    },
                    recaptcha: {
                        required: true,
                        equalTo: '#captcha',
                    }
                },

                messages: {
                    email: {
                        required: ' email信箱不得為空白',
                        email: ' email信箱格式有誤',
                        remote: ' email信箱已經註冊'
                    },
                    pw1: {
                        required: '密碼不得為空白',
                        maxlength: '密碼最大長度為20位(4-20位英文字母與數字的組合)',
                        minlength: '密碼最大長度為20位(4-20位英文字母與數字的組合)'
                    },
                    pw2: {
                        required: '確認密碼不得為空白',
                        equalTo: '兩次輸入的密碼必須一致！'
                    },
                    cname: {
                        required: '使用者名稱不得為空白',
                    },
                    tssn: {
                        required: '身份證ID不得為空白',
                        tssn: '身份證ID格式有誤'
                    },
                    birthday: {
                        required: '生日不得為空白',
                    },
                    mobile: {
                        required: '手機號碼不得為空白',
                        checkphone: '手機號碼格式有誤',
                    },
                    address: {
                        required: '地址不得為空白',
                    },
                    recaptcha: {
                        required: '驗證碼不得為空白！',
                        equalTo: '驗證碼需相同！',
                    }
                },
            });
            //自訂身份證格式驗證
            jQuery.validator.addMethod("tssn", function(value, element, param) {
                var tssn = /^[a-zA-Z]{1}[1-2]{1}[0-9]{8}$/;
                return this.optional(element) || (tssn.test(value));
            }, "身份證格式有誤!");
            //自訂電話驗證
            jQuery.validator.addMethod("checkphone", function(value, element, param) {
                var checkphone = /^[0-9]{10}$/;
                return this.optional(element) || (checkphone.test(value));
            }, "電話格式有誤!");
            //自訂認證碼格式驗證
            jQuery.validator.addMethod("captcha", function(value, element, param) {
                var captcha = /^[0-9a-z_A-Z]{5}$/;
                return this.optional(element) || (captcha.test(value));
            }, "驗證碼格式有誤!");
        });
        // 上傳函數
        //取得元件id
        function getId(el) {
            return document.getElementById(el);
        }

        //上傳過程顯示%百分比
        function progressHandler(event) {
            var percent = Math.round((event.loaded / event.total) * 100);
            $("#progress-bar01").css("width", percent + "%");
            $("#progress-bar01").html(percent + "%");
        }
        //上傳完成處理顯示圖片
        function completeHandler(event) {
            var data = JSON.parse(event.target.responseText);
            if (data.success == 'true') {
                $('#uploadname').val(data.filename);
                $('#showimg').attr({
                    'src': 'uploads/' + data.filename,
                    'style': 'display:block;'
                });
                $('button.btn.btn-danger').attr({
                    'style': 'display:none;'
                });
            } else {
                alert(data.error);
            }
        }
        //Upload Failed:上傳發生錯誤處理
        function errorHandler(event) {
            alert("Upload Failed:上傳發生錯誤");
        }
        //Upload Aborted:上傳作業取消處理
        function abortHandler(event) {
            alert("Upload Aborted:上傳作業取消");
        }
    </script>
</body>

</html>