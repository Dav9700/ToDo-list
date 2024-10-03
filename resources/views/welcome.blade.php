<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>To Do list page </h1>
    @guest
     <a href="{{route('login')}}">Log in</a>
     <br>
     <a href="{{route('register')}}">Registration</a>
    @endguest
        
    @auth
        
        <a href="{{route('get-logout')}}">Exit</a>      
    @endauth

</body>
</html>