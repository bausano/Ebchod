<!DOCTYPE html>
<html>
    <head>
        <title>Ebchod | Login</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="/css/glob.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <form method="post" class="login" action="">
            {!! csrf_field() !!}
            <input type="email" name="email" value="{{ old('email') }}">
            <input type="password" name="password" id="password">
            <label for="remember">Remember Me</label>
            <input type="checkbox" name="remember" id="remember"> 
            <button type="submit" class="btn">Login</button>
        </form>
    </body>
</html>