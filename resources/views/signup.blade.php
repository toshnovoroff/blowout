<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/auth.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Blowout</title>
</head>
<body>
<header>
        <nav class="burger-nav">
            <div class="burger-nav-top">
                <h1 class="nav-heading"><a href="main">BLOWOUT</a></h1>
                <svg id="burgerBtn" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                    <path d="M 0 9 L 0 11 L 50 11 L 50 9 Z M 0 24 L 0 26 L 50 26 L 50 24 Z M 0 39 L 0 41 L 50 41 L 50 39 Z"></path>
                </svg>
            </div>
            <div id="burgerNavList" class="burger-nav-bottom">
                <ul class="nav-list">
                    <li class="nav-list-item">
                        <a href="products">Products</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="loyalty">Loyalty</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="reviews">Reviews</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="account">Account</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="booking">Booking</a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav>
            <h1 class="nav-heading"><a href="main">BLOWOUT</a></h1>
            <ul class="nav-list">
                <li class="nav-list-item">
                    <a href="products">Products</a>
                </li>
                <li class="nav-list-item">
                    <a href="loyalty">Loyalty</a>
                </li>
                <li class="nav-list-item">
                    <a href="reviews">Reviews</a>
                </li>
                <li class="nav-list-item">
                    <a href="account">Account</a>
                </li>
                <li class="nav-list-item">
                    <a href="booking">Booking</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="aut-wrapper">
        <h2>Sign up</h2>
        <form class="aut-form" action="#">
            <input class="aut-input" type="text" id="fName" name="fName" placeholder="First Name">
            <input class="aut-input" type="text" id="sName" name="sName" placeholder="Second Name">
            <input class="aut-input" type="email" id="AutEMailInput" name="AutEMailInput" placeholder="Email">
            <div class="sex-picker">
                <div class="input-box">
                    <p class="input-box-text">Sex</p>
                    <img id="sexButton" class="input-box-arrow" src="img/mini-drop-arrow.png" alt="DropDownArrow">
                </div>
                <div id="sexOptions" class="sex-options">
                    <div class="sex-option">
                        <input class="box-box" name="Male" type="checkbox">
                        <p>Male</p>
                    </div>
                    <div class="sex-option">
                        <input class="box-box" name="Female" type="checkbox">
                        <p>Female</p>
                    </div>
                </div>
            </div>
            <input class="aut-input" type="password" id="AutPasInput" name="AutPasInput" placeholder="Password">
            <input class="aut-input" type="text" id="bDate" name="bDate" placeholder="Date of birth">
            <input class="aut-input" type="password" id="AutPasInput" name="AutPasInput" placeholder="Password">
            <input class="aut-input" type="password" id="AutPasInput" name="AutPasInput" placeholder="Confirm password">
            <div class="aut-bottom-section">
                <span class="aut-input-span"><a href="login.html">Already have an account? Log in right now</a></span>
                <input class="aut-input-btn" type="submit" value="Submit">
            </div>
        </form>
    </div>
    <footer>
        <h3 class="footer-text">BLOWOUT © 2023 all rights reserved </h3>
    </footer>
    <script src="{{ '/js/signup.js' }}"></script>
    <script src="{{ '/js/index.js' }}"></script>
</body>
</html>