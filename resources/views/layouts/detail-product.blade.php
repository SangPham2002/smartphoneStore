@section('titlePage', 'SSMobile | Chi Tiết Sản Phẩm')
@extends('layouts.mainPage')
@section('main-content')
    <section class="content">
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">{{ $product->name }}</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{ route('homePage.index') }}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Chi tiết {{ $product->name }}</li>

                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- Product Details Area Start -->
        <div class="product-details-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                        <div class="product-details-img product-details-tab product-details-tab-2 d-flex">
                            <div
                                class="swiper-container mr-15px zoom-thumbs-2 align-self-start slider-nav-style-1 small-nav">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/small-image/1.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/small-image/2.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/small-image/3.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/small-image/4.webp" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/small-image/5.webp" alt="">
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <!-- <div class="swiper-buttons">
                                                                                    <div class="swiper-button-next"></div>
                                                                                    <div class="swiper-button-prev"></div>
                                                                                </div> -->
                            </div>
                            <!-- Swiper -->
                            <div class="swiper-container zoom-top-2 align-self-start">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/zoom-image/1.webp" alt="">
                                        <a class="venobox full-preview" data-gall="myGallery"
                                            href="assets/images/product-image/zoom-image/1.webp">
                                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/zoom-image/2.webp" alt="">
                                        <a class="venobox full-preview" data-gall="myGallery"
                                            href="assets/images/product-image/zoom-image/2.webp">
                                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/zoom-image/3.webp" alt="">
                                        <a class="venobox full-preview" data-gall="myGallery"
                                            href="assets/images/product-image/zoom-image/3.webp">
                                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/zoom-image/4.webp" alt="">
                                        <a class="venobox full-preview" data-gall="myGallery"
                                            href="assets/images/product-image/zoom-image/4.webp">
                                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="img-responsive m-auto"
                                            src="assets/images/product-image/zoom-image/5.webp" alt="">
                                        <a class="venobox full-preview" data-gall="myGallery"
                                            href="assets/images/product-image/zoom-image/5.webp">
                                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-details-content quickview-content ml-25px">
                            <h2 style="font-size: 25px">{{ $product->name }}</h2>
                            <div class="pricing-meta">
                                <ul class="d-flex">
                                    @if ($product->sale_price)
                                        <span class="old"
                                            style="font-size: 1rem;
                                            color: #929292;
                                            text-decoration: line-through;">{{ number_format($product->price) }}₫</span>-
                                        <li class="new-price"
                                            style="color: #d0011b;; font-size: 1.875rem; font-weight: 500;">
                                            {{ number_format($product->sale_price) }}₫</li>
                                        <span class="sale"
                                            style="margin-left:15px;
                                            font-size: .75rem;
                                            display:inline-block;
                                            font-weight: 600;
                                            white-space: nowrap;
                                            text-transform: uppercase;
                                            padding: 2px 4px;
                                            background-color:red;
                                            color:white;
                                            border-radius: 5px;">{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                                            GIẢM</span>
                                    @else
                                        <li class="new-price"
                                            style="color: #d0011b;; font-size: 1.875rem; font-weight: 500;">
                                            {{ number_format($product->price) }}₫</li>
                                    @endif

                                </ul>
                            </div>
                            {{-- <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="read-review"><a class="reviews" href="#">(5 Customer
                                        Review)</a></span>
                            </div> --}}
                            <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>Danh Mục:</span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">{{ App\Models\Category::find($product->category_id)->name }}</a>
                                    </li>
                                </ul>
                            </div>
                            {{-- <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>Trạng Thái: </span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">{!! $product->stock
                                            ? 'Còn hàng'
                                            : 'Hết hàng' !!}</a>
                                    </li>
                                    <li>
                                        <a href="#">ETC</a>
                                    </li>
                                </ul>
                            </div> --}}
                            {{-- <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>Tags: </span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">Smart Device, </a>
                                    </li>
                                    <li>
                                        <a href="#">Phone</a>
                                    </li>
                                </ul>
                            </div> --}}
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                </div>
                                <div class="pro-details-cart">
                                    <button class="add-cart"> Thêm Giỏ Hàng</button>
                                </div>
                                <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                    <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                                </div>
                                <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                    <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- product details description area start -->
                        <div class="description-review-wrapper">
                            <div class="description-review-topbar nav">

                                <button class="active" data-bs-toggle="tab" data-bs-target="#des-details1">Mô Tả Sản
                                    Phẩm</button>

                            </div>
                            <div class="tab-content description-review-bottom">
                                <div id="des-details1" class="tab-pane active">
                                    <div class="product-description-wrapper">
                                        {{ $product->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details description area end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area Start -->
        <div class="product-area related-product">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center m-0">
                            <h2 class="title">Sản Phẩm Liên Quan</h2>
                            <p>Có rất nhiều sản phẩm có sẵn danh cho bạn</p>
                        </div>
                    </div>
                </div>
                <!-- Section Title & Tab End -->
                <div class="row">
                    <div class="col">
                        <div class="new-product-slider swiper-container slider-nav-style-1">
                            <div class="swiper-wrapper">
                                @foreach ($productStock as $item)
                                    <div class="swiper-slide">
                                        <!-- Single Prodect -->
                                        <div class="product">
                                            <span class="badges">
                                                @if ($item->sale_price)
                                                    <span
                                                        class="sale">-{{ round((($item->price - $item->sale_price) / $item->price) * 100) }}%</span>
                                                    <span class="new">Sale</span>
                                                @else
                                                    <span class="new">New</span>
                                                @endif
                                            </span>
                                            <div class="thumb">
                                                <a href="{{ route('homePage.detail', $item->slug) }}" class="image">
                                                    <img src="{{ asset('storage/images/' . $item->image) }}"
                                                        alt="Product" />
                                                    <img class="hover-image"
                                                        src="{{ asset('storage/images/' . $item->image) }}"
                                                        alt="Product" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <span class="category"><a
                                                        href="#">{{ App\Models\Category::find($item->category_id)->name }}</a></span>
                                                <h5 class="title"><a
                                                        href="{{ route('homePage.detail', $item->slug) }}">{{ $item->name }}
                                                    </a>
                                                </h5>
                                                <span class="price">
                                                    @if ($item->sale_price)
                                                        <span class="old">{{ number_format($item->price) }}₫</span>
                                                        <span
                                                            class="new">{{ number_format($item->sale_price) }}₫</span>
                                                    @else
                                                        <span class="new">{{ number_format($item->price) }}₫</span>
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="actions">
                                                <button title="Add To Cart" class="action add-to-cart"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                                        class="pe-7s-shopbag"></i></button>
                                                <button class="action wishlist" title="Wishlist" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal-Wishlist"><i
                                                        class="pe-7s-like"></i></button>
                                                <button class="action quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                                <button class="action compare" title="Compare" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal-Compare"><i
                                                        class="pe-7s-refresh-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->
    </section>
@endsection
