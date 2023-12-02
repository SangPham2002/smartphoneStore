@section('title', 'SSMobile | Thêm Mới Sản Phẩm')
@section('titlePage', 'Thêm Mới Sản Phẩm')
@extends('admin.masterAdmin')
@section('main-content')
    <section class="content">
        <div class="content-page">
            <div class="mt-5">
                <h4 class="header-title mb-3">@yield('titlePage')</h4>
                <div class="mb-4">
                    <form class="form-validation" method="POST" action="{{ route('product.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 form-control-label">Tên Sản Phẩm<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="productName" name="name"
                                    placeholder="Tên Sản Phẩm" onkeyup="ChangeToSlug()">
                                @error('name')
                                    is-invalid
                                @enderror
                            </div>
                        </div>
                        @error('name')
                            <div class="alert alert-icon alert-warning text-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="mdi mdi-alert mr-1"></i>
                                <strong>Thất Bại!</strong>{{ $message }}
                            </div>
                        @enderror
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 form-control-label">Ảnh Sản Phẩm</label>
                            <div class="col-md-7">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image">

                            </div>
                        </div>
                        @error('image')
                            <div class="alert alert-icon alert-warning text-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="mdi mdi-alert mr-1"></i>
                                <strong>Thất Bại!</strong>{{ $message }}
                            </div>
                        @enderror
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 form-control-label">Ảnh Mô Tả</label>
                            <div class="col-md-7">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="images" name="images[]" multiple>

                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 form-control-label">Giá Sản Phẩm<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="inputEmail3" name="price"
                                    placeholder="Giá Sản Phẩm">
                            </div>
                        </div>
                        @error('price')
                            <div class="alert alert-icon alert-warning text-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="mdi mdi-alert mr-1"></i>
                                <strong>Thất Bại!</strong>{{ $message }}
                            </div>
                        @enderror
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 form-control-label">Giá Khuyến Mãi</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="inputEmail3" name="sale_price"
                                    placeholder="Giá khuyến mãi">
                                
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label">Danh Mục</label>
                            <div class="col-md-7">
                                <select class="form-control" name="category_id" id="input">
                                    <option value="0">Chọn danh mục</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 form-control-label">Đường dẫn Slug</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" id="slug" name="slug" readonly>
                               
                            </div>
                        </div>
                      
                        <div class="mt-3">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-4 form-control-label">Trạng Thái</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="stock" class="custom-control-input"
                                        value="1" >
                                    <label class="px-1 custom-control-label" for="customRadio1">Đặc Sắc</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="stock" class="custom-control-input"
                                        value="0" checked='checked'>
                                    <label class="custom-control-label" for="customRadio2">Bình Thường</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-4 form-control-label">Mô Tả</label>
                            <div class="col-md-7">
                                <textarea name="description" id="editor1" rows="10" cols="80">
                                    Điền mô tả sản phẩm tại đây
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Thêm Mới
                                </button>
                                <a href="{{ Route('product.index') }}" class="btn btn-danger waves-effect>">
                                    Hủy Bỏ</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end content -->
        <!-- END content-page -->
    </section>
@endsection
@section('custom-js')
    <script src="{{ asset('assets\ckeditor') }}\ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script language="javascript">
        function ChangeToSlug() {
            var productName, slug;

            //Lấy text từ thẻ input title 
            title = document.getElementById("productName").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
