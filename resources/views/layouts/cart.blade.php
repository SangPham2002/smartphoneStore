@section('titlePage', 'SSMobile | Chi Tiết Giỏ Hàng')
@section('titleMini', 'Chi Tiết Giỏ Hàng')
@extends('layouts.mainPage')
@section('main-content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Giỏ Hàng</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active">@yield('titleMini')</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Danh sách giỏ hàng</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->list() as $key => $value)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img class="img-responsive ml-15px"
                                                    src="{{ asset('storage/images/') }}/{{ $value['image'] }}"
                                                    alt="" />
                                            </td>
                                            <td class="product-name">{{ $value['name'] }}</td>
                                            <td class="product-price-cart"><span
                                                    class="amount">{{ number_format($value['price']) }}</span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="quantity"
                                                        value="{{ $value['quantity'] }}" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                {{ number_format($value['price'] * $value['quantity']) }} VND</td>
                                            <td class="product-remove">
                                                <a href="#"><i class="fa fa-pencil"></i></a>
                                                <a href="#"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="{{route('homePage.shop')}}">Tiếp tục mua sắm</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button>Update Shopping Cart</button>
                                        <a href="#">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-lm-30px">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Sử Dụng Mã Giảm Giá</h4>
                                </div>
                                <div class="discount-code">
                                    <p>Nhập mã giảm giá nếu bạn có!</p>
                                    <form>
                                        <input type="text" required="" name="name" />
                                        <button class="cart-btn-2" type="submit">Áp Dụng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-md-30px">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Tổng Giỏ Hàng</h4>
                                </div>
                                <h5>Tổng sản phẩm <span>{{number_format($cart->getTotalPrice())}} VND</span></h5>
                                <div class="total-shipping">
                                    <h5>Phí Vận Chuyển</h5>
                                    <ul>
                                        <li><input type="checkbox" /> Thường <span></span></li>
                                        <li><input type="checkbox" /> Hỏa Tốc <span></span></li>
                                    </ul>
                                </div>
                                <h4 class="grand-totall-title">Tổng Tiền <span>$260.00</span></h4>
                                <a href="checkout.html">Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->

@endsection
