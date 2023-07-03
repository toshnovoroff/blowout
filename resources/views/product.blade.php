<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/product.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
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
    <div class="product-wrapper">
        @if ($product)
        <h2 class="product-heading">{{ $product->name }}</h2>
        <p>{{ $product->subheading }}</p>
        <div class="product-container">
            <div class="product-img">
                @foreach ($product->productPhotos as $photo)
                <img src="{{ asset('/' . $photo->photo) }}" alt="Product">
                @break
                @endforeach
            </div>
            <div class="product-text">
                <p>{{ $product->description }}</p>
                <p><br>Application: {{ $product->application }}</p>
                <span class="product-description">
                    product type.....................................{{ $product->productCategory->name }}
                    <br>
                    purpose........................................{{ $product->purpose }}
                    <br>
                    for whom........................................{{ $product->targetAudience }}'s
                    <br>
                    area of application................................{{ $product->applicationArea }}
                </span>
                <div class="bottom-active-div">
                    <form action=" {{ route('addToCart', ['id'=> $product->id]) }}" method="POST">
                        @csrf
                        <input type="submit" value="Add to cart" class="product-add-btn">
                    </form>
                    <p>{{ $product->price }}$</p>
                </div>
            </div>
        </div>
        @else
        <p>No product found.</p>
        @endif
    </div>
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach ($product->productPhotos as $photo)
            <div class="swiper-slide">
                <img src="{{ asset('/' . $photo->photo) }}" alt="Product">
            </div>
            @endforeach
            <div class="swiper-slide swiper-slide--text">
                <span class="slider-text-span">{{ $product->composition }}</span>
            </div>
        </div>
    </div>
    <div class="mobile-slider-info">
        @foreach ($product->productPhotos as $photo)
        <div class="swiper-slide">
            <img src="{{ asset('/' . $photo->photo) }}" alt="Product">
        </div>
        @endforeach
        <div class="swiper-slide--text-mob">
            <span class="slider-text-span">{{ $product->composition }}</span>
        </div>
    </div>
    <footer>
        <h3 class="footer-text">BLOWOUT © 2023 all rights reserved </h3>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="{{ '/js/script.js' }}"></script>
    <script src="{{ '/js/index.js' }}"></script>
</body>

</html>