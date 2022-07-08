<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>Kemendikbil</title>
    <script src="https://kit.fontawesome.com/5038156ed8.js" crossorigin="anonymous"></script>
</head>

<body>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/">Informasi Covid 19</a></li>
        <li><a href="/">Edukasi Perubahan Perilaku</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Foto dan Video</a>
            <div class="dropdown-content">
                <a href="#">Foto</a>
                <a href="#">Video</a>
            </div>
        <li class="nav-item">
      	@auth
      		<a class="nav-link" href="{{ route('admin') }}">Dashboard</a>
      	@else
      		<a class="nav-link" href="{{ route('login') }}">Login</a>
      	@endauth
      </li>

    </ul>
