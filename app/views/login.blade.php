<!doctype html>
<html lang="eng">
    <head>
        <meta charset="UTF-8">
        <title>Login To Admin Part</title>
        <style>
            body {
                margin: 0;
                font-family: sans-serif;
                color: #888888;
            }
            .login-content {
                width: 400px;
                height: 270px;
                position: absolute;
                left: 50%;
                top: 50%;
                margin-left: -200px;
                margin-top: -135px;
                padding: 30px 20px 30px 20px;
                text-align: center;
                font-size: 14px;
                background-color: #EEEEEE;
                border: #999999 solid 1px;
                border-radius: 6px;
            }
            .login-inputs-container{
                display: inline-block;
                text-align: left;
                margin: 5px auto 10px auto;
            }

            .login-inputs-container h5{
                font-size: 13px;
                margin: 5px auto 5px auto;
            }
            .login-input{
                width: 250px;
                height: 25px;
                margin-bottom: 15px;
                padding: 0 10px;
                line-height: 25px;
                font-size: 13px;
                background-color: #FFFFFF !important;
                border: #999999 solid 1px;
                border-radius: 3px;
            }
            .login-footer{
                padding: 15px;
            }
            .login-button{
                /*height: 30px;*/
                /*line-height: 30px;*/
                font-size: 16px;
                font-weight: bold;
                color: #666666;
                padding: 8px 25px;
                border: #999999 solid 1px;
                border-radius: 3px;
            }
        </style>
    </head>
    <body>
        <div class="login-content">
            <h2>Welcome To Administrative Part</h2>
            <form action="{{{action('AuthController@tryLogin')}}}" method="POST">
                <span class="login-inputs-container">
                    <h5>Type E-mail You've registered in system</h5>
                    <input type="email" name="email" class="login-input"><br/>
                    <h5>Type Your Password</h5>
                    <input type="password" name="password" class="login-input"><br/>
                </span>
                <div class="login-footer">
                    <input type="submit" class="login-button" value="Sign In">
                </div>
            </form>
        </div>
    </body>
</html>