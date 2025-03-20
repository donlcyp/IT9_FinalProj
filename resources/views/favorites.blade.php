<!-- resources/views/favorites.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites - Grand Archives</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" />
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
        /* Container and page styles */
        .favorites-container {
            display: flex;
            width: 1660px;
            margin: 0 auto;
            position: relative;
            justify-content: center;
        }
        .favorites-page {
            background: #121246;
            height: 832px;
            position: relative;
            overflow: hidden;
            width: 1660px;
            transition: width 0.3s ease-in-out;
        }
        .favorites-page.nav-active {
            width: 1351px;
        }
        .rectangle-4 {
            background: #121246;
            width: 25px;
            height: 832px;
            position: absolute;
            left: 0px;
            top: 0px;
        }
        .rectangle-5 {
            background: #d4a373;
            width: 1351px;
            height: 98px;
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: 1;
        }
        .rectangle-8 {
            background: #d4a373;
            border-radius: 51px;
            width: 1185px;
            height: 609px;
            position: absolute;
            left: 50px;
            top: 192px;
        }
        .favorites {
            color: #121246;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 40px;
            font-weight: 400;
            position: absolute;
            left: 520px;
            top: 24px;
            width: 239px;
            height: 72px;
            z-index: 2;
        }
        .rectangle-7 {
            background: #d9d9d9;
            border-radius: 8px;
            width: 537px;
            height: 47px;
            position: absolute;
            left: 371px;
            top: 120px;
        }
        .magnifying-1 {
            width: 41px;
            height: 41px;
            position: absolute;
            left: 861px;
            top: 123px;
            object-fit: cover;
            aspect-ratio: 1;
        }
        /* Book card styles */
        .book-container {
            position: absolute;
            top: 238px;
            left: 112px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            width: 1060px;
        }
        .book-card {
            width: 146px;
            height: 224px;
            transition: transform 0.2s;
        }
        .book-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .book-card:hover {
            transform: scale(1.05);
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
    </style>
</head>
<body>
    <div class="favorites-container">
        <div class="navigation">
            @include('partials.navigation')
        </div>
        <div class="favorites-page">
            <button class="menu-button">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="rectangle-4"></div>
            <div class="rectangle-5"></div>
            <div class="rectangle-8"></div>
            <div class="favorites">Favorites</div>
            <div class="rectangle-7"></div>
            <img class="magnifying-1" src="{{ asset('images/magnifying-10.png') }}" alt="Search" />
            @if($favorites->isEmpty())
                <p style="color: #d4a373; text-align: center; margin-top: 300px;">No favorite books yet!</p>
            @else
                <div class="book-container">
                    @foreach($favorites as $book)
                        <div class="book-card">
                            <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->title }}">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.menu-button');
            const navigation = document.querySelector('.navigation');
            const homePage = document.querySelector('.favorites-page');

            menuButton.addEventListener('click', function() {
                navigation.classList.toggle('active');
                homePage.classList.toggle('nav-active');
            });
        });
    </script>
</body>
</html>