<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/loyalty.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Blowout</title>
</head>

<body>
    <header>
        <nav class="burger-nav">
            <div class="burger-nav-top">
                <h1 class="nav-heading"><a href="{{ route('index') }}">BLOWOUT</a></h1>
                <svg id="burgerBtn" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path d="M 0 9 L 0 11 L 50 11 L 50 9 Z M 0 24 L 0 26 L 50 26 L 50 24 Z M 0 39 L 0 41 L 50 41 L 50 39 Z"></path>
                </svg>
            </div>
            <div id="burgerNavList" class="burger-nav-bottom">
                <ul class="nav-list">
                    <li class="nav-list-item">
                        <a href="{{ route('products') }}">Products</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="{{ route('loyalty') }}">Loyalty</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="{{ route('reviews') }}">Reviews</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="{{ route('account') }}">Account</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="{{ route('booking') }}">Booking</a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav>
            <h1 class="nav-heading"><a href="{{ route('index') }}">BLOWOUT</a></h1>
            <ul class="nav-list">
                <li class="nav-list-item">
                    <a href="{{ route('products') }}">Products</a>
                </li>
                <li class="nav-list-item">
                    <a href="{{ route('loyalty') }}">Loyalty</a>
                </li>
                <li class="nav-list-item">
                    <a href="{{ route('reviews') }}">Reviews</a>
                </li>
                <li class="nav-list-item">
                    <a href="{{ route('account') }}">Account</a>
                </li>
                <li class="nav-list-item">
                    <a href="{{ route('booking') }}">Booking</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="loyalty-wrapper">
        <h2>Blow Rich Club</h2>
        <p class="loyalty-info-text">Get products you want with next visit for free </p>
        <div class="loyalty-plans-wrapper">
            <div class="loyalty-plan{{ $visitCount < 50 ? ' loyalty-plan-bordered' : '' }}">
                <div class="plan-name plan-name_1">
                    BRC 1.0
                </div>
                <div class="plan-text">
                    <p>Every customer gets that status after registration
                        <br><br>1 visit gives you 1 point, that can be changed for 1$ in offline store to buy a product
                    </p>
                </div>
                <span class="plan-user-status{{ $visitCount < 50 ? ' plan-user-status-shown' : '' }}">Your status</span>
            </div>
            <div class="devider"></div>
            <div class="loyalty-plan{{ $visitCount >= 50 && $visitCount < 150 ? ' loyalty-plan-bordered' : '' }}">
                <div class="plan-name plan-name_2">
                    BRC 2.0
                </div>
                <div class="plan-text">
                    <p>Customers get that status after 50 visits
                        <br><br>1 visit gives you 3 points, that can be changed for 1$ in offline store to buy a product or to pay for a visit
                    </p>
                </div>
                <span class="plan-user-status{{ $visitCount >= 50 && $visitCount < 150 ? ' plan-user-status-shown' : '' }}">Your status</span>
            </div>
            <div class="devider"></div>
            <div class="loyalty-plan{{ $visitCount >= 150 ? ' loyalty-plan-bordered' : '' }}">
                <div class="plan-name plan-name_3">
                    BRC MAX
                </div>
                <div class="plan-text">
                    <p>Customers get that status after 150 visits
                        <br><br>1 visit gives you 5 points, that can be changed for 1$ in offline store to buy a product, to pay for a visit or to get cash back in real money
                    </p>
                </div>
                <span class="plan-user-status{{ $visitCount >= 150 ? ' plan-user-status-shown' : '' }}">Your status</span>
            </div>
        </div>
    </div>
    <footer>
        <h3 class="footer-text">BLOWOUT © 2023 all rights reserved </h3>
    </footer>
    <script src="{{ '/js/index.js' }}"></script>
</body>

</html>