@section('titlePage', 'SSMobile | Shop')
@extends('layouts.mainPage')
@section('main-content')
    <!-- Shop Page Start  -->
    <div class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                    <!-- Shop Top Area Start -->
                    <div class="shop-top-bar d-flex">
                        {{-- <p class="compare-product"> <span>12</span> Product Found of <span>30</span></p> --}}
                        <!-- Left Side End -->

                        <!-- Right Side Start -->
                        <div class="select-shoing-wrap d-flex align-items-center">
                            <div class="shot-product">
                                <p>Sort By:</p>
                            </div>
                            <!-- Single Wedge End -->
                            <div class="header-bottom-set dropdown">
                                <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">Default <i
                                        class="fa fa-angle-down"></i></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="#">Name, A to Z</a></li>
                                    <li><a class="dropdown-item" href="#">Name, Z to A</a></li>
                                    <li><a class="dropdown-item" href="#">Price, low to high</a></li>
                                    <li><a class="dropdown-item" href="#">Price, high to low</a></li>
                                    <li><a class="dropdown-item" href="#">Sort By new</a></li>
                                    <li><a class="dropdown-item" href="#">Sort By old</a></li>
                                </ul>
                            </div>
                            <!-- Single Wedge Start -->
                        </div>
                        <!-- Right Side End -->
                    </div>
                    <!-- Shop Top Area End -->
                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area">
                        <!-- Tab Content Area Start -->
                        <div class="row">
                            <div class="col">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="shop-grid">
                                        <div class="row mb-n-30px">
                                            @foreach ($products as $item)
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px">
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
                                                            <a href="single-product.html" class="image">
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
                                                                    href="single-product.html">{{ $item->name }}</a>
                                                            </h5>
                                                            <span class="price">
                                                                @if ($item->sale_price)
                                                                    <span
                                                                        class="old">{{ number_format($item->price) }}₫</span>
                                                                    <span
                                                                        class="new">{{ number_format($item->sale_price) }}₫</span>
                                                                @else
                                                                    <span
                                                                        class="new">{{ number_format($item->price) }}₫</span>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="actions">
                                                            <button title="Add To Cart" class="action add-to-cart"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal-Cart"><i
                                                                    class="pe-7s-shopbag"></i></button>
                                                            <button class="action wishlist" title="Wishlist"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal-Wishlist"><i
                                                                    class="pe-7s-like"></i></button>
                                                            <button class="action quickview" data-link-action="quickview"
                                                                title="Quick view" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"><i
                                                                    class="pe-7s-look"></i></button>
                                                            <button class="action compare" title="Compare"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal-Compare"><i
                                                                    class="pe-7s-refresh-2"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Tab Content Area End -->
                        <!--  Pagination Area Start -->
                        <div class="pro-pagination-style text-center text-lg-end" data-aos="fade-up" data-aos-delay="200">
                            <div class="pages">
                                <ul>
                                    {{$products->links()}}
                                    {{-- @foreach ($products as $item)
                                        @if ($item == App\Models\Product::paginate(1))
                                            <li class="li"><a class="page-link"><i class="fa fa-angle-left"></i></a>
                                            </li>
                                            <li class="li"><a class="page-link active">{{ $item->links() }}</a>
                                            </li>
                                            <li class="li"><a class="page-link"><i class="fa fa-angle-right"></i></a>
                                            </li>
                                        @endif
                                    @endforeach --}}
                                </ul>
                            </div>
                        </div>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="col-lg-3 order-lg-first col-md-12 order-md-last">
                    <div class="shop-sidebar-wrap">
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h4 class="sidebar-title">Top Danh Mục</h4>
                            <div class="sidebar-widget-category">
                                <ul>
                                    <li><a href="#" class="selected m-0"> Bán chạy
                                            <span>(65)</span> </a></li>
                                    <li><a href="#" class=""> Computer
                                            <span>(12)</span> </a></li>
                                    <li><a href="#" class=""> Covid-19
                                            <span>(22)</span> </a></li>
                                    <li><a href="#" class=""> Electronics
                                            <span>(19)</span> </a></li>
                                    <li><a href="#" class=""> Frame Sunglasses
                                            <span>(17)</span> </a></li>
                                    <li><a href="#" class=""> Furniture
                                            <span>(7)</span> </a></li>
                                    <li><a href="#" class=""> Genuine Leather
                                            <span>(9)</span> </a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget mt-8">
                            <h4 class="sidebar-title">Tìm theo giá</h4>
                            <div class="price-filter">
                                <div class="price-slider-amount">
                                    <input type="text" id="amount" class="p-0 h-auto lh-1" name="price"
                                        placeholder="Giá cần tìm..." />
                                </div>
                                <div id="slider-range"></div>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        {{-- <div class="sidebar-widget">
                            <h4 class="sidebar-title">Color</h4>
                            <div class="sidebar-widget-color">
                                <ul class="d-flex flex-wrap">
                                    <li><a href="#" class="color-1"></a></li>
                                    <li><a href="#" class="color-2"></a></li>
                                    <li><a href="#" class="color-3"></a></li>
                                    <li><a href="#" class="color-4"></a></li>
                                    <li><a href="#" class="color-5"></a></li>
                                    <li><a href="#" class="color-6"></a></li>
                                    <li><a href="#" class="color-7"></a></li>
                                    <li><a href="#" class="color-8"></a></li>
                                    <li><a href="#" class="color-9"></a></li>
                                    <li><a href="#" class="color-10"></a></li>
                                    <li><a href="#" class="color-11"></a></li>
                                    <li><a href="#" class="color-12"></a></li>
                                    <li><a href="#" class="color-13"></a></li>
                                    <li><a href="#" class="color-14"></a></li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- Sidebar single item -->
                        {{-- <div class="sidebar-widget">
                            <h4 class="sidebar-title">Size</h4>
                            <div class="sidebar-widget-size">
                                <ul>
                                    <li><a href="#" class="selected m-0"> All
                                            <span>(6)</span> </a></li>
                                    <li><a href="#" class=""> S <span>(12)</span> </a>
                                    </li>
                                    <li><a href="#" class=""> M <span>(21)</span> </a>
                                    </li>
                                    <li><a href="#" class=""> L <span>(16)</span> </a>
                                    </li>
                                    <li><a href="#" class=""> XL <span>(22)</span> </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <!-- Sidebar single item -->
                        {{-- <div class="sidebar-widget">
                            <h4 class="sidebar-title">Thương Hiệu</h4>
                            <div class="sidebar-widget-brand">
                                <ul>
                                    @foreach ($category as $item)
                                        <li><a href="#"
                                                class="selected m-0">{{ $item->name }}<span> ({{DB::table('products')->where('category_id', $item->first()->id)->count()}})</span>
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> --}}
                        <!-- Sidebar single item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page End  -->
@endsection
