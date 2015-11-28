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
            <form method="POST" action="/admin/register">
                {!! csrf_field() !!}

                <div class="item">
                    Name
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>

                <div class="item">
                    Email
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="item">
                    Password
                    <input type="password" name="password">
                </div>

                <div class="item">
                    Confirm Password
                    <input type="password" name="password_confirmation">
                </div>

                <div>
                    <button type="submit" class="orange">Register</button>
                </div>
            </form>
        </div>

    </body>
</html>