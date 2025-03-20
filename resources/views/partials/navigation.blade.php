<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation - Grand Archives</title>

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
        .component-1,
        .component-1 * {
            box-sizing: border-box;
        }
        .component-1 {
            width: 309px;
            height: 832px;
            position: relative;
            background: #121246;
        }
        .rectangle-3 {
            width: 309px;
            height: 844px;
            position: absolute;
            left: 0px;
            top: calc(50% - 422px);
            background: rgba(52, 28, 28, 0.8);
            overflow: visible;
        }
        .home, .catalogs, .transaction, .favorites, .profile {
            color: #ffffff;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 20px;
            font-weight: 400;
            position: absolute;
            right: 0%;
            left: 0%;
            width: 100%;
            height: 7.81%;
            line-height: 65px;
        }
        .home { bottom: 53.37%; top: 38.82%; }
        .catalogs { bottom: 46.15%; top: 46.03%; }
        .transaction { bottom: 38.34%; top: 53.85%; }
        .favorites { bottom: 30.77%; top: 61.42%; }
        .profile { bottom: 22.96%; top: 69.23%; }
        .grand-archives {
            color: #ffffff;
            text-align: center;
            font-family: "JacquesFrancoisShadow-Regular", sans-serif;
            font-size: 36px;
            font-weight: 400;
            position: absolute;
            right: 0%;
            left: 0%;
            width: 100%;
            bottom: 65.87%;
            top: 23.56%;
            height: 10.58%;
            line-height: 88px;
        }
        .logo-1-removebg-preview-1 {
            width: 299px;
            height: 299px;
            position: absolute;
            left: 5px;
            top: -39px;
            object-fit: cover;
            aspect-ratio: 1;
        }
        .nav-link {
            color: #ffffff;
            display: block;
            width: 100%;
            height: 100%;
            transition: background-color 0.3s;
        }
        .nav-link:hover {
            background-color: rgba(181, 131, 90, 0.2);
            color: #d4a373;
        }
    </style>
</head>
<body>
    <div class="component-1">
        <div class="rectangle-3"></div>
        <div class="grand-archives">GRAND ARCHIVES</div>
        <div class="home">
            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        </div>
        <div class="catalogs">
            <a href="{{ route('catalogs') }}" class="nav-link">Catalogs</a>
        </div>
        <div class="transaction">
            <a href="{{ route('transaction') }}" class="nav-link">Transaction</a>
        </div>
        <div class="favorites">
            <a href="{{ route('favorites') }}" class="nav-link">Favorites</a>
        </div>
        <div class="profile">
            <a href="{{ route('profile.edit') }}" class="nav-link">Profile</a>
        </div>
        <img class="logo-1-removebg-preview-1" src="{{ asset('images/logo-1-removebg-preview-10.png') }}" alt="Grand Archives Logo" />
    </div>
</body>
</html>