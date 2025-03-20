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
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
            background: #121246;
            color: #fff;
        }

        .home-container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            justify-content: center;
        }

        .home-page {
            background: #121246;
            height: 100vh;
            position: relative;
            overflow: hidden;
            width: 100%;
            transition: width 0.3s ease-in-out;
        }

        .rectangle-5 {
            background: #d4a373;
            width: 100%;
            height: 80px;
            position: absolute;
            left: 0;
            top: 0;
            border-bottom: 2px solid #b5835a;
            z-index: 1;
        }

        .home-title {
            color: #121246;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 24px;
            font-weight: 600;
            position: absolute;
            left: 50%;
            top: 20px;
            transform: translateX(-50%);
            z-index: 2;
        }

        .trending {
            color: #d4a373;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 24px;
            font-weight: 400;
            position: absolute;
            left: 20px;
            top: 100px;
        }

        .trending2, .trending3 {
            color: #d4a373;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 24px;
            font-weight: 400;
            position: absolute;
            top: 100px;
        }

        .trending2 {
            left: 40%;
        }

        .trending3 {
            left: 70%;
        }

        /* Navigation styles */
        .navigation {
            width: 250px;
            background: #121246;
            height: 100vh;
            position: fixed;
            left: -250px;
            transition: transform 0.3s ease-in-out;
            z-index: 10;
        }

        .navigation.active {
            transform: translateX(250px);
        }

        .menu-button {
            position: fixed;
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
            flex-wrap: wrap;
            justify-content: space-around;
            width: 100%;
            position: absolute;
            top: 150px;
            padding: 0 20px;
        }

        .book-card {
            width: 200px;
            height: 250px;
            background: #712222;
            border-radius: 15px;
            border: 1px solid #b5835a;
            overflow: hidden;
            transition: transform 0.2s;
            margin: 10px;
        }

        .book-card:hover {
            transform: scale(1.05);
        }

        .book-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
            border-radius: 10px 10px 0 0;
        }

        .book-card p {
            color: #d4a373;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 14px;
            padding: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media (max-width: 768px) {
            .home-title {
                font-size: 20px;
            }

            .trending, .trending2, .trending3 {
                font-size: 18px;
            }

            .book-card {
                width: 150px;
                height: 200px;
            }

            .book-card img {
                height: 130px;
            }

            .book-card p {
                font-size: 12px;
            }
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