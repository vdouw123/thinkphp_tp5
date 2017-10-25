<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>Login</title>
    <meta charset="utf-8"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/layer/layer.js"></script>
    <script src="js/global.js"></script>
</head>
<body>
<div class="login-form">
    <div class="close"></div>
    <div class="head-info">
        <label class="lbl-1"> </label>
        <label class="lbl-2"> </label>
        <label class="lbl-3"> </label>
    </div>
    <div class="clear"></div>
    <div class="avtar"><img src="images/avtar.png"/></div>
    <form>
        <input type="text" class="text" name="username" value="admin"/>
        <div class="key">
            <input type="password" value="123456" name="password"/>
        </div>
    </form>
    <div class="signin">
        <input type="button" value="Login" onclick="login.check();">
    </div>
</div>

<script>
    $(document).ready(function (c) {
        setTimeout(function () {
            window.scrollTo(0, 1);
        }, 0);
        $('.close').on('click', function (c) {
            $('.login-form').fadeOut('slow', function (c) {
                $('.login-form').remove();
            });
        });
    });

    var login = {
        check: function () {
            //alert("你点击了后台登录页面的登录按钮");
            var username = $('input[name="username"]').val();
            var password = $('input[name="password"]').val();
            //if(username==""){dialog.error("用户名不能为空");}
            //if(password==""){dialog.error("密码不能为空");}
            var url = "/index.php/Admin/Login/check";
            var data = {'username': username, 'password': password};
            $.post(url, data, function (result) {
                if (result.status == 0) {
                    return dialog.error(result.message);
                }
                if (result.status == 1) {
                    return dialog.success(result.message, '/index.php/Admin/Index/index');
                }
            }, 'JSON');
        }
    };
</script>

</body>
</html>