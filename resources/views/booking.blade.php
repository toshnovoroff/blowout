<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/booking.css') }}">
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
    <div class="booking-wrapper">
        {{-- вся форма --}}
        <form action="{{ route('book_service') }}" method="POST">
            @csrf

            <div class="booking-data">

                {{-- День --}}
                <input type="date" class="booking-date-input" name="book_date" id="bookDate">

                <span id="dateValidationMessage" style="color: red;"></span>
                <div class="booking-data-option">
                    <div class="booking-data-name">
                        <p>Time</p>
                        <img class="booking-data-dropdown" src="{{ '/images/optionmark.png' }}" alt="OptionMark">
                    </div>

                    {{-- Время чекбоксы --}}
                    <div class="booking-datas booking-datas--close">


                        <div class="booking-date">
                            {{-- Время чекбокс --}}
                            <input value="12:00:00" class="box-box" name="book_time" type="radio" id="timeRadio1">
                            <label for="timeRadio1">12:00</label>
                        </div>
                        <div class="booking-date">
                            {{-- Время чекбокс --}}
                            <input value="13:00:00" class="box-box" name="book_time" type="radio" id="timeRadio2">
                            <label for="timeRadio2">13:00</label>
                        </div>
                        <div class="booking-date">
                            {{-- Время чекбокс --}}
                            <input value="14:00:00" class="box-box" name="book_time" type="radio" id="timeRadio3">
                            <label for="timeRadio3">14:00</label>
                        </div>
                        <div class="booking-date">
                            {{-- Время чекбокс --}}
                            <input value="15:00:00" class="box-box" name="book_time" type="radio" id="timeRadio4">
                            <label for="timeRadio4">15:00</label>
                        </div>
                        <div class="booking-date">
                            {{-- Время чекбокс --}}
                            <input value="16:00:00" class="box-box" name="book_time" type="radio" id="timeRadio5">
                            <label for="timeRadio5">16:00</label>
                        </div>
                        <div class="booking-date">
                            {{-- Время чекбокс --}}
                            <input value="17:00:00" class="box-box" name="book_time" type="radio" id="timeRadio6">
                            <label for="timeRadio6">17:00</label>
                        </div>
                    </div>
                </div>
                <div class="booking-data-option">
                    <div class="booking-data-name">
                        <p>Services</p>
                        <img class="booking-data-dropdown" src="{{ '/images/optionmark.png' }}" alt="OptionMark">
                    </div>

                    {{-- Услуги чекбоксы --}}
                    <div class="booking-datas booking-datas--close">
                        {{-- foreach --}}
                        @foreach($services as $service)
                        <div class="booking-date">
                            {{-- Услуга чекбокс --}}
                            <input class="service-checkbox box-box" type="radio" name="service_id" value="{{ $service->id }}" id="serviceRadio{{$service->id}}">
                            <label for="serviceRadio{{$service->id}}">{{ $service->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <input type="submit" value="Book service">

            </div>
        </form>
        <div class="main-data-container">
            <h3 class="booking-heading">Products</h3>
            <div class="products">
                @foreach ($bookedProducts as $bookedProduct)
                <div class="product-container-block">
                    <form method="POST" action="{{ route('booking.delete', $bookedProduct->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-product-btn">x</button>
                    </form>
                    <a class="product" href="{{ route('products.show', $bookedProduct->product_id) }}">
                        <img class="product-image" src="{{ asset($bookedProduct->product->productPhotos->first()->photo) }}" alt="Product">
                        <span class="hover-span">
                            product type........{{ $bookedProduct->product->productCategory->name }}<br>
                            purpose........{{ $bookedProduct->product->purpose }}<br>
                            for whom........{{ $bookedProduct->product->targetAudience }}'s<br>
                            area of application........{{ $bookedProduct->product->applicationArea }}
                        </span>
                        <p class="brand-name">{{ $bookedProduct->product->name }}</p>
                        <span>{{ $bookedProduct->product->subheading }}</span>
                        <p class="product-price">{{ $bookedProduct->product->price }}$</p>
                    </a>
                </div>
                @endforeach
            </div>
            <h3 class="booking-heading service-heading">Services</h3>
            <div class="visit-container">
                @foreach($bookedServices as $bookedService)
                <div class="visit">
                    <p>{{ $bookedService->service->name }}</p>
                    <div class="visit-bottom-text">
                        <span>{{ $bookedService->service->duration }} minutes</span>
                        <p>{{ $bookedService->service->price }}$</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="bottom-booking-container">
                <button class="checkout-btn">Checkout</button>
                <h3 class="total-booking-price">Total: {{$total}}$</h3>
                <span>Price can be changed with shipping point</span>
            </div>
        </div>
    </div>


    </div>
    <footer>

        <!-- <h1 class="message" style="color:aqua">            
            {{session('message')}}
        </h1> -->

        <h3 class="footer-text">BLOWOUT © 2023 all rights reserved </h3>
    </footer>
    <script src="{{ '/js/booking.js' }}"></script>
    <script src="{{ '/js/index.js' }}"></script>
</body>

</html>