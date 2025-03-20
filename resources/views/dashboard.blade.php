<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Grand Archives</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Reset and base styles */
        a, button, input, select, h1, h2, h3, h4, h5, * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            border: none;
            text-decoration: none;
            background: none;
            -webkit-font-smoothing: antialiased;
        }
        menu, ol, ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .home-container {
            display: flex;
            width: 1660px;
            margin: 0 auto;
            position: relative;
            justify-content: center;
        }
        .home-page {
            background: #121246;
            height: 832px;
            position: relative;
            overflow: hidden;
            width: 1660px;
            transition: width 0.3s ease-in-out;
        }
        .home-page.nav-active {
            width: 1351px;
        }
        .rectangle-5 {
            background: #d4a373;
            width: 1351px;
            height: 98px;
            position: absolute;
            left: 0px;
            top: 0px;
            border-bottom: 2px solid #b5835a;
            z-index: 1;
        }
        .home-title {
            color: #121246;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 40px;
            font-weight: 600;
            position: absolute;
            left: 588px;
            top: 29px;
            width: 174px;
            height: 40px;
            z-index: 2;
        }
        .trending {
            color: #d4a373;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 36px;
            font-weight: 400;
            position: absolute;
            left: 150px;
            top: 120px;
            width: 248px;
        }
        .trending2 {
            color: #d4a373;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 36px;
            font-weight: 400;
            position: absolute;
            left: 551px;
            top: 120px;
            width: 248px;
        }
        .trending3 {
            color: #d4a373;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 36px;
            font-weight: 400;
            position: absolute;
            left: 953px;
            top: 120px;
            width: 248px;
        }
        /* Navigation styles */
        .navigation {
            width: 309px;
            background: #121246;
            height: 832px;
            position: relative;
            transform: translateX(-309px);
            transition: transform 0.3s ease-in-out;
            z-index: 10;
        }
        .navigation.active {
            transform: translateX(0);
        }
        .menu-button {
            position: absolute;
            left: 20px;
            top: 20px;
            cursor: pointer;
            z-index: 20;
            color: #d4a373;
            font-size: 24px;
            background: transparent;
            padding: 5px;
        }
        .menu-button:hover {
            color: #b5835a;
        }
        /* Book container styles */
        .book-container {
            display: flex;
            justify-content: space-between;
            width: 1351px;
            position: absolute;
            top: 200px;
            left: 0;
            padding: 0 150px;
        }
        .book-card {
            width: 248px;
            height: 282px;
            background: #712222;
            border-radius: 29px;
            border: 1px solid #b5835a;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .book-card:hover {
            transform: scale(1.05);
        }
        .book-card img {
            width: 155px;
            height: 238px;
            object-fit: cover;
            display: block;
            margin: 15px auto 0;
            border-radius: 10px;
        }
        .book-card p {
            color: #d4a373;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 16px;
            padding: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <div class="home-container">
        <div class="navigation">
            @include('partials.navigation')
        </div>
        <div class="home-page">
            <button class="menu-button">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="rectangle-5"></div>
            <div class="home-title">DASHBOARD</div>
            <div class="trending">Trending</div>
            <div class="trending2">Top Books</div>
            <div class="trending3">Most Read</div>
            <div class="book-container">
                @foreach($books as $book)
                    <div class="book-card">
                        <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}">
                        <p>{{ $book->title }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.menu-button');
            const navigation = document.querySelector('.navigation');
            const homePage = document.querySelector('.home-page');

            menuButton.addEventListener('click', function() {
                navigation.classList.toggle('active');
                homePage.classList.toggle('nav-active');
            });
        });
    </script>
</body>
</html>