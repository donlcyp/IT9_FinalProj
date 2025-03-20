<!-- resources/views/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Grand Archives</title>
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
        .profile-container {
            display: flex;
            width: 1660px;
            margin: 0 auto;
            position: relative;
            justify-content: center;
        }
        .profile-page {
            background: #121246;
            height: 832px;
            position: relative;
            overflow: hidden;
            width: 1660px;
            transition: width 0.3s ease-in-out;
        }
        .profile-page.nav-active {
            width: 1351px;
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
        .profile-title {
            color: #121246;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 40px;
            font-weight: 400;
            position: absolute;
            left: 520px;
            top: 26px;
            width: 239px;
            height: 72px;
            z-index: 2;
        }
        /* Rectangle-6 styles */
        .rectangle-6 {
            border-radius: 0px;
            height: 693px;
            position: absolute;
            top: 139px;
            left: 50%;
            transform: translateX(-50%);
            overflow: visible;
            width: auto; /* Adjust based on your SVG */
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
    <div class="profile-container">
        <div class="navigation">
            @include('partials.navigation')
        </div>
        <div class="profile-page">
            <button class="menu-button">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="rectangle-5"></div>
            <div class="profile-title">PROFILE</div>
            <img class="rectangle-6" src="{{ asset('images/rectangle-6.svg') }}" alt="Profile Background" />
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.menu-button');
            const navigation = document.querySelector('.navigation');
            const profilePage = document.querySelector('.profile-page');

            menuButton.addEventListener('click', function() {
                navigation.classList.toggle('active');
                profilePage.classList.toggle('nav-active');
            });
        });
    </script>
</body>
</html>