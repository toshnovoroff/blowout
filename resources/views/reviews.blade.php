<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/reviews.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/auth.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Blowout</title>
</head>

<body id="body">
    <div id="bigReviewModal" class="main-review-modal-container">
        <div id="minorReviewModal" class="review-modal-container">
            <div class="review-modal-top-text">
                <h2>Leave a review</h2>
                <p id="reviewCloseBtn" class="review-close-modal-link">X</p>
            </div>
            <form action="{{ route('storeReview') }}" method="POST" class="review-modal-form" enctype="multipart/form-data">
                @csrf
                <div class="rate-div review-modal-input">
                    <p>Your rate</p>
                    <div class="range-div">
                        <p>0</p>
                        <input class="review-range" id="range" type="range" min="0" max="5" value="5" step="1" name="rating">
                        <p>5</p>
                        <output class="output-num" id="value"></output>
                    </div>
                </div>
                <textarea class="review-modal-input review-text-input" name="reviewText" placeholder="Review-text"></textarea>
                <label class="input-file">
                    <input type="file" name="file">
                    <span>Choose file</span>
                </label>
                <!-- <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}"></div> -->
                <div class="modal-review-bottom-container">
                    <span class="review-notation">Once it's posted, it can't be deleted</span>
                    <input class="review-modal-button" type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
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
    <a href="reviews.html#top-anchor"><img class="top-scroll-arrow" src="{{ '/images/arrow.svg' }}" alt="Arrow"></a>
    <div class="review-wrapper">
        <button id="reviewOpenBtn" class="review-btn">Leave a review</button>
        <div class="reviews-container">
            @foreach ($reviews as $review)
            <div class="review">
                <img class="review-photo" src="{{ asset($review->reviewPhoto) }}" alt="Review Photo">
                <div class="review-text">
                    <div class="top-review-text">
                        <h2>{{ $review->user->firstName }}</h2>
                        <p class="review-rating">{{ $review->rating }}/5</p>
                    </div>
                    <p class="main-review-text">{{ $review->reviewText }}</p>
                    <div class="bottom-review-text">
                        <span>{{ $review->reviewDate }}</span>
                    </div>
                    @if (!$review->replyText) <!-- Show the button only if no reply exists -->
                    @auth
                    @if (auth()->user()->isAdmin)
                    <div class="admin-button-container">
                        <form action="/account">
                            <button id="replyBtn" type="submit" class="admin-button">Add reply</button>
                        </form>
                    </div>
                    @endif
                    @endauth
                    @endif
                </div>
            </div>
            @if ($review->replyText)
            <div class="answer">
                <h3>Official response</h3>
                <p class="main-review-text">{{ $review->replyText }}</p>
                <span class="answer-date">{{ $review->replyDate }}</span>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <footer>
        <h3 class="footer-text">BLOWOUT © 2023 all rights reserved </h3>
    </footer>
    <script src="{{ '/js/review.js' }}"></script>
    <script src="{{ '/js/index.js' }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>