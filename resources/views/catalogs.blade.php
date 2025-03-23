<!-- resources/views/catalogs.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogs - Grand Archives</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" />
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

        /* Navigation styles */
        .navigation {
            width: 250px;
            background: #121246;
            height: 100vh;
            position: fixed;
            left: -250px;
            top: 0;
            transition: left 0.3s ease-in-out;
            z-index: 10;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }

        .navigation.active {
            left: 0;
        }

        .menu-button {
            position: fixed;
            left: 20px;
            top: 20px;
            cursor: pointer;
            z-index: 20;
            color: #121246; /* Changed to match theme */
            font-size: 28px;
            background: transparent;
            border: none;
            transition: color 0.2s;
        }

        .menu-button:hover {
            color: #b5835a;
        }

        /* Main content styles */
        .catalog-selection-page {
            flex: 1;
            background: #121246;
            min-height: 100vh;
            padding-left: 0px;
            transition: padding-left 0.3s ease-in-out;
        }

        .catalog-selection-page.nav-active {
            padding-left: 310px;
        }

        .rectangle-5 {
            background: #d4a373;
            width: 100%;
            height: 80px;
            position: fixed;
            left: 0;
            top: 0;
            border-bottom: 2px solid #b5835a;
            z-index: 1;
        }

        .catalogs {
            color: #121246;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 28px;
            font-weight: 600;
            position: relative;
            top: 25px;
            z-index: 2;
        }

        /* Search bar styles */
        .search-container {
            display: flex;
            justify-content: center;
            margin: 100px 0 40px;
        }

        .rectangle-7 {
            background: #d9d9d9;
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
            height: 47px;
            display: flex;
            align-items: center;
            padding: 0 15px;
        }

        .search-input {
            flex: 1;
            background: transparent;
            color: #121246;
            font-family: "Inter-Regular", sans-serif;
            font-size: 16px;
            outline: none;
        }

        .magnifying-1 {
            width: 24px;
            height: 24px;
            margin-left: 10px;
            cursor: pointer;
        }

        /* Genre cards */
        .genre-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 0 20px;
            margin-bottom: 40px;
            max-height: 60vh; /* Limit height for scrolling */
            overflow-y: auto; /* Enable vertical scrolling */
        }

        .genre-grid::-webkit-scrollbar {
            width: 8px;
        }

        .genre-grid::-webkit-scrollbar-track {
            background: #121246;
        }

        .genre-grid::-webkit-scrollbar-thumb {
            background: #b5835a;
            border-radius: 4px;
        }

        .genre-card {
            background: #b5835a;
            border-radius: 12px;
            height: 86px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }

        .genre-card:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .genre-card div {
            color: #000000;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 20px;
            font-weight: 400;
            padding: 0 10px; /* Add padding for longer genre names */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .catalog-selection-page {
                padding-left: 50px;
            }

            .catalog-selection-page.nav-active {
                padding-left: 260px;
            }

            .catalogs {
                font-size: 22px;
            }

            .rectangle-7 {
                max-width: 400px;
            }

            .genre-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                max-height: 50vh;
            }

            .genre-card {
                height: 70px;
            }

            .genre-card div {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .navigation {
                width: 200px;
            }

            .catalog-selection-page.nav-active {
                padding-left: 220px;
            }

            .menu-button {
                left: 10px;
                top: 15px;
            }

            .rectangle-7 {
                max-width: 300px;
            }

            .genre-grid {
                max-height: 40vh;
            }
        }
    </style>
</head>
<body>
    <div class="catalog-container">
        <div class="navigation">
            @include('layouts.navigation')
        </div>
        <div class="catalog-selection-page">
            <button class="menu-button">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="rectangle-5"></div>
            <div class="catalogs">CATALOGS</div>
            <div class="search-container">
                <div class="rectangle-7">
                    <input type="text" class="search-input" placeholder="Search genres..." />
                    <img class="magnifying-1" src="{{ asset('images/magnifying-10.png') }}" alt="Search" />
                </div>
            </div>
            <div class="genre-grid">
                <div class="genre-card"><div>Fantasy</div></div>
                <div class="genre-card"><div>Sci-fi</div></div>
                <div class="genre-card"><div>Romance</div></div>
                <div class="genre-card"><div>Thriller</div></div>
                <div class="genre-card"><div>Comedy</div></div>
                <div class="genre-card"><a href="{{ route('catalog.show.crime-fiction') }}"><div>Crime Fiction</div></a></div>
                <div class="genre-card"><div>Western Fiction</div></div>
                <div class="genre-card"><div>Biography</div></div>
                <div class="genre-card"><div>Non-Fiction</div></div>
                <div class="genre-card"><div>Historical Fiction</div></div>
                <div class="genre-card"><div>Mystery</div></div>
                <div class="genre-card"><div>Horror</div></div>
                <div class="genre-card"><div>Adventure</div></div>
                <div class="genre-card"><div>Young Adult</div></div>
                <div class="genre-card"><div>Self-Help</div></div>
                <div class="genre-card"><div>Classics</div></div>
                <div class="genre-card"><div>Contemporary Fiction</div></div>
                <div class="genre-card"><div>Dystopian</div></div>
                <div class="genre-card"><div>Erotica</div></div>
                <div class="genre-card"><div>Graphic Novels</div></div>
                <div class="genre-card"><div>Literary Fiction</div></div>
                <div class="genre-card"><div>Magical Realism</div></div>
                <div class="genre-card"><div>Paranormal</div></div>
                <div class="genre-card"><div>Poetry</div></div>
                <div class="genre-card"><div>Psychological Thriller</div></div>
                <div class="genre-card"><div>Satire</div></div>
                <div class="genre-card"><div>Science</div></div>
                <div class="genre-card"><div>Spirituality</div></div>
                <div class="genre-card"><div>Sports</div></div>
                <div class="genre-card"><div>Travel</div></div>
                <div class="genre-card"><div>True Crime</div></div>
                <div class="genre-card"><div>Urban Fantasy</div></div>
                <div class="genre-card"><div>Women's Fiction</div></div>
                <div class="genre-card"><div>Children's Literature</div></div>
                <div class="genre-card"><div>Middle Grade</div></div>
                <div class="genre-card"><div>Cookbooks</div></div>
                <div class="genre-card"><div>Business</div></div>
                <div class="genre-card"><div>Technology</div></div>
                <div class="genre-card"><div>Health & Wellness</div></div>
                <div class="genre-card"><div>Philosophy</div></div>
                <div class="genre-card"><div>Political Fiction</div></div>
                <div class="genre-card"><div>Short Stories</div></div>
                <div class="genre-card"><div>Essays</div></div>
                <div class="genre-card"><div>Memoirs</div></div>
                <div class="genre-card"><div>Autobiographies</div></div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.menu-button');
            const navigation = document.querySelector('.navigation');
            const catalogPage = document.querySelector('.catalog-selection-page');

            menuButton.addEventListener('click', function() {
                navigation.classList.toggle('active');
                catalogPage.classList.toggle('nav-active');
            });

            // Basic search functionality
            const searchInput = document.querySelector('.search-input');
            const genreCards = document.querySelectorAll('.genre-card');

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();
                genreCards.forEach(card => {
                    const genreName = card.querySelector('div').textContent.toLowerCase();
                    if (genreName.includes(searchTerm)) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>