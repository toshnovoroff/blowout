<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('/css/products.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/auth.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Blowout</title>
</head>

<body id="body">
    @auth
    @if (auth()->user()->isAdmin)
    <div id="addModalCont" class="aut-add-modal-container">
        <div id="addModal" class="aut-add-modal-main">
            <div class="aut-add-modal-content">
                <div class="aut-add-modal-top-content">
                    <h2>Add Product</h2>
                    <p class="aut-add-modal-close" id="addCloseBtn">X</p>
                </div>
                <form class="aut-add-modal-form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="aut-add-modal-input" type="text" name="name" placeholder="Name">
                    <input class="aut-add-modal-input" type="text" name="subheading" placeholder="Subheading">
                    <select class="aut-add-modal-select" name="productCategories_id">
                        @foreach ($productCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <textarea class="aut-add-modal-textarea" name="description" placeholder="Description"></textarea>
                    <textarea class="aut-add-modal-textarea" name="application" placeholder="Application"></textarea>
                    <textarea class="aut-add-modal-textarea" name="composition" placeholder="Composition"></textarea>
                    <input class="aut-add-modal-input" type="text" name="applicationArea" placeholder="Application Area">
                    <input class="aut-add-modal-input" type="text" name="purpose" placeholder="Purpose">
                    <input class="aut-add-modal-input" type="text" name="targetAudience" placeholder="Target Audience">
                    <input class="aut-add-modal-input" type="number" step="1" name="price" placeholder="Price">
                    <label class="input-file">
                        <input type="file" name="photos[]" multiple>
                        <span>Choose files</span>
                    </label>
                    <input class="add-button" type="submit" value="Submit">
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
            <!-- Your button HTML code here -->
            <button id="addOpenBtn" type="button" class="admin-button">Add product</button>
        </div>
        @endif
        @endauth
    </header>
    <a href="products.html#top-anchor"><img class="top-scroll-arrow" src="{{ '/images/arrow.svg' }}" alt="Arrow"></a>
    <div class="products-wrapper">
        <form class="search-form" action="{{ route('products.search') }}" method="GET">
            <input class="text-field" type="text" name="search" placeholder="Search whatever you want">
            <input class="search-button" type="submit" value="Search">
        </form>
        <p id="filterOpenBtn" class="filter-open-link">Filters</p>
        <div class="products-container">
            <form id="filterForm" action="{{ route('filter') }}" method="GET">
                <div id="productsFilters" class="filters">
                    <p id="filtersCloseBtn" class="close-button">X</p>
                    <div class="filter-option">
                        <div class="option-name">
                            <p>Product type</p>
                            <img class="open-dropdown" src="{{ '/images/optionmark.png' }}" alt="OptionMark">
                        </div>
                        <div class="options options--close">
                            @foreach ($productCategories as $category)
                            <div class="option">
                                <input class="box-box" name="product_type[]" value="{{ $category->id }}" type="checkbox">
                                <p>{{ $category->name }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Add more filter options here -->
                    <div class="filter-option">
                        <div class="option-name">
                            <p>Purpose</p>
                            <img id="filterDropDown" class="open-dropdown" src="{{ '/images/optionmark.png' }}" alt="OptionMark">
                        </div>
                        <div class="options options--close">
                            <div class="option">
                                <input class="box-box" name="purpose[]" value="anti-aging" type="checkbox">
                                <p>Anti-aging</p>
                            </div>
                            <div class="option">
                                <input class="box-box" name="purpose[]" value="moisturizing" type="checkbox">
                                <p>Moisturizing</p>
                            </div>
                            <div class="option">
                                <input class="box-box" name="purpose[]" value="dehydrating" type="checkbox">
                                <p>Dehydrating</p>
                            </div>
                        </div>
                    </div>
                    <div class="filter-option">
                        <div class="option-name">
                            <p>For whom</p>
                            <img class="open-dropdown" src="{{ '/images/optionmark.png' }}" alt="OptionMark">
                        </div>
                        <div class="options options--close">
                            <div class="option">
                                <input class="box-box" name="target_audience[]" value="women" type="checkbox">
                                <p>Women</p>
                            </div>
                            <div class="option">
                                <input class="box-box" name="target_audience[]" value="men" type="checkbox">
                                <p>Men</p>
                            </div>
                        </div>
                    </div>
                    <div class="filter-option">
                        <div class="option-name">
                            <p>Application area</p>
                            <img class="open-dropdown" src="{{ '/images/optionmark.png' }}" alt="OptionMark">
                        </div>
                        <div class="options options--close">
                            <div class="option">
                                <input class="box-box" name="application_area[]" value="face" type="checkbox">
                                <p>Face</p>
                            </div>
                            <div class="option">
                                <input class="box-box" name="application_area[]" value="body" type="checkbox">
                                <p>Body</p>
                            </div>
                            <div class="option">
                                <input class="box-box" name="application_area[]" value="legs" type="checkbox">
                                <p>Legs</p>
                            </div>
                            <div class="option">
                                <input class="box-box" name="application_area[]" value="hands" type="checkbox">
                                <p>Hands</p>
                            </div>
                        </div>
                    </div>
                    <button class="apply_filters_btn" type="submit">Apply Filters</button>
                </div>
            </form>
            <div class="products">
                @foreach ($products as $product)
                <a href="{{ route('products.show', $product->id) }}">
                    <div class="product">
                        <img class="product-image" src="{{ asset($product->productPhotos->first()->photo) }}" alt="Product">
                        <span class="hover-span">
                            product type........{{ $product->productCategory->name }}<br>
                            purpose........{{ $product->purpose }}<br>
                            for whom........{{ $product->targetAudience }}'s<br>
                            area of application........{{ $product->applicationArea }}
                        </span>
                        <p class="brand-name">{{ $product->name }}</p>
                        <span>{{ $product->subheading }}</span>
                        <p class="product-price">{{ $product->price }}$</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <footer>
        <h3 class="footer-text">BLOWOUT © 2023 all rights reserved </h3>
    </footer>
    <script src="{{ '/js/products.js' }}"></script>
    <script src="{{ '/js/index.js' }}"></script>
    <script src="{{ '/js/addmodal.js' }}"></script>
</body>

</html>