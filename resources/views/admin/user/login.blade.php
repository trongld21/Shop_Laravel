<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        #login-main {
            widows: 100vw;
            height: 100vh;
            background: #95a5a6;
            background-image: url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_embroidery.png);
            font-family: 'Helvetica Neue', Arial, Sans-Serif;
        }

        #login-main .login-wrap {
            position: relative;
            margin: 0 auto;
            background: #ecf0f1;
            width: 350px;
            border-radius: 5px;
            box-shadow: 3px 3px 10px #333;
            padding: 15px;
            top: 10vh;
        }

        #login-main .login-wrap h2 {
            text-align: center;
            font-weight: 200;
            font-size: 2em;
            margin-top: 10px;
            color: #34495e;
        }

        #login-main .login-wrap .form {
            padding-top: 20px;
        }

        #login-main .login-wrap .form input[type="text"],
        #login-main .login-wrap .form input[type="password"],
        #login-main .login-wrap .form button {
            width: 80%;
            margin-left: 10%;
            margin-bottom: 25px;
            height: 40px;
            border-radius: 5px;
            outline: 0;
            -moz-outline-style: none;
        }

        #login-main .login-wrap .form input[type="text"],
        #login-main .login-wrap .form input[type="password"] {
            border: 1px solid #bbb;
            padding: 0 0 0 10px;
            font-size: 14px;
        }

        #login-main .login-wrap .form input[type="text"]:focus,
        #login-main .login-wrap .form input[type="password"]:focus {
            border: 1px solid #3498db;
        }

        #login-main .login-wrap .form a {
            text-align: center;
            font-size: 10px;
            color: #3498db;
        }

        #login-main .login-wrap .form a p {
            padding-bottom: 10px;
        }

        #login-main .login-wrap .form button {
            background: #e74c3c;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: 200;
            cursor: pointer;
            transition: box-shadow 0.4s ease;
        }

        #login-main .login-wrap .form button:hover {
            box-shadow: 1px 1px 5px #555;
        }

        #login-main .login-wrap .form button:active {
            box-shadow: 1px 1px 7px #222;
        }

        #login-main .login-wrap:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background: -webkit-linear-gradient(left, #27ae60 0%, #27ae60 20%, #8e44ad 20%, #8e44ad 40%, #3498db 40%, #3498db 60%, #e74c3c 60%, #e74c3c 80%, #f1c40f 80%, #f1c40f 100%);
            background: -moz-linear-gradient(left, #27ae60 0%, #27ae60 20%, #8e44ad 20%, #8e44ad 40%, #3498db 40%, #3498db 60%, #e74c3c 60%, #e74c3c 80%, #f1c40f 80%, #f1c40f 100%);
            height: 5px;
            border-radius: 5px 5px 0 0;
        }
    </style>
</head>

<body>
    <section id="login-main">
        <div class="login-wrap">
            <h2>Admin Login</h2>
            @include('admin.alert')
            <form method="POST" action="/admin/user/login/store" class="form">
                @csrf
                <!-- Equivalent to... -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="text" name="username" placeholder="Username" name="un" />
                <input type="password" name="password" placeholder="Password" name="pw" />
                <button type="submit"> Sign in </button>
                <a href="javascript:void(0)">
                    <p> Don't have an account? Register </p>
                </a>
            </form>
        </div>
    </section>
</body>
