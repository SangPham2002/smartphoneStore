@section('titlePage', 'SSMobile | Login')
@extends('layouts.mainPage')
@section('main-content')
    <section class="content">
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">Đăng Nhập | Đăng Ký</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{ Route('homePage.index') }}">Trang Chủ</a></li>
                            <li class="breadcrumb-item active">Đăng Nhập</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- login area start -->
        <div class="login-register-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-bs-toggle="tab" href="#lg1">
                                    <h4>Đăng Nhập</h4>
                                </a>
                                <a data-bs-toggle="tab" href="#lg2">
                                    <h4>Đăng Ký</h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-icon alert-danger text-danger alert-dismissible fade show"
                                            role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <i class="mdi mdi-check-all mr-2"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{ route('homePage.login') }}" method="POST">
                                                @csrf
                                                <input type="email" name="email" placeholder="Email Đăng Nhập"
                                                    required />
                                                <input type="password" name="password" placeholder="Mật khẩu" required />
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox" />
                                                        <a class="flote-none" href="javascript:void(0)">Ghi nhớ</a>
                                                        <a href="#">Quên mật khẩu?</a>
                                                    </div>
                                                    <button type="submit"><span>Đăng nhập</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{ route('homePage.register') }}" method="POST">
                                                @csrf
                                                <input type="text" name="name" placeholder="Họ và tên" />
                                                <input name="email" placeholder="Email" type="email" />
                                                <input type="password" name="password" placeholder="Mật khẩu" />
                                                <input type="password" name="password_confirmation"
                                                    placeholder="Xác nhận mật khẩu" />
                                                <div class="button-box">
                                                    <button type="submit"><span>Đăng ký</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login area end -->
    </section>
@endsection
