<!-- resources/views/transactions.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions - Grand Archives</title>
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
        .transaction-container {
            display: flex;
            width: 1660px;
            margin: 0 auto;
            position: relative;
            justify-content: center;
        }
        .transaction-page {
            background: #121246;
            height: 832px;
            position: relative;
            overflow: hidden;
            width: 1660px;
            transition: width 0.3s ease-in-out;
        }
        .transaction-page.nav-active {
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
        .transaction {
            color: #121246;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 40px;
            font-weight: 400;
            position: absolute;
            left: 496px;
            top: 26px;
            width: 288px;
            height: 72px;
            z-index: 2;
        }
        .rectangle-22 {
            background: #341c1c;
            border-radius: 12px;
            width: 1167px;
            height: 677px;
            position: absolute;
            left: 56px;
            top: 121px;
        }
        .rectangle-21 {
            background: #c2a379;
            border-radius: 12px;
            width: 863px;
            height: 101px;
            position: absolute;
            left: 208px;
            top: 145px;
        }
        .due-amount-here {
            color: #121246;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 40px;
            font-weight: 400;
            position: absolute;
            left: 472px;
            top: 172px;
            width: 336px;
            height: 47px;
        }
        /* Transaction items */
        .transaction-item {
            background: #d9d9d9;
            border-radius: 12px;
            width: 748px;
            height: 143px;
            position: absolute;
        }
        .transaction-item.due {
            top: 275px;
            left: 265px;
        }
        .transaction-item.returned {
            top: 447px;
            left: 265px;
        }
        .status-due {
            background: #c22d2d;
            border-radius: 12px;
            width: 97px;
            height: 40px;
            position: absolute;
            left: 898px;
            top: 290px;
        }
        .status-returned {
            background: #6aa933;
            border-radius: 12px;
            width: 103px;
            height: 39px;
            position: absolute;
            left: 898px;
            top: 460px;
        }
        .books-that-are-due {
            color: #121246;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 32px;
            font-weight: 400;
            position: absolute;
        }
        .book-name, .due-date {
            color: #121246;
            font-family: "Inter-Regular", sans-serif;
            font-size: 20px;
            font-weight: 400;
            position: absolute;
        }
        .due-text {
            color: #ffffff;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 20px;
            font-weight: 400;
            position: absolute;
            left: 905px;
            top: 297px;
            width: 84px;
            height: 27px;
        }
        .returned-text {
            color: #ffffff;
            text-align: center;
            font-family: "Inter-Regular", sans-serif;
            font-size: 20px;
            font-weight: 400;
            position: absolute;
            left: 905px;
            top: 468px;
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
    <div class="transaction-container">
        <div class="navigation">
            @include('partials.navigation')
        </div>
        <div class="transaction-page">
            <button class="menu-button">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <div class="rectangle-4"></div>
            <div class="rectangle-5"></div>
            <div class="transaction">TRANSACTION</div>
            <div class="rectangle-22"></div>
            <div class="rectangle-21"></div>
            <div class="due-amount-here">Due Amount: ${{ $totalDue ?? '0.00' }}</div>
            @foreach($transactions as $transaction)
                <div class="transaction-item {{ $transaction->status }}">
                    <div class="books-that-are-due" style="left: {{ $transaction->status === 'due' ? '243px' : '234px' }}; top: {{ $transaction->status === 'due' ? '287px' : '454px' }}; width: 376px; height: 46px;">
                        Books that are {{ $transaction->status }}
                    </div>
                    <div class="book-name" style="left: {{ $transaction->status === 'due' ? '275px' : '273px' }}; top: {{ $transaction->status === 'due' ? '328px' : '500px' }}; width: 125px; height: 22px;">
                        Book name: {{ $transaction->book->title }}
                    </div>
                    <div class="due-date" style="left: {{ $transaction->status === 'due' ? '267px' : '265px' }}; top: {{ $transaction->status === 'due' ? '362px' : '534px' }}; width: 125px; height: 22px;">
                        Due Date: {{ $transaction->due_date->format('Y-m-d') }}
                    </div>
                    @if($transaction->status === 'due')
                        <div class="status-due">
                            <div class="due-text">Due</div>
                        </div>
                    @else
                        <div class="status-returned">
                            <div class="returned-text">Returned</div>
                        </div>
                    @endif
                </div>
            @endforeach
            @if($transactions->isEmpty())
                <p style="color: #d4a373; text-align: center; margin-top: 300px;">No transactions yet!</p>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('.menu-button');
            const navigation = document.querySelector('.navigation');
            const transactionPage = document.querySelector('.transaction-page');

            menuButton.addEventListener('click', function() {
                navigation.classList.toggle('active');
                transactionPage.classList.toggle('nav-active');
            });
        });
    </script>
</body>
</html>