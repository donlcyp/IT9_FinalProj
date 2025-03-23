<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation - Grand Archives</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" />
    @vite(['resources/css/app.css'])

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            border: none;
            text-decoration: none;
            -webkit-font-smoothing: antialiased;
        }

        body, html {
            height: 100%;
            font-family: "Inter-Regular", sans-serif;
            background: #121246;
            color: #fff;
            overflow-x: hidden;
        }

        .catalog-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
            position: relative;
        }

        /* Navigation Sidebar */
        .navigation {
            width: 309px;
            height: 100vh;
            background: #121246;
            position: fixed;
            left: -309px;
            top: 0;
            transition: left 0.3s ease-in-out;
            z-index: 10;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
            overflow-y: auto;
        }

        .navigation.active {
            left: 0;
        }

        .nav-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            padding: 20px 0;
        }

        .nav-logo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .nav-title {
            color: #ffffff;
            text-align: center;
            font-family: "JacquesFrancoisShadow-Regular", sans-serif;
            font-size: 28px;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .nav-links {
            list-style: none;
            width: 100%;
            padding: 0;
        }

        .nav-links li {
            width: 100%;
        }

        .nav-links a {
            display: block;
            color: #ffffff;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 18px;
            font-weight: 400;
            padding: 15px 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #d4a373;
            color: #121246;
        }

        /* Main Content */
        .catalog-page {
            flex: 1;
            background: #121246;
            min-height: 100vh;
            padding-left: 60px;
            transition: padding-left 0.3s ease-in-out;
            overflow-y: auto;
        }

        .catalog-page.nav-active {
            padding-left: 310px;
        }

        .menu-button {
            position: fixed;
            left: 20px;
            top: 20px;
            cursor: pointer;
            z-index: 20;
            color: #d4a373;
            font-size: 28px;
            background: transparent;
            transition: color 0.2s;
        }

        .menu-button:hover {
            color: #b5835a;
        }

        .header {
            background: #d4a373;
            width: 100%;
            height: 80px;
            position: fixed;
            left: 0;
            top: 0;
            border-bottom: 2px solid #b5835a;
            z-index: 1;
        }

        .header-title {
            color: #121246;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 28px;
            font-weight: 600;
            position: relative;
            top: 25px;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .navigation {
                width: 250px;
                left: -250px;
            }

            .nav-logo {
                width: 120px;
                height: 120px;
            }

            .nav-title {
                font-size: 24px;
                margin-bottom: 25px;
            }

            .nav-links a {
                font-size: 16px;
                padding: 12px 0;
            }

            .catalog-page {
                padding-left: 50px;
            }

            .catalog-page.nav-active {
                padding-left: 260px;
            }

            .header-title {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .navigation {
                width: 200px;
                left: -200px;
            }

            .nav-logo {
                width: 100px;
                height: 100px;
            }

            .nav-title {
                font-size: 20px;
                margin-bottom: 20px;
            }

            .nav-links a {
                font-size: 14px;
                padding: 10px 0;
            }

            .catalog-page {
                padding-left: 40px;
            }

            .catalog-page.nav-active {
                padding-left: 220px;
            }

            .menu-button {
                left: 10px;
                top: 15px;
            }

            .header-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="catalog-container">
        <!-- Navigation Sidebar -->
        <div class="navigation">
            <div class="nav-content">
                <img class="nav-logo" src="{{ asset('images/logo-1-removebg-preview-10.png') }}" alt="Grand Archives Logo" />
                <div class="nav-title">GRAND ARCHIVES</div>
                <ul class="nav-links">
                    <li><a href="{{ route('dashboard') }}">Home</a></li>
                    <li><a href="{{ route('catalogs') }}">Catalogs</a></li>
                    <li><a href="{{ route('transaction') }}">Transaction</a></li>
                    <li><a href="{{ route('favorites') }}">Favorites</a></li>
                    <li><a href="{{ route('user.profile') }}">Profile</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="catalog-page">
            <button class="menu-button">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="header"></div>
            <div class="header-title">Navigation</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.menu-button');
            const navigation = document.querySelector('.navigation');
            const catalogPage = document.querySelector('.catalog-page');

            menuButton.addEventListener('click', function() {
                navigation.classList.toggle('active');
                catalogPage.classList.toggle('nav-active');
            });
        });
    </script>
    @vite(['resources/js/app.js'])
</body>
</html>