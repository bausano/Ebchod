<!DOCTYPE html>
<html>
    <head>
        <title>Ebchod</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="/css/glob.css" rel="stylesheet" type="text/css">
        <link href="/css/login.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="login shadow">
            <form method="POST" action="/admin/login">
                {!! csrf_field() !!}

                <div class="item">
                    Email
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="item">
                    Password
                    <input type="password" name="password" id="password">
                </div>

                <div class="item">
                    <label for="remember">Remember Me</label>
                    <input type="checkbox" name="remember" id="remember"> 
                </div>

                <div>
                    <button type="submit" class="orange">Login</button>
                </div>
            </form>
        </div>

    </body>
</html>