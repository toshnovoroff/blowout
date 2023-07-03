<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/index.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/auth.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Blowout</title>
</head>

<body>
    @auth
    @if (auth()->user()->isAdmin)
    <div id="addModalCont" class="aut-add-modal-container">
        <div id="addModal" class="aut-add-modal-main">
            <div class="aut-add-modal-content">
                <div class="aut-add-modal-top-content">
                    <h2>Add news</h2>
                    <p class="aut-add-modal-close" id="addCloseBtn">X</p>
                </div>
                <form class="aut-add-modal-form" action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="aut-add-modal-input" type="text" name="newsHeading" placeholder="Heading">
                    <textarea class="aut-add-modal-textarea" name="newsText" placeholder="Text"></textarea>
                    <label class="input-file">
                        <input type="file" name="file">
                        <span>Choose file</span>
                    </label>
                    <input class="add-button" type="button" value="Submit">
                </form>
            </div>
        </div>
    </div>
    @endif
    @endauth
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
        @auth
        @if (auth()->user()->isAdmin)
        <div class="admin-button-container">
            <button id="addOpenBtn" type="button" class="admin-button">Add news</button>
        </div>
        @endif
        @endauth
    </header>
    @foreach ($news as $key => $item)
    <section class="index-card">
        @if ($key % 2 == 0)
        <div class="index-card__text-block">
            <h2>{{ $item->newsHeading }}</h2>
            <p class="index-card__text">{{ $item->newsText }}</p>
            <form action="booking">
                <button type="submit" class="index-card__btn">Book a visit</button>
            </form>
        </div>
        <img class="index-card-image__right" src="{{ $item->newsPhoto }}" alt="News Photo">
        @else
        <img class="index-card-image__right" src="{{ $item->newsPhoto }}" alt="News Photo">
        <div class="index-card__text-block">
            <h2>{{ $item->newsHeading }}</h2>
            <p class="index-card__text">{{ $item->newsText }}</p>
            @auth
            @if (auth()->user()->isAdmin)
            <div class="admin-button-container">
                <button id="deleteOpenBtn" type="button" class="delete-button">Delete news</button>
                <button id="editOpenBtn" type="button" class="delete-button">Edit news</button>
            </div>
            @endif
            @endauth
            <form action="booking">
                <button type="submit" class="index-card__btn">Book a visit</button>
            </form>
        </div>
        @endif
    </section>
    @endforeach
    <footer>
        <h3 class="footer-text">BLOWOUT © 2023 all rights reserved </h3>
    </footer>
    <script src="{{ '/js/index.js' }}"></script>
    <script src="{{ '/js/addmodal.js' }}"></script>
</body>

</html>