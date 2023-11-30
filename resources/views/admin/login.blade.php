<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SSMobile | Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assetss') }}\images\favicon.ico">
    <!-- App css -->
    <link href="{{ asset('assetss') }}\css\bootstrap.min.css" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet">
    <link href="{{ asset('assetss') }}\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('assetss') }}\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4 mt-3">
                                <span><img src="{{ asset('assets') }}\images\logo-dark.png" alt=""
                                        height="30"></span>
                            </div>
                            <form action="{{ route('admin.login') }}" class="p-2" method="POST">
                                @csrf
                                @if ($message = Session::get('err'))
                                    <div class="alert alert-icon alert-danger text-danger alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <i class="mdi mdi-check-all mr-2"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="emailaddress">Địa Chỉ Email</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress"
                                        required="" placeholder="emailcuaban@gmail.com">
                                </div>
                                <div class="form-group">
                                    {{-- <a href="page-recoverpw.html" class="text-muted float-right">Quên Mật Khẩu?</a> --}}
                                    <label for="password">Mật Khẩu</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        id="password" placeholder="Mật khẩu của bạn!">
                                </div>

                                <div class="form-group mb-4 pb-3">
                                    <div class="custom-control custom-checkbox checkbox-primary">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                        <label class="custom-control-label" for="checkbox-signin">Ghi Nhớ</label>
                                    </div>
                                </div>
                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Đăng Nhập </button>
                                </div>
                            </form>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                    {{-- <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">Bạn chưa có tài khoản? <a href="pages-register.html" class="text-dark ml-1"><b>Đăng Ký</b></a></p>
                            </div>
                        </div> --}}
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{ asset('assetss') }}\js\vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('assetss') }}\js\app.min.js"></script>

</body>

</html>
